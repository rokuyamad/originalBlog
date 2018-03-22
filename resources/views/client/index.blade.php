@extends('layout')

@section('content')

  <div class="parent-article animsition">
    @foreach ($posts as $post)
      <article>
        <div class="thumbnail-wrap">
          <a href="/posts/{{ $post->id }}">
            {{-- <div class="thumbnail-image" style="background-image:url({{ asset("/image/thumbImages/{$post->top_image}") }}")></div> --}}
            <img class="thumbnail-image" src="{{ asset("/image/thumbImages/{$post->top_image}") }}" alt="">
            <div class="mask">
              <div class="caption">READ MORE ...</div>
            </div>
          </a>
        </div>

        <div class="button">
          <button class="btn btn-primary btn-xs">{{ $post->category->category_name }}</button>
          @foreach ($post->tags as $tag)
            <button class="btn btn-success btn-xs">{{ $tag->tag_name }}</button>
          @endforeach
        </div>

        <div class="thumbnail-title">
          <a href="/posts/{{ $post->id }}"><h2>{{ $post->title }}</h2></a>
        </div>
      </article>
    @endforeach
    <div id="paginaton">
      {{ $posts->render() }}
    </div>
  </div>
@endsection
