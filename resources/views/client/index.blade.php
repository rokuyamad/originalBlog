@extends('layout')

@section('content')

  <div class="row row-eq-height">
    @foreach ($posts as $post)
      <div class="col-md-3">
        <img src="{{ asset("/image/topImages/{$post->top_image}") }}" alt="">
        <div class="button">
          <button type="button" class="btn btn-primary btn-xs">{{ $post->category->category_name }}</button>
          @foreach ($post->tags as $tag)
            <button type="button" class="btn btn-success btn-xs">{{ $tag->tag_name }}</button>
          @endforeach
        </div>
        <h2>
          <a id="showPage" href="/posts/{{ $post->id }}">{{ $post->title }}</a>
        </h2>
      </div>
    @endforeach
    <div id="paginaton">
      {{ $posts->render() }}
    </div>
  </div>


@endsection
