@extends('layouts.main')
@section('content')
<div>
    <div><a href="{{ route('movie.create') }}">Add movie</a></div>
    @foreach($movies as $movie)
        <div><a href="{{ route('movie.show', $movie->id) }}">{{ $movie->id }}. {{ $movie->title }}</a></div>
    @endforeach
</div>
@endsection
