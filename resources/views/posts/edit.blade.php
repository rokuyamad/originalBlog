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
              {!! Form::model($post, ['url' => "/admin/posts/{$post->id}", 'method' => 'patch', 'files' => true]) !!}

                <div class="form-group col-md-12">
                  {!! Form::label('title', 'Title') !!}
                  {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'タイトルを入力してください。']) !!}
                </div>

                <div class="form-group col-md-4">
                  {!! Form::label('image') !!}
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

                <div class="form-group col-md-4" style="height:228px;">
                  {!! Form::label('category') !!}
                  <div style="height:203px;border:1px solid #CCC;padding:15px;">
                    @for ($i = 0; $i < $categories->count(); $i++)
                      <div style="height:57px;display:table;">
                      @if ($post->category_id == $categories[$i]->id)
                        {{Form::radio('category_id', $categories[$i]->id, true, ['class' => 'radio02-input', 'id' => "radio02-0{$i}"])}}
                      @else
                        {{Form::radio('category_id', $categories[$i]->id, false, ['class' => 'radio02-input', 'id' => "radio02-0{$i}"])}}
                      @endif
                        <label for="radio02-0{{$i}}" style="display:table-cell;vertical-align:middle;">{{ $categories[$i]->category_name }}</label> <br>
                      </div>
                    @endfor
                  </div>
                </div>

                <div class="form-group col-md-4" style="height:228px;">
                  {!! Form::label('tags') !!}
                  {!! Form::text('tags', $tags_comma_separated, ['id' => 'tags', 'class' => 'form-control', 'placeholder' => 'タグを入力して下さい。']) !!}
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
                      {!! Form::textarea('content', $post->content, ['id' => 'editor', 'class' => 'form-control switch eswitch', 'ondragover' => 'dragover(event)', 'ondrop' => 'drop(event)']) !!}
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

    <script>
      $('#tags').tagsInput({
        height: '203px',
        width: '100%'
      });

      $('.bswitch').on('click', function() {
        $('#admin-article .switch').hide();
        $('.' + this.id).show();
      });

      $(function() {
        marked.setOptions({
          langPrefix: '',
        });

        // only edit.blade.php
        var preHtml = marked($('#editor').val());
        $('#preview').html(preHtml);
        $('#preview pre code').each(function(i, e) {
          hljs.highlightBlock(e, e.className);
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
