<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>rokuyama.daiki</title>
  <!-- Bootstrap -->
  <link href="/packages/admin/AdminLTE/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
</head>
<body>
  <div class="index">
    <!-- header section -->
    <header class="header">
      <h1>daiki.rokuyama</h1>
      <ul class="aside">
        <li style="font-size:2em; color:#315096" class="twitter"><i class="fab fa-facebook-square"></i></li>
        <li style="font-size:2em; color:#55acee" class="facebook"><i class="fab fa-twitter-square"></i></li>
        <li style="font-size:2em; color:#EE4256" class="pocket"><i class="fab fa-get-pocket"></i></li>
      </ul>
    </header><!-- end header section -->

    <div id="main">
      <!-- profile section -->
      <div id="profile" class="column">
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
      </div><!-- end profile section -->

      <div id="content" class="column">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/packages/admin/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
