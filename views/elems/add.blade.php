<!-- в инпуте name, требуется указать точное название картинки -->
<div class="add">
  <form class="add_form" action="/attraction/add" method="get">
    <input type="text" name="country"
    placeholder="укажите страну" value="{{$country ?? ''}}">
    <input type="text" name="city" placeholder="укажите город"
     value="{{$city ?? ''}}">
    <input type="text" name="title" placeholder="укажите заголовок" value="{{$title ?? ''}}">
    <input type="text" name="name" placeholder="name img"
     value="{{$name ?? ''}}">
    <textarea name="description" rows="15" cols="26" placeholder="опишите достопримечательность">{{$description ?? ''}}</textarea>
    <input type="hidden" name="id" value="{{$id ?? ''}}">
    <input type="submit" name="">
  </form>
</div>
