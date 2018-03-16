<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>rokuyama.daiki</title>
  <!-- Bootstrap -->
  <link href="/packages/admin/AdminLTE/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('lib/animstion/css/animsition.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/packages/admin/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ asset('lib/animstion/js/animsition.min.js') }}"></script>
</head>
<body>
  <div class="index">

    <!-- header section -->
    @include('partials.header')

    <div id="main" class="column">

      <div id="main-right">
        @yield('content')
      </div>

      <!-- profile section -->
      <div id="profile">
        @include('partials.profile')
      </div>

    </div>

  </div>

  <script>
    $(document).ready(function() {
      $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
      });
    });
  </script>
</body>
</html>
