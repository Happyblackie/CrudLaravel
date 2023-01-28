@extends('layouts.master')

@section('content')
    <div class="container">
    <h3>You can add category here</h3>
     <a class="btn btn-info add mb-1" href="{{url('/')}}">Back</a>
        <form action="{{url ('/add-category') }}" method="post">
                {{csrf_field()}}

                <div class="mb-3">
                    <label for="exampleFormControlInput1"  class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"  placeholder="Enter category name">
                </div>

                <button class="btn btn-primary mt-4">Submit</button>
        
        </form>
    </div>
@endsection