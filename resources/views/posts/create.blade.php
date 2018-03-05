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
                <a id="eswitch" class="bswitch navbar-brand" href="#">Editor</a>
                <a id="pswitch" class="bswitch navbar-brand" href="#">Preview</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div id="admin-article" class="form-group">
                {!! Form::textarea('content', '', ['id' => 'editor', 'class' => 'form-control switch eswitch', 'ondragover' => 'dragover(event)', 'ondrop' => 'drop(event)']) !!}
                <div id="preview" class="switch pswitch" style="display:none"></div>
              </div>
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
      $(document).ready(function() {
        $('#tags').tagsInput({
          height: '90px',
          width: '730px',
        });

        $('.bswitch').on('click', function() {
          $('#admin-article .switch').hide();
          $('.' + this.id).show();
        });

        marked.setOptions({
          langPrefix: '',
        });

        $('#editor').keyup(function() {
          var html = marked($(this).val());
          $('#preview').html(html);

          $('#preview pre code').each(function(i, e) {
            hljs.highlightBlock(e, e.className);
          });
        });
      });
    </script>
@endsection
