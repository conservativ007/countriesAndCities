<?php
  namespace App\Http\Controllers;
  use App\Http\Controllers\Controller;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\DB;
  use Illuminate\Support\Facades\Input;
  use Illuminate\Support\Facades\Auth;

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
      ]);
    }

    public function attraction($id){
      return view('attraction.show', [
        'cities'    => City::find($id),
        'countries' => Country::get(),
      ]);
    }

    public function description($attraction_id, $name = ''){

      return view('attraction.show', [
        'countries'   => Country::get(),
        'desc'        => Attraction::find($attraction_id),
        'description' => Attraction::find($attraction_id)
        ->description,
        'name'        => $name,
        'key'         => Auth::check() ? true : false,
      ]);
    }

    public function add(Request $request){

      if(!empty(Input::get('country')) &&   !empty(Input::get('city')) && !empty(Input::get('name')) && !empty(Input::get('description'))){


        // если нету страны записываем
        if (Country::where('name', '=',   Input::get('country'))->count() == 0){

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

        if(Attraction::where('title', '=', Input::get('title'))->count() == 0){
          $city = City::find($cityId);
          $city->attraction()->create([
            'name'        => Input::get('name'),
            'title'       => Input::get('title'),
            'description' => Input::get('description')
          ]);
        }else{
          $attr = Attraction::find(Input::get('id'));
          $attr->description = Input::get('description');
          $attr->save();
        }

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
