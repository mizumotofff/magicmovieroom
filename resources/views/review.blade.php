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
      <a href="/"><h3 class="review__link">&ltBefore</h3></a>
      <div class="review__content">
        <div class="review__title">
          <a href="/"><h1 id="main_title">Magic Room</h1></a>
        </div>
        <div class="review__univs">
          <div class="review__univ">
            <p class="review__univ--title">マギーグルッペ</p>
            <div class="review__age">
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
            </div>
          </div>
          <div class="review__univ">
            <p class="review__univ--title">フェロー</p>
            <div class="review__age">
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
            </div>
          </div>
          <div class="review__univ">
            <p class="review__univ--title">東洋</p>
            <div class="review__age">
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
              <a href="reviews/マギー/1976"><p class="review__age--link">2012</p></a>
            </div>
          </div>

          </div>
        <div class="review__form">
              <form action="review_store" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <br>
                <span id="comment_title">University</span><br>
                <!-- <input type="text" class="text" name="university"><br> -->
                <select name="university">
                  <option value="マギー">マギー</option>
                  <option value="フェロー">フェロー</option>
                  <option value="東洋">東洋</option>
                  <option value="早稲田">早稲田</option>
                  <option value="法政">法政</option>
                  <option value="千葉">千葉</option>
                  <option value="成蹊">成蹊</option>
                  <option value="慶應">慶應</option>
                  <option value="筑波">筑波</option>
                  <option value="東大">東大</option>
                  <option value="関西">関西</option>
                  <option value="FISM">FISM</option>
                  <option value="その他">その他</option>
                </select><br>
                <span id="comment_title">age</span><br>
                <input type="number" class="text" name="age" value="2019"><br>
                <span id="comment_title">category</span><br>
                <select name="category">
                  <option value="カード">カード</option>
                  <option value="鳩">鳩</option>
                  <option value="ウォンド">ウォンド</option>
                  <option value="チップ">チップ</option>
                  <option value="シンブル">シンブル</option>
                  <option value="四つ玉">四つ玉</option>
                  <option value="マスク">マスク</option>
                  <option value="リング">リング</option>
                  <option value="ディスク">ディスク</option>
                </select><br>
                <!-- <input type="text" class="text" name="category"><br> -->
                <span id="comment_title">review</span><br>
                <textarea class="text" name="text"></textarea><br>
                <button class="review__form--button" type="submit" value="書き込む">POST</button>
              </form>
          </div>
        </div>
    </body>
</html>
