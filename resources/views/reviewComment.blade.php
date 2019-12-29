<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/mypage.js') }}"></script>
        <title>Magic Room</title>
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyD3J7gJb9WgxkAiNRJ6r_hRw---SSRC2ZE&language=ja"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    </head>
    <body class="review">
      <a href="{{ url('review') }}"><h3 class="review__link">&ltBefore</h3></a>
      <div class="review__content">
        <div class="review__title">
          <a href="{{ url('/') }}"><h1 id="main_title">Magic Room</h1></a>
        </div>
          <div class="review__view">
            <h1 class="review__view--title">{{ $reviews[0]->age }}/{{ $reviews[0]->university }}</h1>
            <?php foreach($reviews as $value):  ?>
              <div class="review__comment">
                <p class="review__text--category">{{ $value->category }}</p>
                <div class="review__text">{!! nl2br(e($value->text)) !!}</div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
    </body>
</html>
