<?php
  namespace App\Http\Controllers;
  use App\Http\Controllers\Controller;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\DB;
  use Illuminate\Support\Facades\Input;
  use Illuminate\Support\Facades\Auth;

  use Illuminate\Support\Facades\Storage;
  use Illuminate\Http\File;


  use App\Country;
  use App\City;
  use App\Attraction;

  class AttractionController extends Controller{
    public function show(){
      return view('attraction.show', [
        'countries'  => Country::get(),
        'attraction' => Attraction::get(),
        'key'        => Auth::check() ? true : false,
      ]);
    }

    public function logout(){
      Auth::logout();
      return redirect('/attraction');
    }


    public function city($id){

      return view('attraction.show', [
        'countries'   => Country::get(),
        'country'     => Country::find($id),
        'countryName' => Country::find($id)->name,
        'attraction'  => Attraction::get(),
      ]);
    }

    public function attraction($country_id, $id){
      return view('attraction.show', [
        'countries'   => Country::get(),
        'country'     => Country::find($country_id),
        'countryName' => Country::find($country_id)->name,
        'cities'      => City::find($id), 
      ]);
    }

    public function description($attraction_id, $name = ''){

      $attr = Attraction::find($attraction_id);

      $countryName = $attr->city->country->name;
      $cityName = $attr->city->name;
      $attrName = $attr->title;

      $path = $_SERVER['DOCUMENT_ROOT'] . "/storage/$countryName/$cityName/$attrName/";

      $path1 = "/storage/$countryName/$cityName/$attrName/";

      if(file_exists($path)){
         $files = scandir($path);
         $files = array_slice($files, 2);
      }else{
        $files = '';
      }


      return view('attraction.show', [
        'countries'   => Country::get(),
        'desc'        => Attraction::find($attraction_id),
        'description' => Attraction::find($attraction_id)->description,
        'name'        => $name,
        'files'       => $files,
        // 'path'        => $path,
        'path1'       => $path1,
        'key'         => Auth::check() ? true : false,
      ]);
    }



    public function add(Request $request){

      if(!empty($request->country)&&
      !empty($request->city)&&
      !empty($request->title)){

      // загружаем картинки на карусель
      if(!empty($request->file('file'))){
        $country = $request->country;
        $city = $request->city;
        $title = $request->title;

        foreach($request->file() as $file){
          foreach($file as $f){
            $f->store("$country/$city/$title", 'public');
          }
        }
      }

      // загружаем на превью
      if(!empty($request->nameprev)){
        $imageName = time();
        $expansion = $request->nameprev->getClientOriginalExtension();

        $request->nameprev->move(public_path('img/attractions'),
        "$imageName.$expansion");
      }


        // если нету страны записываем
        if (Country::where('name', '=', Input::get('country'))
        ->count() == 0){

          DB::table('countries')->insert([
               'name' => Input::get('country')
             ]);
        }

        // получаем id в любом случае)
        $countryId = DB::table('countries')
        ->where('name', Input::get('country'))
        ->first()->id;

        if(City::where('name', '=', Input::get('city'))->count() == 0){

          // если страна уже есть то мы знаем её id и по нему записываем город
          $country = Country::find($countryId);
          $country->city()->create([
            'name' => Input::get('city')
          ]);
        }

        $cityId = DB::table('cities')
          ->where('name', Input::get('city'))
          ->first()->id;

        // записываем достопримечательность)

        if(Attraction::where('title', '=', Input::get('title'))
        ->count() == 0){
          $city = City::find($cityId);
          $city->attraction()->create([
            'name'        => $imageName,
            'title'       => $request->title,
            'description' => $request->description
          ]);
        }else{
          $attr = Attraction::where("title", $request->title)
          ->first();

          if(!empty($request->description)){
            $attr->description = $request->description;
          }else{
            $attr->description = $attr->description;
          }

          $attr->save();
        }

        return redirect('/attraction');
    }

    else{
      return redirect('/attraction');
    }


      return view('attraction.show', [
        'countries' => Country::get(),
        'cities'    => City::get(),

      ]);
    }


    public function redact(Request $request, $id){

      $attr = Attraction::find($id);

      return view('attraction.show', [
        'country_redact'      => $attr->city->country
        ->name,
        'city_redact'         => $attr->city->name,
        'title_redact'        => $attr->title,
        'name_redact'         => $attr->name,
        'description_redact'  => $attr->description,
        'id'                  => $id,
        'name'                => $attr->name,
        'key'                 => true,
      ]);
    }

    public function delete($id){
      echo $id;
      $attr = Attraction::find($id);
      $attr->delete();

      return redirect('/attraction');
    }

  }
