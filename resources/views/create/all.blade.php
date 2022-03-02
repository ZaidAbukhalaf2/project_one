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
              <li class="nav-item ">
                <a class="nav-link rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
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


      @if (Session::has('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}

          </div>
      @endif
      @if (Session::has('error'))
          <div class="alert alert-danger">
            {{Session::get('error')}}
          </div>
      @endif

      <table class="table">
        <thead>
          <tr>
              <th># id</th>
            <th scope="col">{{__('messages.Offer Name')}}</th>
            <th scope="col">{{__('messages.Offer price')}}</th>
            <th scope="col">{{__('messages.Offer details')}}</th>
            <th scope="col">offer photo </th>
            <th scope="col">{{__('messages.Offer operation')}}</th>


          </tr>
        </thead>
        <tbody>

            @foreach($offers ?? '' as $offer)

          <tr>
            <th scope="row">{{$offer->id}}</th>
            <td>{{$offer->name}}</td>
            <td>{{$offer->price}}</td>
            <td>{{$offer->details}}</td>
            <td><img style="width: 100px" src="{{asset('images/offers/'.$offer->photo)}} " alt=""></td>
            <td><a href="{{url('Offers/edit/'.$offer->id)}}" class="btn btn-success">{{__('messages.update')}}</a></td>
            <td><a href="{{url('Offers/delete/'.$offer->id)}}" class="btn btn-danger">{{__('messages.delete')}}</a></td>
          </tr>

          @endforeach

        </tbody>
      </table>