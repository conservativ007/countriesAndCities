@if(isset($name))
  <div class="single">
      <img src="{{asset('img/attractions/'.$name.'.jpg')}}" alt="" class="img_description">
      @if(isset($description) && isset($desc))
    {{$description ?? ''}}
    @if(isset($key) && $key == true)
      <a class="redact" href="/attraction/redact/redact/{{$desc->id}}">
        редактирвать
      </a>
      <a class="redact" href="/attraction/redact/delete/{{$desc->id}}">
        удалить
      </a>
    @endif
  </div>
  @endif
@endif
