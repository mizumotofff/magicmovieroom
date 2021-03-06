<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Magic Room</title>
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyD3J7gJb9WgxkAiNRJ6r_hRw---SSRC2ZE&language=ja"></script>

        <style>
        html { height: 100% }
        body { height: 100% }
        #map {
  height: 400px;
  width: 600px;
}
        </style>

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
            <button type="submit" id="search_button">Search</button>
          </form>
        </div>
        <div id="link">
          <!-- <a href="magic_bar">magic bar</a> -->
          <a id="top_link" href="mypage">Mypage</a>
        </div>
        <div id="writing">
          <h1 id="main_title">検索結果がありませんでした</h1>
        </div>s

      </div>






        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> -->
    </body>
</html>
