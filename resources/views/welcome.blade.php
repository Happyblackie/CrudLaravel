@extends('layouts.master')

@section('content')

{{--    <a href="{{url('/home')}}">home</a>  --}}
  <h3>Outlets</h3>
  <div style="margin-left:40%">
        {{--  {{$products->nextPageUrl()}} find url for next page --}}
        {{--  {{$products->links()}}  create links to pages--}}
        {{--  {{$products->count()}}  gets the number of items in a page--}}
        <a href="http://127.0.0.1:8000?page=1" class="text-decoration-none">Previous page</a> >>
        <a href="http://127.0.0.1:8000?page=2" class="text-decoration-none">Next Page</a> <br> 
  </div>

  <div class="text-center">
      <p>Page {{$products->currentPage()}}</p>
  </div>


  {{--  {{dd($products)}}  --}}
  {{--  
  @foreach($products as $product)
  <p>{{$product->id}}</p>
  <p>{{$product->title}}</p>
  <p>{{$product->price}}</p>
  <p>{{$product->category_id}}</p>
  @endforeach  --}}
  <a class="btn btn-info add" href="{{url('/add-product')}}">Add outlet</a>
  <div class="container">
      <table class="table ">
      
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Image</th>
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
              <td> <image  height="50px" src="{{asset('/storage/images/products/' .$product->image)}}"></image></td>
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

      
  </div>

@endsection

