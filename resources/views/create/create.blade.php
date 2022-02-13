<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
              <li class="nav-item">
                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
              </li>
            
          @endforeach
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    <div class="flex-center position-ref full-height">
        <div class="content">

            
            <div class="title m-b-md">
               Add your offer
            </div>

            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif
            <form method="POST" action="{{route('create.store')}}">
                @csrf
               <div class="form-group">

                <label for="exampleInputEmail">offer Name</label>
                <input type="text" class="form-control" name="name">

                @error('name')
                <small class="from-text text-danger">{{$message}}  </small>
                @enderror
               </div>
               <div class="form-group">

                <label for="exampleInputEmail">offer Price</label>
                <input type="text" class="form-control" name="price">
                @error('price')
                <small class="from-text text-danger">{{$message}}  </small>
                @enderror
               </div>
               <div class="form-group">

                <label for="exampleInputEmail">offer details</label>
                <input type="text" class="form-control" name="details">
                @error('details')
                <small class="from-text text-danger">{{$message}}  </small>
                @enderror
               </div>
                <button type="submit" class="btn btn-primary">Save Offer</button>
              </form>



        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>