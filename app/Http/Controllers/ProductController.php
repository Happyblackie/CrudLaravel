<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* use Illuminate\Support\Facades\Mail; */  //mailtrap
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function index(){
       /*  $productsVariable = Product::all(); */
      /*  $productsVariable = Product::with('category')->get(); */
        $productsVariable = Product::with('category')->paginate(5);
        return view('welcome',['products'=> $productsVariable]);
    }

    public function create(){
        $categories = Category::all();
        return view('products.create',['categories'=>$categories]);
    }

    public function store(Request $request){

        //errors validation
        $request->validate([
            'title' => 'required|min:3',
            'price' => 'required'
        ]);
        //end of errors validation

        $input = $request->all();
        
        //upload image in our path
        if($request->hasfile('image')){
            $destinationPath = 'public/images/products'; /* upload image in our path */
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destinationPath,$imageName);

            $input['image'] = $imageName;
        }
            //mailtrap code added here video 19
        Product::create($input);
        /* $productVar = Product::create($input);
        Mail::send('emails.productCreated',$productVar->toArray(),
        function($message){ 
            $message->to('happyblackie01@gmail.com', 'Happy Otieno Blackie')
            ->subject('Product created subject');
        }); */

        session()->flash('message',$input['title']. ' succesfully saved');
        return redirect('/');
    }
    
    public function edit($productVar){
        $categories = Category::all();
        $productVar = Product::find($productVar);
        return view('products.edit',['product'=>$productVar,'categories'=>$categories]);
        /* return view('products.edit',compact('product','categories')); */
    }

    public function update(Request $request,$product){
        $input = $request->all();
        $product = Product::find($product);
        $product->title = $input['title'];
        $product->price = $input['price'];
        $product->category_id = $input['category_id'];

        $product->save();
        session()->flash('message',$input['title']. ' succesfully updated');
        return redirect('/');
    }

    public function delete($productVar){
      
        Product::find($productVar)->delete();
        session()->flash('message', ' product succesfully deleted');
        return redirect()->back();  
    }

    public function search(){
      
        $searchVariable = $_GET['query'];
        $products = Product::where('title','LIKE','%'.$searchVariable.'%')->with('category')->get();
        
        return view('products.search',compact('products'));
    }

}
