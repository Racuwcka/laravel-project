@extends('layouts.main')
@section('content')
<div>
    <div class="mb-3"><a href="{{ route('post.create') }}" class="btn btn-success">Add one</a></div>
    @foreach($posts as $post)
        <div><a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a></div>
    @endforeach
</div>
@endsection
