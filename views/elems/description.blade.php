@if(isset($name))
  <div class="single">

      @if(!empty($files))
      <div class="container" style="width: 1000px;">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            @foreach($files as $file)
              @if($loop->index == 0)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="active">
              @continue
              @endif
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}">
            </li>
            @endforeach
          </ol>
          <div class="carousel-inner">
            @foreach($files as $file)
              @if($loop->index == 0)
              <div class="carousel-item active"
              style="height: 500px;">
                <img src="{{asset($path1.$file)}}" class="d-block w-100" alt="...">
              </div>
              @continue
              @endif

              <div class="carousel-item">
                <img src="{{asset($path1.$file)}}" class="d-block w-100" alt="..." style="height: 480px; width: 640px;">
              </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      @endif

      @if(isset($description) && isset($desc))
      <div class="info">
        <p class="text-justify">
          {{$description ?? ''}}
        </p>
        @if(isset($key) && $key == true)
        <div class="redact">
          <a class="redact" href="/attraction/redact/redact/{{$desc->id}}">
            редактирвать
          </a>
          <a class="redact" href="/attraction/redact/delete/{{$desc->id}}">
            удалить
          </a>
        </div>
      </div>

    @endif
  </div>
  @endif
@endif
