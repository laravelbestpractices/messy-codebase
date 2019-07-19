<?php

namespace App\Http\Controllers;

use App\Entries;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function index()
    {

        require(app_path(). '/functions.php');

        $cache_key = 'photos-cache-key2';
        $faker = \Faker\Factory::create();

        if(\Cache::has($cache_key))
            $photos = cache($cache_key);
        else{

            $photos = \App\Entries::all();
            if(count($photos)<=0){
                $photos_from_api = json_decode(file_get_contents("https://picsum.photos/v2/list"));

                $photos_with_desc = array_map(function($item) use($faker){
                  $item->Description = $faker->realText;
                  $item->Votes = 0;
                  $item->photoid = $item->id;
                  $item->picID = $item->id;
                  return $item;
                }, $photos_from_api);

                foreach($photos_with_desc as $photo){
                  $exists = checkIFPhotoExists($photo->id);
                  if(!$exists){
                    InsertINTODB($photo->id, $photo->width, $photo->height,$faker->firstName,$photo->Description);
                  }
                }
              $photos = $photos_with_desc;
              cache([$cache_key => $photos], 60);
            }
        } // else

        return view('welcome')->with(['photos' => $photos]);

    } // index
}