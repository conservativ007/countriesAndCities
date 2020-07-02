@if(isset($attraction))
<div class="d-flex flex-wrap justify-content-centr align-items-center" style="width: 1000px;">
  @foreach($attraction as $item)
  <!-- <div class="div_miniature"> -->
  <div class="">
    <a href="/attraction/description/{{$item->id}}/{{$item->name}}">
      <div class="works-image"
      style="background: url({{'/img/attractions/'.$item->name . '.jpg'}});
      background-size: cover; width: 250px; height: 150px;">
      <div class="overlay">
        <div class="content">
          {{$item->title}}
        </div>
      </div>
      </div>
    </a>
  </div>

  <!-- </div> -->
  @endforeach

  </div>

@endif
