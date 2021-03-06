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

        <link href="https://vjs.zencdn.net/7.6.6/video-js.min.css" rel="stylesheet">
<script src="https://vjs.zencdn.net/7.6.6/video.min.js"></script>
    </head>
    <body id="movie_page">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
      <!-- content -->
      <a href="{{ url()->previous() }}"><h3 class="review__link">Before</h3></a>
      <div id="content">
        <div id="title">
          <a href="{{ url('/') }}"><h1 id="main_title">Magic Room</h1></a>
        </div>
        <video id="movie__video" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="640" height="480" data-setup="{}">
          <source src="{{ $movie->movie }}" type="application/x-mpegURL">
          </video>
        <!-- <video src="{{ $movie->movie }}" controls></video> -->
        <h2 id="content__title">{{ $movie->text}}</h2>
        <div id="comment_form">
          <?php foreach($texts as $value):  ?>
            <div class="comment">
              <div id="comment_text">{!! nl2br(e($value->text)) !!}</div>
              <p id="contributor">by {{ $value->name }}</p>
            </div>
          <?php endforeach; ?>
          <form method="POST" action="{{ url('/comment') }}">
            <div id="tweet">
            <input type="hidden" name="id" value="{{ $movie->id }}">
            {{ csrf_field() }}
            <textarea class="text" name="text"></textarea>
              <button type="submit" value="書き込む">POST</button>

            </div>
          </form>
        </div>
      </div>


    </body>
</html>
