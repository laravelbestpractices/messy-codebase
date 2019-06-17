<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A very messy codebase written in Laravel">
    <meta name="author" content="Darwin Biler">
    <title>A Demo of poorly written Laravel App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/app.css" rel="stylesheet" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet" >
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
    <header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>A Horribly Written Laravel App</strong>
      </a>
    </div>
  </div>
</header>

<main role="main">
  <div class="album py-5 bg-light">
    <div class="container">

      @php

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
                  return $item;
                }, $photos_from_api);

                foreach($photos_with_desc as $photo){
                  $exists = checkIFPhotoExists($photo->id);
                  if(!$exists){
                    InsertINTODB($photo->id, $photo->width, $photo->height,$photo->author,$photo->Description);
                  }
                }
              $photos = $photos_with_desc;
              cache([$cache_key => $photos], 60);
            }
        }

      @endphp

      <div class="row">

      @foreach($photos as $photo)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="https://picsum.photos/id/{{$photo->photoid}}/348/225"/>
            <div class="card-body">
              <p class="card-text">{{ $photo->Description }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary btn-vote" data-photo-id="{{$photo->picID}}" data-vote-direction="up"><
                    span class="oi oi-arrow-thick-top"></span>
                  </button>
                  <button type="button" class="btn btn-sm btn-outline-secondary btn-vote"  data-photo-id="{{$photo->picID}}"  data-vote-direction="down">
                      <span class="oi oi-arrow-thick-bottom"></span>
                  </button>
                </div>
                <small class="text-muted">{{ $photo->Votes}} votes</small>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Messy Codebase is &copy; a demo Laravel Application that purposedly violates every known best practices.</p>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="/js/app.js"></script> 
 </body>
</html>