@extends('admin::index')

@section('content')
    <section class="content-header">
        <h1>
            {{ $header or trans('admin::lang.title') }}
            <small>{{ $description or trans('admin::lang.description') }}</small>
        </h1>

    </section>

    <section class="content">
      <div class="container">
        {!! Form::model($post, ['url' => "/admin/posts/{$post->id}", 'method' => 'patch', 'files' => true]) !!}

          <div class="form-group col-md-12">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'タイトルを入力してください。']) !!}
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
              {!! Form::select('category_id', $categories, $post->category_name, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('tags') !!}
              {!! Form::text('tags', $tags_comma_separated, ['id' => 'tags', 'class' => 'form-control', 'placeholder' => 'タグを入力して下さい。']) !!}
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
                <a id="eswitch" class="bswitch navbar-brand" href="#">Editor</a>
                <a id="pswitch" class="bswitch navbar-brand" href="#">Preview</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div id="admin-article" class="form-group">
                  {!! Form::textarea('content', $post->content, ['id' => 'editor', 'class' => 'form-control eswitch', 'rows' => '20']) !!}
                  {!! Form::textarea('content', '', ['id' => 'preview', 'class' => 'form-control pswitch', 'rows' => '20', 'style' => 'display:none;']) !!}
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
@endsection
