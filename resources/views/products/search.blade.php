@extends('layouts.master')

@section('content')
    <table class="table ">
        
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->title}}</td>
                <td>{{$product->price}}</td>
                {{--   <td>{{$product->category_id}}</td>  --}}
                <td>{{$product->category->name}}</td>
                {{--  button  --}}
                <td class="d-flex">

                    <div>
                    <a class="btn btn-primary" href="{{url('/edit-product/'.$product->id)}}">Edit</a>
                    </div>
                    
                    <form action="{{url ('/delete-product/'.$product->id) }}" method="post">
                        {{csrf_field()}}
                        @method('delete') {{--   {{@method_field('delete')}}  --}}
                        <button class="btn btn-danger ms-1">Delete</button>
                    </form>

                </td>  
            </tr>

            @endforeach
            </tbody>
    </table>
@endsection