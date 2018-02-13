@extends('layout')

@section('content')
  <div id="profile" class="col-md-2 column">
    <div class="outer">
      <div class="picture">
        <img src="{{ asset("image/avatars/sample.png") }}" alt="">
      </div>
      <div class="mynameis">
        <p>DAIKI ROKUYAMA</p>
      </div>
      <div class="links">
        <ul>
          <li class="twitter">
            <a href="https://twitter.com/DRokuyama" style="color:#55acee"><i class="fab fa-twitter-square"></i>Twitter</a>
          </li>
          <li class="facebook">
            <a href="https://www.facebook.com/daiki.rokuyama" style="color:#315096"><i class="fab fa-facebook-square"></i>facebook</a>
          </li>
          <li>
            <a href="https://github.com/daikirokuyama" style="color:black"><i class="fab fa-github-square"></i>Github</a>
          </li>
          <li>
            <a href="mailto:dr19950228@gmail.com" style="color:black"><i class="fas fa-envelope"></i>Mail</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-3 column">
    <h1 class="category">IT</h1>
  </div>
  <div class="col-md-3 column">
    <h1 class="category">English</h1>
  </div>
  <div class="col-md-3 column">
    <h1 class="category">Diary</h1>
  </div>
@endsection
