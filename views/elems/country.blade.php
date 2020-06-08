<div class="country">
  @if(isset($countries))
    @foreach($countries as $country)
      <div class="left">
        <a href="/attraction/country/{{$country->id}}">
          {{$country->name}}
        </a>
      </div>
    @endforeach
  @endif
</div>

@if(isset($attraction))
  <div class="show_attraction">

    @foreach($attraction as $item)
    <div class="div_miniature">
      <a href="/attraction/description/{{$item->id}}/{{$item->name}}">
        <div class="works-image"
        style="background: url({{'/img/attractions/'.$item->name . '.jpg'}});
        background-size: cover;">
        <div class="overlay">
          <div class="content">
            {{$item->title}}
          </div>
        </div>
        </div>

      </a>
    </div>
    @endforeach

    </div>
  </div>
@endif
