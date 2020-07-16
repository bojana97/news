<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{

    public function index() {
        $pages = Page::orderBy('created_at','desc')->paginate(4);

        return view('page.index', ['pages'=>$pages]);
    }


    public function show($id){
        $page = Page::find($id);

        return view('page.show', ['page' => $page]);
    }


    /* EDIT and UPDATE */
    public function edit($id) {
       $page = Page::find($id);

       return view('page.edit', ['page' => $page]);
    }

        public function update(Request $request, $id) {
            $this->validate($request, [
            'title'=>'required',
            'content'=> 'required',
        ]);

        $page =  Page::find($id);
        $page->title = $request->input('title');
        $page->content = $request->input('content');

        // !!
        $page->user_id = $request->input('user_id');
        $page->created_at = $request->input('created_at');
        $page->save();

        return redirect('/page')->with('success', 'Page updated');
    }



}
