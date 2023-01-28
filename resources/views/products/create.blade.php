@extends('layouts.master')

@section('content')

    <h3>You can add outlets here</h3>
    <a class="btn btn-info add mb-1" href="{{url('/')}}">Back</a>
    <div class="container">
        <form action="{{url ('/add-product') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="mb-3">
                    <label for="exampleFormControlInput1"  class="form-label">Title</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control"  placeholder="Title">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1"  class="form-label">Price</label>
                    <input type="text" name="price" value="{{old('price')}}" class="form-control"  placeholder="Price">
                </div>

                
                <select class="form-select" name="category_id" aria-label="Default select example">

                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>

                   {{--   choose file  --}}
                <div class="input-group mb-3 mt-4">
                    <input type="file" name="image" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                <button class="btn btn-primary mt-4">Submit</button>
                <a href="{{url('/add-category')}} "class="btn btn-primary mt-4 ms-4">Add category</a>  
        
        </form>
    </div>

@endsection