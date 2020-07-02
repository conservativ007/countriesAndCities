<div class="position-absolute" style="width: 250px; right: 10px; top: 10px;">
  <form action="{{route('add')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
      <input class="form-control" type="text" name="country"
      placeholder="Country" value="{{$country_redact ?? ''}}">
    </div>
    <div class="form-group">
      <input class="form-control" type="text" name="city" placeholder="City"
       value="{{$city_redact ?? ''}}">
    </div>
    <div class="form-group">
      <input class="form-control" type="text" name="title" placeholder="Title" value="{{$title_redact ?? ''}}">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">изображения в слайдере</label>
      <input class="form-control" type="file" name="file[]" id="exampleInputEmail1" multiple>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail2">изображение в превью</label>
      <input class="form-control" type="file" name="nameprev" placeholder="nameprev" value="{{$name_redact ?? ''}}" id="exampleInputEmail2">
    </div>
        <textarea name="description" rows="15" cols="26" placeholder="опишите достопримечательность">{{$description_redact ?? ''}}</textarea>
        <input type="hidden" name="id" value="{{$id ?? ''}}">
        <input class="form-control" type="submit" name="">






  </form>
</div>
