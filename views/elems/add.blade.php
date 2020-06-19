<div class="add">
  <form class="add_form" action="/attraction/redact/add" method="get">
    <input type="text" name="country"
    placeholder="укажите страну" value="{{$country_redact ?? ''}}">
    <input type="text" name="city" placeholder="укажите город"
     value="{{$city_redact ?? ''}}">
    <input type="text" name="title" placeholder="укажите заголовок" value="{{$title_redact ?? ''}}">
    <input type="text" name="name" placeholder="name img"
     value="{{$name_redact ?? ''}}">
    <textarea name="description" rows="15" cols="26" placeholder="опишите достопримечательность">{{$description_redact ?? ''}}</textarea>
    <input type="hidden" name="id" value="{{$id ?? ''}}">
    <input type="submit" name="">
  </form>
</div>
