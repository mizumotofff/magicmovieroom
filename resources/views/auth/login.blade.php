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
          <!-- Authentication Links -->
          <header class="header">
          @guest
              <a class="header__login" href="{{ route('login') }}">{{ __('Login') }}</a>
              <a class="header__register" href="{{ route('register') }}">{{ __('Register') }}</a>
          @endguest
        </header>
    <div class="login">
       <div class="login__title">{{ __('Login') }}</div>
       <div class="loginForm">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="loginForm__email">
                <label for="email" class="loginForm__email--label">{{ __('E-Mail Address') }}</label><br>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                   <span class="loginForm__email--error" role="alert">
                     <strong>{{ $message }}</strong>
                   </span>
                @enderror
            </div>
            <div class="loginForm__password">
              <label for="password" class="loginForm__email--label">{{ __('Password') }}</label><br>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                  @error('password')
                <span class="loginForm__password--error" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="loginForm__remember">
              <div class="form-check">
                <input class="loginForm__remember--check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="loginForm__remember--sentence" for="remember">
                      {{ __('Remember Me') }}
                </label>
              </div>
            </div>

            <div class="loginForm__submit">
              <button type="submit" class="loginForm__submit--button">
                      {{ __('Login') }}
              </button>
                @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
              </a>
                @endif
            </div>
          </form>
        </div>
        </div>

</body>
</html>
