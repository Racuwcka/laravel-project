@extends('layouts.main')
@section('content')
    <div>
        <div>{{ $post->id }}. {{ $post->title }}</div>
        <div>{{ $post->post_content }}</div>
    </div>
    <div>
        <a href="{{ route('post.edit', $post->id) }}" class="link-success">&#8593; Edit</a>
    </div>
    <div>
        <form action="{{ route('post.delete', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="link-danger" value="&#8595; Delete">
        </form>
    </div>
    <div>
        <a href="{{ route('post.index') }}" class="link-dark">&#8592; Back</a>
    </div>
@endsection
