@extends('layouts.main')
@section('content')
<div>
    <form action="{{ route('movie.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" name="genre" class="form-control" id="genre" placeholder="Genre">
        </div>
        <div class="mb-3">
            <label for="director" class="form-label">Director</label>
            <input type="text" name="director" class="form-control" id="director" placeholder="Director">
        </div>
        <div class="mb-3">
            <label for="release" class="form-label">Release</label>
            <input type="text" name="release" class="form-control" id="release" placeholder="Release">
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="text" name="rating" class="form-control" id="rating" placeholder="Rating">
        </div>
        <div class="mb-3">
            <label for="your_rating" class="form-label">Your Rating</label>
            <select class="form-select" name="your_rating" id="your_rating" aria-label="Default select example">
                <option selected>Your Rating</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
