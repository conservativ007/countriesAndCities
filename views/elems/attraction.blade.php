@if(isset($cities->attraction))
  <div class="d-flex" >
      @foreach($cities->attraction as $item)
        <div class="div_miniature">
          <a href="/attraction/description/{{$item->id}}/{{$item->name}}">
            <div class="works-image"
            style="background: url({{'/img/attractions/'.$item->name.'.jpg'}});
            background-size: cover; width: 250px; height: 150px;">
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
@endif
