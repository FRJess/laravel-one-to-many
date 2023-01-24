<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Portfolio @yield('title')</title>

  <!-- Font Awesome -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css'
    integrity='sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=='
    crossorigin='anonymous' />


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Usando Vite -->
  @vite(['resources/js/app.js'])
</head>

<body>
  <div id="app">

    @include('admin.partials.header')

    <div class="container-fluid main-wrapper">
      <div class="row h-100">
        @auth
          <div class="col-2 h-100 bg-dark">
            @include('admin.partials.aside')
          </div>
        @endauth
        <div class="@auth col-10 @endauth">
          <main>
            @yield('content')
          </main>
        </div>
      </div>
    </div>

  </div>
</body>

</html>
