@extends('layouts.main')
@section('content')
<div>
    <div>{{ $movie->id }}. {{ $movie->title }}</div>
    <div>{{ $movie->genre }}</div>
    <div>{{ $movie->director }}</div>
    <div>{{ $movie->release }}</div>
    <div>{{ $movie->rating }}</div>
    <div><a href="{{ route('movie.edit', $movie->id) }}">Edit</a></div>
    <form action="{{ route('movie.delete', $movie->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" class="link-danger" value="&#8595; Delete">
    </form>
    <div><a href="{{ route('movie.index') }}">Back</a></div>
</div>
@endsection
