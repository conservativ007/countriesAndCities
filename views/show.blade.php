<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Достопримечательности</title>
    <link href="{{ URL::asset('css/attractions/style.css') }}" rel="stylesheet" type="text/css" >
  </head>
  <body>
    <header>
      <a href="/attraction">
        <img class="gorod" src="{{ asset('img/attractions/gorod.jpg') }}" alt="">
      </a>

      <!-- auth -->
      @include('attraction.elems.auth')
    </header>



    <div class="container">
      <!-- countries -->
      @include('attraction.elems.country')

      <!-- cities -->
      @include('attraction.elems.city')

      <!-- attractions -->
      @include('attraction.elems.attraction')

      <!-- description -->
      @include('attraction.elems.description')

    </div>

      <!--
        add/redact/delete (countries, cities, attractions)
      -->
      @if(isset($key) && $key == true)
        @include('attraction.elems.add')
      @endif

  </body>
</html>
