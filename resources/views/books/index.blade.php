@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2xl">Books</h1>

    <form class="mb-4 flex items-center space-x-2" method="GET" action="{{ route('books.index') }}">
      <input class="input h-10" type="text" name="title" placeholder="Search by title" value="{{ request('title') }}">
      <button class="btn h-10" type="submit">SEARCH</button>
      <a class="btn h-10" href="{{ route('books.index') }}">CLEAR</a>
    </form>

    <ul>
        @forelse ($books as $book)
          <li class="mb-4">
            <div class="book-item">
              <div
                class="flex flex-wrap items-center justify-between">
                <div class="w-full flex-grow sm:w-auto">
                  <a href="{{ route('books.show', $book) }}" class="book-title">{{ $book->title }}</a>
                  <span class="book-author">by {{ $book->author }}</span>
                </div>
                <div>
                  <div class="book-rating">
                    {{ $book->reviews_avg_rating }} <!-- Seguir editando -->
                  </div>
                  <div class="book-review-count">
                    out of {{ $book->reviews_count }} reviews <!-- Seguir editando -->
                  </div>
                </div>
              </div>
            </div>
          </li>
        @empty
          <li class="mb-4">
            <div class="empty-book-item">
              <p class="empty-text">No books found</p>
              <a href="{{ route('books.index') }}" class="reset-link">Reset criteria</a>
            </div>
          </li>
        @endforelse
      </ul>
@endsection