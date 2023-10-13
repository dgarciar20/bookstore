@extends('layouts.web')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <figure class="cover-container">
                <img src="{{ $book->cover->getUrl() }}" class="book-cover" alt="{{ $book->title }}" />
            </figure>
        </div>
        <div class="col-md-9">
            <h1>{{ $book->title }} - <small class="price">Q.{{ $book->price }}</small></h1>
            <h5>{{ $book->author->name }} - {{ $book->published_date }}</h5>
            <p>
                {{$book->description }}
            </p>
            <div class="checkout">
                <a href="{{ route('library.book.buy', $book->id) }}" class="btn btn-warning btn-block" onclick="sendSaleToGa()">Buy for {{ $book->price }} credits</a>
            </div>
        </div>
    </div>
@endsection
