<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class BookController extends Controller
{

    public function delete($id){
        //check id found

      $book =Book::findOrFail($id);
      $category_id=$book->category_id;

        $book->delete();
        $books=Category::findOrFail($category_id)->book;
      $categoryName=Category::findOrFail($category_id)->name;
        Session::flash('success','Book Deleted successfully');

        //$categories=Category::all();

    //  return view('app')->with('categories',$categories);


/*
      echo "<pre>";
      print_r($books);
      echo "</pre>";
*/
      return view('books/view',compact('books','categoryName'));
    }
    public function edit($id){
        //check and find member
        $book=Book::findOrFail($id);
        $categories=Category::all();
        return view("books.edit",compact(['book','categories']));
    }
    public function update($id,Request $request){
        //check
       $book=Book::findOrFail(($id));
       //print_r($book);

        //validate
      $newBook=$request->validate([
        "name"=>"required|string|max:100|min:7",
        "description"=>"required|string|max:100",
        'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        //'category'
       ]);
       //rename and upload


       //check if i uploaded image
       if($request->has('image')){
         //$imageName=Storage::putFile("members",$newMember['image']);
        $imageName=Storage::putFile("books",$newBook['image'] );

            //override because the image name is as user defined
            $newBook['image']= $imageName;
                //delete from project
            Storage::delete($book->image);}

       //make update
       $book->update($newBook);
       Session::flash("success",'Book updated successfully');
       //echo $newMember['image'];
      // return view("members.all",compact("members"));
      //$categories=Category::all();

      //return view('app')->with('categories',$categories);
     // echo $request->category."iil";

      $books=Category::findOrFail($request->category)->book;
      $categoryName=Category::findOrFail($request->category)->name;
/*
      echo "<pre>";
      print_r($books);
      echo "</pre>";
*/
      return view('books/view',compact('books','categoryName'));

    }
    public function add(){
        $categories=Category::all();
        return view("books.add",compact("categories"));
    }
public function insert(Request $request){


        //validation
        $newBook=$request->validate([
            "name"=>"required|string|max:100|min:5",
            "description"=>"required|string|max:100",
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            "category"=>"exists:categories,id"
        ]);

        if($request->has('image')){
          //rename and upload
       $imageName=Storage::putFile("books",$newBook['image']);
        //override because the image name is as user defined
        $request->image=$imageName;


       $newBook['image']= $imageName;}
        //make insert
         Book::create([
            "name"=>"$request->name",
            "description"=>"$request->description",
            "image"=>"$request->image",
            "category_id"=>$request->category
         ]);
        //create success message
        Session::flash("success",'Book added successfully');

        //$categories=Category::all();
        //$category=Category::findOrFail($newBook['category']);
        $books=Category::findOrFail($newBook['category'])->book;
        $categoryName=Category::findOrFail($newBook['category'])->name;
        /*
        echo "<pre>";
        print_r($books);
        echo "</pre>";
        */
        return view('books/view',compact('books','categoryName'));
        //return redirect()->back();
    }


}
