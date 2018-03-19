<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>rokuyama.daiki</title>
  <!-- Bootstrap -->
  <link href="/packages/admin/AdminLTE/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset("/lib/highlight/style/solarized-dark.css") }}">
  <link rel="stylesheet" href="{{ asset("/css/style.css") }}">
  <link rel="stylesheet" href="{{ asset("/css/markdown.css") }}">
</head>
<body>
  <div class="index">

    <!-- header section -->
    @include('partials.header')

    <!-- .articel section -->
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

      {{-- <section id="article-content">{{ $post->content }}</section> --}}
      <section class="article-content"></section>
    </div><!-- end .articel section -->

  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/packages/admin/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ asset ("/lib/marked/js/marked.min.js") }}"></script>
  <script src="{{ asset ("/lib/highlight/js/highlight.pack.js") }}"></script>
  <script>
    marked.setOptions({
      langPrefix: ""
    });

    <?php
      $content = $post->content;
      $order_break = array("\r\n", "\n", "\r");
      $replace_break = '\n';
      $order_quotation = array("\"");
      $replace_quotation = '\"';
      $content = str_replace($order_break, $replace_break, $content);
      $content = str_replace($order_quotation, $replace_quotation, $content);
    ?>

    var html = marked("<?php echo $content ?>");
    var mapRe = /\{\{\{(.+?), (.+?)\}\}\}/g;
    var mapArray;
    var mapHash;
    var pointArray = [];
    var i = 0;

    while ((mapArray = mapRe.exec(html)) !== null)
    {
      // add latitude and lngitude to mapHash
      mapHash = {lat: mapArray[1], lng: mapArray[2]};
      // add hashMap to pointArray
      pointArray.push(mapHash);
      // compiled from latlng to div element
      html = html.replace(mapArray[0], `<div id="map${i}" style="height:400px;"></div>`)
      i++;
    }

    // add compiled source to html element
    $(".article-content").html(html);
    $(".article-content pre code").each(function(i, e) {
      hljs.highlightBlock(e, e.className);
    });

    // create map and marker
    function initMap() {
      for (var i = 0; i < pointArray.length; i++) {
        var lat = parseFloat(pointArray[i]['lat']);
        var lng = parseFloat(pointArray[i]['lng']);
        var latlng = {lat: lat, lng: lng};
        var map = new google.maps.Map(document.getElementById(`map${i}`), {
          zoom: 15,
          center: latlng
        });
        var marker = new google.maps.Marker({
          position: latlng,
          map: map
        });
      }
    }
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxlu4PN4SAHSfgjUQzMWVfK8o5YmnXYEU&callback=initMap">
  </script>
</body>
</html>
