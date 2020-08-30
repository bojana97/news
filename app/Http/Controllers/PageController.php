<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Page;
use App\File;
use App\Comment;
use Purifier;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['index', 'show']]);
    }



    public function index()
    {
        $pages = Page::with('categories')->orderBy('created_at','desc')
                                         ->paginate(4);

        return view('page.index', ['pages' => $pages]);
    }





    public function show($id)
    {
        $page = Page::find($id);

        return view('page.show', ['page' => $page]);
    }



    /* CREATE AND STORE */
    public function create()
    {
        $categories = Category::get()->pluck('category','id');

        return view('page.create', ['categories' => $categories]);
    }



    public function store( Request $request )
    {
        $this->validate( $request, [
            'title' => 'required',
            'content' => 'required',
            'name' => 'image|nullable|max:1999',
            'category.*' => 'exists:category,id'
        ]);


        $page = new Page;
        $page->title = $request->input('title');
        $page->content = Purifier::clean($request->input('content'));
        $page->user_id = Auth()->user()->id;
        $page->save();

        //add categories
        $page->categories()->sync((array)$request->input('category'));


        //create new file
        $file = new File;


        if($request->hasFile('name'))
        {

            $filenameWithExtension = $request->file('name')->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('name')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('name')->storeAs('public/images', $filenameToStore);
        }else{
            $filenameToStore = 'defaultimg.jpg';
        }

        $file->name=$filenameToStore;
        $file->page_id = $page->id;
        $file->save();


        return redirect('/')->with('success', 'Page created successfuly.');
    }



    /* EDIT and UPDATE */
    public function edit($id)
    {
       $page = Page::findOrFail($id);
       $categories = Category::get()->pluck('category', 'id');

       if(Auth()->user()->id != $page->user_id){
           return redirect('page')->with('error', ' You have no permission for this action.');
       }

       return view('page.edit',  ['page' => $page, 'categories' => $categories]);
    }





        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'title'=>'required',
                'content'=> 'required',
                'name' => 'image|nullable|max:1999',
                'category.*' => 'exists:category,id'
            ]);

            $page =  Page::find($id);
            $page->title = $request->input('title');
            $page->content = Purifier::clean($request->input('content'));
            $page->save();


            $page->categories()->sync((array)$request->input('category'));



            $file = File::where('page_id', '=', $page->id)->first();


            if( $request->hasFile('name') ){

                $filenameWithExtension = $request->file('name')->getClientOriginalName();
                $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                $extension = $request->file('name')->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('name')->storeAs('public/images', $filenameToStore);

                $file->name = $filenameToStore;
                $file->page_id = $page->id;
                $file->save();
            }

           return redirect('dashboard')->with('success', 'Page updated successfuly.');
        }






    public function destroy($id)
    {
        $page = Page::find($id);


        if(Auth()->user()->id != $page->user_id){
            return redirect('page')->with('error', 'You have no permission for this action!');
        }

        $page->categories()->detach();

        // Delete file from storage (except default image)
        $file = File::where('page_id', $page->id)->first();
     
        if ($file->name != 'defaultimg.jpg') {  Storage::delete('public/images/'. $file->name);  }
            

        $page->delete();

        return redirect('dashboard')->with('success', 'Page removed successfuly.');
    }








    public function search()
    {
        $search = $_GET['search'];
        $pages = Page::with('categories')->where('title', 'LIKE', '%'.$search.'%')
                                         ->orderBy('created_at','desc')
                                         ->paginate(4);

        return view('page.index', ['pages' => $pages]);

    }






}
