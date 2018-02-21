@extends('layout')

@section('content')

  <div class="parent-article">
    @foreach ($posts as $post)
      <article>
        <a href="/posts/{{ $post->id }}">
          <div class="thumbnail-wrap adjust-box">
            <div class="thumbnail-image" style="background-image:url({{ asset("/image/topImages/{$post->top_image}") }}")></div>
          </div>
          <div class="button">
            <button class="btn btn-primary btn-xs">{{ $post->category->category_name }}</button>
            @foreach ($post->tags as $tag)
              <button class="btn btn-success btn-xs">{{ $tag->tag_name }}</button>
            @endforeach
          </div>
          <h2>{{ $post->title }}</h2>
        </a>
      </article>
    @endforeach
    <div id="paginaton">
      {{ $posts->render() }}
    </div>
  </div>
@endsection
