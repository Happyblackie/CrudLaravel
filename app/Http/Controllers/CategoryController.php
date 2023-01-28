<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* use App\Models\Product; */
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(){
       /*  $productsVariable = Product::all(); */
       $categoriesVariable = Category::all();
        return view('categories.index',['categories'=> $categoriesVariable]);
    }

    public function create(){
      /*   $categories = Category::all(); */
        return view('categories.create');
    }

    public function store(Request $request){
        $input = $request->all();
        Category::create($input);
        return redirect('/category');
    }
}
