<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::orderBy('category', 'asc')->get();

        return view('category.index', ['categories' => $categories]);
    }




    public function display(Category $category){
        //return $category;
        $pages = $category->pages()->paginate(5);

        return view('page.index', ['pages' => $pages]);
    }





    public function store(Request $request) {
        $this->validate( $request, [
           'category' => 'required',
       ]);

        $category = new Category;
        $category->category = $request->input('category');
        $category->save();

        return back()->with('success', 'Category created successfuly.');
    }







    public function edit(Category $category)
    {

    }



    public function update(Request $request, Category $category)
    {

    }


    public function destroy($id){

        $category = Category::find($id);

        $category->delete();
        return back()->with('success', 'Category removed successfuly.');
    }
}
