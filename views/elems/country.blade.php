<div class="list-group">
  @if(isset($countries))
    @foreach($countries as $country)
      <a href="/attraction/country/{{$country->id}}" class="list-group-item list-group-item-action">
        {{$country->name}}
      </a>
    @endforeach
  @endif
</div>
