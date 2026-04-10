@extends('layouts.app')

@section('title', 'My Favorites')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">My Favorite Books</h1>
    
    <div class="row">
        @forelse($books ?? [] as $book)
        <div class="col-md-3 mb-4">
            <div class="card book-card">
                @if(isset($book->thumbnail) && $book->thumbnail)
                    <img src="{{ $book->thumbnail }}" alt="{{ $book->title }}">
                @else
                    <img src="https://via.placeholder.com/300x250?text=No+Cover" alt="No cover">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ Str::limit($book->title ?? 'Unknown', 30) }}</h5>
                    <p class="card-text">
                        @if(isset($book->authors) && $book->authors)
                            {{ is_array($book->authors) ? implode(', ', array_slice($book->authors, 0, 2)) : $book->authors }}
                        @endif
                    </p>
                    <a href="{{ route('books.show', $book->google_books_id) }}" class="btn btn-primary w-100 mb-2">View Details</a>
                    <button class="btn btn-favorite w-100 toggle-favorite" data-book-id="{{ $book->google_books_id }}">
                        <i class="bi bi-heart-fill"></i> Remove
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="fs-4">You haven't added any favorites yet.</p>
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg">Browse Books</a>
        </div>
        @endforelse
    </div>
    
    @if(isset($books) && method_exists($books, 'links'))
    <div class="d-flex justify-content-center mt-4">
        {{ $books->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.toggle-favorite').click(function() {
        var button = $(this);
        var bookId = button.data('book-id');
        
        $.ajax({
            url: '/books/' + bookId + '/toggle-favorite',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (!response.is_favorite) {
                    button.closest('.col-md-3').fadeOut();
                }
                alert(response.message);
            },
            error: function() {
                alert('Error toggling favorite');
            }
        });
    });
});
</script>
@endpush