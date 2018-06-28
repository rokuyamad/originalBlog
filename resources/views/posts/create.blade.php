@extends('admin::index')

@section('content')
  <section class="content-header">
    <h1>
        {{ $header or trans('admin::lang.title') }}
        <small>{{ $description or trans('admin::lang.description') }}</small>
    </h1>
  </section>

  <section class="content">

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Create</h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body">

          <div class="container">
            {!! Form::model($post, ['url' => "/admin/posts", 'files' => true]) !!}

              @if (count($errors) > 0)
                  <div class="alert alert-danger alert-dismissable">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <div class="form-group col-md-12">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'タイトルを入力してください。']) !!}
              </div>

              <div class="form-group col-md-4">
                {!! Form::label('image') !!}
                <div class="imagePreview"></div>
                <div class="input-group">
                  <label class="input-group-btn">
                    <span class="btn btn-primary">
                      Choose top image{!! Form::file('image', ['style' => 'display:none']) !!}
                    </span>
                  </label>
                  <input type="text" class="form-control" readonly="">
                </div>
              </div>

              <div class="form-group col-md-4" style="height:228px;">
                {!! Form::label('category') !!}
                <div class="category-container" style="height:203px;">
                  <ul class="category-list">
                  @for ($i = 0; $i < $categories->count(); $i++)
                    <li class="list__item">
                      {{Form::radio('category_id', $categories[$i]->id, false, ['class' => 'radio-btn', 'id' => "radio{$i}"])}}
                      <label for="radio{{$i}}" class="radio-label">{{ $categories[$i]->category_name }}</label> <br>
                    </li>
                  @endfor
                  </ul>
                </div>
              </div>

              <div class="form-group col-md-4" style="height:228px;">
                {!! Form::label('tags') !!}
                {!! Form::text('tags', '', ['id' => 'tags', 'class' => 'form-control', 'placeholder' => 'タグを入力して下さい。']) !!}
              </div>

              <div class="form-group col-md-12">
                <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <a id="eswitch" class="bswitch navbar-brand" href="javascrpt:void(0)">Editor</a>
                    <a id="pswitch" class="bswitch navbar-brand" href="javascrpt:void(0)">Preview</a>
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div id="admin-article" class="form-group">
                    {!! Form::textarea('content', '', ['id' => 'editor', 'class' => 'form-control switch eswitch', 'ondragover' => 'dragover(event)', 'ondrop' => 'drop(event)']) !!}
                    <div id="preview" class="switch pswitch article-content" style="display:none"></div>
                  </div>
                </div><!-- /.container-fluid -->
               </nav>
              </div>

              <div class="form-group col-md-12">
                {{ Form::submit('Click Me!', ['class' => 'btn btn-primary form-control']) }}
              </div>

            {!! Form::close() !!}
          </div>
        </div>
        <!-- /.box-body -->
    </div>

  </section>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjkMGt-eCg8TU8RIYge-LxOMk-R9IOb9Y"></script>
  <script>
    $(function() {
      $('#tags').tagsInput({
        height: '203px',
        width: '100%'
      });

      $('.bswitch').on('click', function() {
        $('#admin-article .switch').hide();
        $('.' + this.id).show();
      });

      marked.setOptions({
        langPrefix: '',
      });
    });

    $('#editor').keyup(function() {
      var html = marked($(this).val());
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
        html = html.replace(mapArray[0], `<div id="map${i}" style="height:400px;"><\/div>`);
        i++;
      }

      $('#preview').html(html);
      $('#preview pre code').each(function(i, e) {
        hljs.highlightBlock(e, e.className);
      });
      initMap(pointArray);
    });

      function initMap(pointArray) {
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
@endsection
