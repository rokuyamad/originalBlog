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

  <div class="main">
    <div class="article">

      <div class="eyecatch-cover">
        <div class="eyecatch">
          <img src="{{ asset("/image/topImages/{$post->top_image}") }}" alt="">
        </div>
      </div>

      <div id="article-header">
        <h1>{{ $post->title }}</h1>
        <div class="date">
          {{ $post->created_at->format('Y.m.d') }} [
          <a href="/">{{ $post->category->category_name }}</a>
          ]
        </div>
      </div>

      <section>{{ $post->content }}</section>
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/packages/admin/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
