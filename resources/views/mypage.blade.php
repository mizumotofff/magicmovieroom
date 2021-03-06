<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/mypage.js') }}"></script>
        <script src="{{ asset('js/dropzone.js') }}"></script>
        <title>Magic Room</title>
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyD3J7gJb9WgxkAiNRJ6r_hRw---SSRC2ZE&language=ja"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    </head>
    <body id="my">
      <a href="{{ url('/') }}"><h3 class="review__link">Before</h3></a>
      <div id="content">
        <div id="title">
          <a href="{{ url('/') }}"><h1 id="main_title">Magic Room</h1></a>
        </div>
        <div id="writing_mypage">
          <div id="movie_post">
            <div id="comment_form">
              <form action="upload" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <br>
                <span id="comment_title">Title</span><br>
                <input type="text" class="text" name="movie_title"><br>
                @if($errors->has('movie_title'))
                  @foreach ($errors->get('movie_title') as $error)
                    <span class="error">{{ $error }}</span><br>
                  @endforeach
                @endif
                <div id="mform">
                  <label id="movie_button"><p class="movie__button--text">Movie</p>
                    <input type="file" id="filem" name="file">
                  </label>
                  @if($errors->has('file'))
                    @foreach ($errors->get('file') as $error)
                      <span class="error">{{ $error }}</span><br>
                    @endforeach
                  @endif
                </div><br>
                <div id="tform">
                  <label id="thumbnail_post"><p class="movie__button--text">Thumbnail</p>
                    <input type="file" id="filet" name="thumbnail">
                  </label>
                  @if($errors->has('thumbnail'))
                    @foreach ($errors->get('thumbnail') as $error)
                      <span class="error">{{ $error }}</span><br>
                    @endforeach
                  @endif
                </div><br>
                <button type="submit" value="書き込む">POST</button>
              </form>
            </div>
          </div>
          <div id="movies">
            <?php foreach($movies as $value):  ?>
              <div class="thumb">
                <a href="movie/{{$value->id}}"><img src="{{$value->thumbnail}}"></a>
                <p id="movie_title"><a href="movie/{{$value->id}}">{{ $value->text }}</a></p>
                <p id="movie_time">{{ $value->time->format('Y-m-d') }}</p>
                <div id="movie_2">
                  <p id="movie_title2"><a href="movie/{{$value->id}}">{{ $value->text }}</a></p>
                  <p id="movie_time2">{{ $value->time }}</p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </body>
</html>
