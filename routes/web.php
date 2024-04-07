<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories=Category::all();
    return view('app')->with("categories",$categories);
});
Route::controller(BookController::class)->group(function(){

    Route::get("books/view/{id}","view")->middleware('auth');
    Route::middleware(['Admin','auth'])->group(function(){
        Route::get("books/edit/{id}","edit");
        Route::post("books/update/{id}","update");
        Route::get("books/add","add");//i will call name of rout not url
        Route::post("books/insert","insert")->name('insert');
        Route::get("books/delete/{id}",'delete');
    });

});
Route::controller(CategoryController::class)->group(function(){
    Route::middleware(['Admin','auth'])->group(function(){
        Route::get("category/delete/{id}",'delete');
        Route::get("category/edit/{id}","edit");
        Route::post("category/update/{id}","update");
        Route::get("category/add","add");//i will call name of rout not url
        Route::post("category/insert","insert")->name('insert');
    });

    //Route::post("category/search","all");
    Route::middleware('auth')->group(function(){
        Route::post("category/search",'search');
        Route::get("category/all","all");
    });

});

Route::controller(UserController::class)->group(function(){
    Route::middleware('guest')->group(function (){
        Route::get("login","loginForm")->name('login');
        Route::post('login','loginAction');
        Route::get("register","RegisterForm");
        Route::post('register','RegisterAction');
    });

    Route::post('logout','logout')->middleware('auth');
});

Route::get('change/{lang}',function($lang){
    if($lang=='ar'){
        //sort the language in session
        session()->put('lang','ar');

    }
    else{
        session()->put('lang','en');

    }
   return redirect()->back();
});


