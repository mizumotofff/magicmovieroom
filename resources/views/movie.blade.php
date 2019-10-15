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
          <a href="/"><h1 id="main_title">Magic Room</h1></a>

        </div>
        <video src="https://magic-movie.s3.ap-northeast-1.amazonaws.com/gunman.mp4?response-content-disposition=inline&X-Amz-Security-Token=AgoJb3JpZ2luX2VjEEsaDmFwLW5vcnRoZWFzdC0xIkcwRQIgX2hoOObjF4unQuNscpRgDgN7HE4gL7ANfs48fTT0mEkCIQDGHCDCk2uMyqj3Azt6BRzsbbhZDaw5nBIlqX4QhvrMDCrbAwhEEAEaDDIxNjc5OTE0OTc3MyIMVtbD%2BOsWe2GHBYY6KrgDHRo%2FsHHHb%2BOuX6HV6BKKK5NlwozFRdnfZANja9rodVgDISPSGbOStvnR%2FJvdnUd7GVBgORsvR3n76%2BZ6icK5sCfY76eCE5LsoVVU9yISXl6D5RGYcGta8qjHylP%2FLDm%2FzlRZrf889S%2BwgyNjPd7eT6Fx4eDMTjxmCU0Qn91uYT%2BPE9iRpSHLO7BgIFZHm7SmNrt6FbEXjemYa1rKCifhbmOkdOM4x9zRRaG%2BLUFnSrG%2Fcw3BQQMbwxrtVA6VoN%2BACJIOYGVCOJpvep%2F%2BthNmmr5CdRArINRX7sGvgwuSuMBOSjA05NulK1r0O8A58IKLdWV3x6MaiuR2J4qCRQqyoP5zZHMOGIHpWNCb%2Bu9cGUnyKMAZLTnhf1tqyyd9V7RbpJUgnWMQiwdfXcarV6MbOqR5PwMCZ%2Bzgmq90KADHt9KrQHXXOPBReJ0QJtTaA0gdO63BKCmb8uQXoWiFGgWOaYf7U1RRnkAnAVi9DCpp6N4adiO6G2H7ZP%2BLbeQfbCAZAKj9rqh6PA74ux8kYWyPCOzlnxfKfxDT%2BjzR88V0nYNpXflq5n%2BOwLGSIiUgCFTzLGROFBsGMuUwtK%2BW7QU6tAFdqk0z2bB%2FPJiQajTUe4mspUOzIno0gTLoWuqIcQA%2FnTwee%2FvC%2ByuDRmbJBrPVlWhBRVbVH5sKeZ80cMbOl3KWSE6oGgh2VGbpEjF%2B1rHBhXWf3riVzlK%2BtgFOCOnGmwzU04qkN4IZJ3FIm3M%2FOgIb1xQRGkhkvvwCMeZPpailOR4LmYTzFANWlFnOa4NsoI%2BJvp9FUNweR0mE5Cyq3b%2FEkt4jwWydboU1QynUw8arPwuVxSk%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20191015T114216Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIATE6R4P3GR6MFX7VR%2F20191015%2Fap-northeast-1%2Fs3%2Faws4_request&X-Amz-Signature=b20b0121647257fc96d47b9b95a51b8a68cb8a998b737c79fb336fc4bb059445" controls></video>
        <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $movie->movie }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
      </div>

      <div id="comment_form">
        <?php foreach($texts as $value):  ?>
          <div class="comment">
            <div id="comment_text">{!! nl2br(e($value->text)) !!}</div>
            <p id="contributor">by {{ $value->name }}</p>
        </div>
        <?php endforeach; ?>
        <form method="POST" action="/comment">
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
