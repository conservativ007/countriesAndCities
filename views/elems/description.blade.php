@if(isset($name))
  <div class="single">
      <img src="{{asset('img/attractions/'.$name.'.jpg')}}" alt="" class="img_description">
      @if(isset($description) && isset($desc))
    {{$description ?? ''}}
    <a class="redact" href="/attraction/redact/{{$desc->id}}">редактирвать</a>
    <a class="redact" href="/attraction/delete/{{$desc->id}}">удалить</a>
  </div>
  @endif
@endif
