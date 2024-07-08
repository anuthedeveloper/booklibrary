@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
                <img src="{{ $book['cover_image'] }}" class="card-img-top" alt="{{ $book['title'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $book['title'] }}</h5>
                    <p class="card-text"><strong>Author:</strong> {{ $book['author'] }}</p>
                    <p class="card-text">{{ $book['description'] }}</p>
                    <p class="card-text"><strong>ISBN:</strong> {{ $book['isbn'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
