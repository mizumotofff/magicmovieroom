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
    </head>
    <body>
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
      <div id="content">
        <div id="title">
          <a href="/sns/public"><h1 id="main_title">Magic Room</h1></a>

        </div>
        <video src="{{ asset('video/test.mp4') }}" controls></video>
        <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $movie->movie }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
      </div>

      <div id="comment_form">
        <?php foreach($texts as $value):  ?>
          <div class="comment">
            <div id="comment_text">{!! nl2br(e($value->text)) !!}</div>
            <p id="contributor">by {{ $value->name }}</p>
        </div>
        <?php endforeach; ?>
        <form method="POST" action="/sns/public/comment">
        <div id="tweet">
            <input type="hidden" name="id" value="{{ $movie->id }}">
            {{ csrf_field() }}
            <textarea class="text" name="text"></textarea>
              <button type="submit" value="書き込む">go</button>
        </div>
      </form>
      </div>

    </body>
</html>
