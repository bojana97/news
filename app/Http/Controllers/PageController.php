<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\File;

class PageController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except'=> ['index', 'show']]);
    }

    public function index() {
      //$pages = Page::orderBy('created_at','desc')->paginate(4);
        $pages = Page::latest()->paginate(4);

        return view('page.index', ['pages'=>$pages]);
    }

    public function show($id){
        $page = Page::find($id);
        return view('page.show', ['page' => $page]);
    }


    /* EDIT and UPDATE */
    public function edit($id) {
       $page = Page::find($id);

       if(Auth()->user()->id != $page->user_id){
           return redirect('page')->with('error', 'you have no permission for this action');
       }

       return view('page.edit', ['page' => $page]);
    }


        public function update(Request $request, $id) {

            $this->validate($request, [
            'title'=>'required',
            'content'=> 'required',
            'name' => 'image|nullable|max:1999'
            ]);

            $page =  Page::find($id);
            $page->title = $request->input('title');
            $page->content = $request->input('content');
            $page->save();


            //File upload
            // !! ??
            $file = File::where('page_id', '=', $page->id)->first();
            if($file == null){ $file = new File;}

            if($request->hasFile('name')){
                $filenameWithExtension = $request->file('name')->getClientOriginalName();
                $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                $extension = $request->file('name')->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('name')->storeAs('public/images', $filenameToStore);

                $file->name = $filenameToStore;
                $file->page_id = $page->id;
                $file->save();
            }

           return redirect('/page')->with('success', 'Page updated');
        }



    /* CREATE AND STORE */
    public function create(){
        return view('page.create');
    }

    public function store( Request $request ) {

        $this->validate( $request, [
            'title' => 'required',
            'content' => 'required',
            'name' => 'image|nullable|max:1999'
        ]);

        $page = new Page;
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->user_id = Auth()->user()->id;
        $page->save();

        //File upload  ??!!
        $file = new File;

        if($request->hasFile('name')){
            $filenameWithExtension = $request->file('name')->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('name')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('name')->storeAs('public/images', $filenameToStore);
        }

        $file->name=$filenameToStore;
        $file->page_id = $page->id;
        $file->save();

        return redirect('/page')->with('success', 'Page created.');
    }

    public function destroy($id) {
        $page = Page::find($id);

        if(Auth()->user()->id != $page->user_id){
            return redirect('page')->with('error', 'You have no permission for this action!');
        }

        // ?? !!
        $file = File::where('page_id', '=', $page->id)->first();
        if ($file != null)  {   $file->delete();  }

        $page->delete();
        return redirect('/page')->with('success', 'Page removed.');
    }


}
