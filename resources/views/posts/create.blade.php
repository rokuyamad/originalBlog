@extends('admin::index')

@section('content')
    <style>
      .imagePreview {
          width: 100%;
          height: 150px;
          background-position: center center;
          background-repeat: no-repeat;
          background-size: contain;
          -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
          display: inline-block;
      }
      .navbar-inverse {
        background-color: #000022;
      }
  </style>

    <section class="content-header">
        <h1>
            {{ $header or trans('admin::lang.title') }}
            <small>{{ $description or trans('admin::lang.description') }}</small>
        </h1>

    </section>

    <section class="content">
      <div class="container">
        {!! Form::model($post, ['url' => "/admin/posts", 'files' => true]) !!}

          <div class="form-group col-md-12">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'タイトルを入力してください。']) !!}
          </div>

          <div class="form-group col-md-4">
            <div class="imagePreview"></div>
            <div class="input-group" style="margin-bottom:15px">
              <label class="input-group-btn">
                <span class="btn btn-primary">
                  Choose top image{!! Form::file('image', ['style' => 'display:none']) !!}
                </span>
              </label>
              <input type="text" class="form-control" readonly="">
            </div>
          </div>

          <div class="form-group col-md-8">
            <div class="form-group">
              {!! Form::label('category') !!}
              {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('tags') !!}
              {!! Form::text('tags', '', ['id' => 'tags', 'class' => 'form-control', 'placeholder' => 'タグを入力して下さい。']) !!}
            </div>
          </div>

          <div class="form-group col-md-12">
            <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Content</a>
                <a class="navbar-brand" href="#">Preview</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="form-group">
                  {!! Form::textarea('content', '', ['class' => 'form-control', 'rows' => '20', 'placeholder' => '記事内容を入力して下さい。']) !!}
                </div>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
           </nav>
          </div>

          <div class="form-group col-md-12">
            {{ Form::submit('Click Me!', ['class' => 'btn btn-primary form-control']) }}
          </div>

        {!! Form::close() !!}
      </div>
    </section>

    <script>
    $(document).on('change', ':file', function() {
        var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.parent().parent().next(':text').val(label);

        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            reader.onloadend = function(){ // set image data as background of div
                input.parent().parent().parent().prev('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
    });

    $('#tags').tagsInput({
        'height':'34px',
        'width':'730px',
    });
    </script>

@endsection
