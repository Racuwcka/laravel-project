@extends('layouts.main')
@section('content')
<div>
    <div><a href="{{ route('movie.create') }}">Add movie</a></div>
    @foreach($movies as $movie)
        <div>{{ $movie->id }}. {{ $movie->title }}</div>
    @endforeach
</div>
@endsection
