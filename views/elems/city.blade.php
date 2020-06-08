@if(isset($country->city))
  <div class="city">
    <div class="countryName left">
        {{$countryName ?? ''}}
    </div>

      @foreach($country->city as $city)
        <div class="left">
          <a href="/attraction/country/city/{{$city->id}}">
            {{$city->name}}
          </a>
        </div>
      @endforeach

  </div>
@endif
