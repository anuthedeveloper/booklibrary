@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($books as $book)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ $book['cover_image'] }}" class="card-img-top" alt="{{ $book['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book['title'] }}</h5>
                        <p class="card-text">{{ $book['author'] }}</p>
                        <a href="{{ route('books.show', $book['id']) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
