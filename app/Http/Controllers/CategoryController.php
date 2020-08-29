<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

<<<<<<< HEAD
    public function index(){
=======
    public function index()
    {

>>>>>>> b-branch
        $categories = Category::orderBy('category', 'asc')->get();

        return view('category.index', ['categories' => $categories]);
    }




<<<<<<< HEAD
    public function display(Category $category){
        //return $category;
=======
    public function display(Category $category)
    {

>>>>>>> b-branch
        $pages = $category->pages()->paginate(5);

        return view('page.index', ['pages' => $pages]);
    }





<<<<<<< HEAD
    public function store(Request $request) {
=======
    public function store(Request $request)
    {

>>>>>>> b-branch
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


<<<<<<< HEAD
=======


>>>>>>> b-branch
    public function destroy($id){

        $category = Category::find($id);

        $category->delete();
<<<<<<< HEAD
=======

>>>>>>> b-branch
        return back()->with('success', 'Category removed successfuly.');
    }
}
