<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Magic Room</title>
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyD3J7gJb9WgxkAiNRJ6r_hRw---SSRC2ZE&language=ja"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    </head>
    <body>
      <!-- content -->
      <div id="content">
        <div id="title">
          <a href="/"><h1 id="main_title">Magic Room</h1></a>
        </div>
        <div id="search_form">
          <form action="search" method="get">
            <input type="text" name="search" id="search_text">
            <button type="submit" id="search_button">SEARCH</button>
          </form>
        </div>
        <div id="link">
          <a href="mypage">Mypage</a>
        </div>
        <div id="writing">
          <?php foreach($movies as $value):  ?>
            <div class="thumb">
              <a href="movie/{{$value->id}}"><img src="{{$value->thumbnail}}"></a>
              <p id="movie_title"><a href="movie/{{$value->id}}">{{ $value->text }}</a></p>
              <p id="movie_time">{{ $value->time->format('Y-m-d') }}</p>
              <div id="movie_2">
                <p id="movie_title2"><a href="movie/{{$value->id}}">{{ $value->text }}</a></p>
                <p id="movie_time2">{{ $value->time->format('Y-m-d') }}</p>
              </div>
           </div>
         <?php endforeach; ?>
        </div>
      </div>
    </body>
</html>
