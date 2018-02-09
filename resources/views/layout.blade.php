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
    <header class="header">
      <h1>DAIKI ROKUYAMA</h1>
      <ul class="aside">
        <li style="font-size:2em; color:#315096" class="twitter"><i class="fab fa-facebook-square"></i></li>
        <li style="font-size:2em; color:#55acee" class="facebook"><i class="fab fa-twitter-square"></i></li>
        <li style="font-size:2em; color:#EE4256" class="pocket"><i class="fab fa-get-pocket"></i></li>
      </ul>
    </header>

    <div id="main" class="main row">
      @yield('content')
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/packages/admin/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
