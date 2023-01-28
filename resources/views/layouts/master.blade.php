<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaraApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .add{
        float:right;
        margin-right:12px;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LaraApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{url('/category')}}">Category</a>
            </li>
            
           
           
        </ul>
        <form class="d-flex" type="get" action="{{url('/search')}}">
            {{csrf_field()}}
            
            <input class="form-control me-2" name="query" type="search" placeholder="Search Product" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>

    {{--  errors display  --}}
    <div class="container mb-3">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
         @endif
    </div>
   {{--   end of errors display  --}}

    {{-- flash message display  --}}
    <div class="container mb-3">
        @if(session()->exists('message'))
         
                <div class="alert alert-info" role="alert">
                    {{session('message')}}
                </div>
          
         @endif
    </div>
   {{--   end of flash message display  --}}

    <div class="container">
        @yield('content') 
    </div>
</body>
</html>