@extends('layouts.admin')
@section('title', 'Post List')

@section('content')

<section class="section-inner">
  <h1 class="list-ttl">Post List</h1>
  <form action="{{ route('topic.index') }}" method="get">
  <div class="list-header">
      <div class="explore-post">
        <div class="explore-post-item">
          <label class="list-label">Title</label>
        </div>
        <div class="explore-post-item">
          <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
        </div>
        <div class="explore-post-item">
          @csrf
          <input type="submit" class="btn btn-primary" value="Search">
        </div>
      </div>
  </div>
  </form> 
  <div class="list-wrap">
    @foreach($posts as $topic)
    <div class="list-item">
      <div class="list-img-box">
          <img src="{{ secure_asset('storage/image/' . $topic->image_path) }}" class="list-img">
      </div>
      <div class="list-post-ttl">
          <a href="/topic/view?id={{ $topic->id }}"><p class="list-txt">{{ Str::limit($topic->title, 100) }}</p></a>
      </div>
    </div>
    @endforeach
  </div>
</section>

@endsection