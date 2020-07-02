<div class="">
  @if(isset($country->city))
      <div class="list-group">
        <a href=""
          class="list-group-item list-group-item-action active">
          {{$countryName ?? ''}}
        </a>
      </div>

    @foreach($country->city as $city)
      <div class="list-group">
        <a href="/attraction/country/city/{{$country->id}}/{{$city->id}}"
          class="list-group-item list-group-item-action">
          {{$city->name}}
        </a>
      </div>
    @endforeach
  @endif
</div>
