@extends('layouts.master')

@section('content')
  {{--  <a href="{{url('/home')}}">home</a>  --}}
  <h3>Categories</h3>

  {{--  {{dd($products)}}  --}}
  {{--  
  @foreach($products as $product)
  <p>{{$product->id}}</p>
  <p>{{$product->title}}</p>
  <p>{{$product->price}}</p>
  <p>{{$product->category_id}}</p>
  @endforeach  --}}
  <a class="btn btn-primary add" href="{{url('/add-category')}}">Add category</a>
   <a class="btn btn-info add mb-1" href="{{url('/')}}">Back</a>
  <div class="container">
      <table class="table">
      
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Date created</th>
        
      </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
      <tr>
        <th scope="row">{{$category->id}}</th>
        <td>{{$category->name}}</td>
      {{--   <td>{{$product->category_id}}</td>  --}}
        <td>{{$category->created_at->diffForHumans()}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
@endsection

