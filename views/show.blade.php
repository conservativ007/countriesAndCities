<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Достопримечательности</title>
    <link href="{{ URL::asset('css/attractions/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('css/attractions/slider.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



  </head>
  <body>

      <div class="mx-auto" style="width: 1000px;
      display: block;">
        <a href="/attraction">
          <img class="gorod" src="{{ asset('img/attractions/gorod.jpg') }}" alt="" style="width: 1000px;">
        </a>
      </div>

      <!-- auth -->
      @include('attraction.elems.auth')


    <div class="d-flex position-absolute mt-1"
    style="width: 115px; left: 200px;">
      <!-- countries -->
      @include('attraction.elems.country')

      <!-- cities -->
      @include('attraction.elems.city')

    </div>


    <div class="container d-flex mt-1 mx-auto p-0"
    style="width: 1000px;">
      <!--
      main attractions
      отображает достопримечательности на главной странице
      -->
      @include('attraction.elems.main-attraction')

      <!-- attractions  country -> city -> attractions -->
      <!--
      отображает достопримечательности когда выбираешь страну и город
      -->
      @include('attraction.elems.attraction')

      <!-- description -->
      @include('attraction.elems.description')
    </div>



      <!-- add/redact/delete (countries, cities, attractions) -->
      @if(isset($key) && $key == true)
      <div class="add">
        @include('attraction.elems.add')
      </div>
      @endif

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
