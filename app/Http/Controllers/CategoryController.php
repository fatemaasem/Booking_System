<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function all(){
        $categories=Category::paginate(2);

        return view("categories.all",compact("categories"));
    }
    public function delete($id){
        //check id found
        $category=category::findOrFail($id);



        $category->delete();
        Session::flash('success','Category Deleted successfully');
        $categories=category::paginate(2);
        //return view("categories.all",compact("categories"));
        return redirect("category/all")->with('categories',$categories);

    }
    public function edit($id){
        //check and find category
        $category=category::findOrFail($id);
        return view("categories.edit",compact('category'));
    }
    public function update($id,Request $request){
        //check
       $category=category::findOrFail(($id));
        //validate
      $newCategory=$request->validate([
        "name"=>"required|string|max:100|min:7",

       ]);
       $category->update($newCategory);


       Session::flash("success",'Category updated successfully');
       $categories=category::paginate(2);


      return redirect("category/all")->with('categories',$categories);

    }
    public function add(){

        return view("categories.add");
    }
public function insert(Request $request){

        //validation
        $newCategory=$request->validate([
            "name"=>"required|string|max:100|min:7",

           ]);



         category::create($newCategory);
        //create success message
        Session::flash("success",'category added successfully');
        $categories=Category::paginate(2);

        return redirect("category/all")->with('categories',$categories);


    }
    public function search(Request $request){

        $data=$request->validate([
            'category'=>"exists:categories,id"]
        );
        $categories=Category::all();
         $books=Category::find($data['category'])->book;
         $categoryName=Category::find($data['category'])->name;
        return view('books/view',compact("books","categoryName"));

    }



}
