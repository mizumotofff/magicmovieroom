@extends('layouts.app')

@section('content')
<div class="loggedin">
    <div id="title">
      <a href="/"><h1 id="main_title">Magic Room</h1></a>
    </div>
    <div class="loggedin__message">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif

      ログイン済みです
    </div>
</div>
@endsection
