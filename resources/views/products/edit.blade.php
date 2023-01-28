@extends('layouts.master')

@section('content')

    <div class="container">
    <h3>You can edit product here</h3>
        <form action="{{url ('/edit-product/'.$product->id) }}" method="post">
                {{csrf_field()}}
                @method('put')
                <div class="mb-3">
                    <label for="exampleFormControlInput1"  class="form-label">Title</label>
                    <input  type="text" name="title" value="{{old('title') ?? $product->title }}" class="form-control"  placeholder="Title">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1"  class="form-label">Price</label>
                    <input type="text" name="price" value="{{old('price') ?? $product->price }}" class="form-control"  placeholder="Price">
                </div>

                
                <select class="form-select" name="category_id" value="{{old('category_id') ?? $product->category->name }}"  aria-label="Default select example">

                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>

                <button class="btn btn-primary mt-4">Submit</button>
        
        </form>
    </div>

@endsection