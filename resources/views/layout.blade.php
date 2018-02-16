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
    @include('partials.header')

    <div id="main">

      <div id="main-right" class="column">
        @yield('content')
      </div>

      <!-- profile section -->
      <div id="profile" class="column">
        @include('partials.profile')
      </div>

    </div>

  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/packages/admin/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
