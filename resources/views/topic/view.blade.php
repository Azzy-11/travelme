@extends('layouts.admin')

@section('title','POST|TravelMe')

@section('content')
<section class="section-inner">
  <h1 class="post-ttl">POST</h1>
    <div class="post-wrap">
      <div class="left-container">
        <table class="post-table">
          <tr class="post-row">
            <th class="post-head">TITLE</th>
            <td class="post-data">{{ Str::limit($post->title, 70) }}</td>
          </tr>
          <tr class="post-row">
            <th class="post-head">LOCATION</th>
            <td class="post-data">{{ Str::limit($post->location, 10) }}</td>
          </tr>
          <tr class="post-row">
            <th class="post-head">GENRE</th>
              <td class="post-data">{{ Str::limit($post->genre, 20) }}</td>
          </tr>
          <tr class="post-row">
            <th class="post-head">BODY</th>
            <td class="post-data">{{ Str::limit($post->body, 70) }}</td>
          </tr>
        </table>
      </div>  
      <div class="right-container">
        <table class="post-table">
          <tr class="post-row">
            <th class="post-head">Picture</th>
            <td class="post-data">
              @if ($post->image_path)
                <img class="post-img" src="{{ secure_asset('storage/image/' . $post->image_path) }}">
              @endif
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="post-btn">
        @csrf
    </div>
</section>
@endsection