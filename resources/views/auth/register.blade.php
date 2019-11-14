@extends('layouts.app')

@section('content')
<div class="container">
  <header class="header">
  @guest
      <a class="header__login" href="{{ route('login') }}">{{ __('Login') }}</a>
      <a class="header__register" href="{{ route('register') }}">{{ __('Register') }}</a>
  @endguest
                <div class="register">
                    <h1 class="register__title">Register</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="register__form">
                            <label for="name" class="register__form--title">{{ __('Name') }}</label><br>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <br><span class="register__form--error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="register__form">
                            <label for="email" class="cregister__form--title">{{ __('E-Mail Address') }}</label><br>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                    <br><span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="register__form">
                            <label for="password" class="register__form--title">{{ __('Password') }}</label><br>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <br><span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="register__form">
                            <label for="password-confirm" class="register__form--title">{{ __('Confirm Password') }}</label><br>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="register__form">
                            <button type="submit" class="register__submit--button">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
</div>
@endsection
