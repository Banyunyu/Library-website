@extends('layouts.app')

@section('title', 'Daftar Novel')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12">
    <!-- Header -->
    <div class="mb-8" data-aos="fade-down">
        <h1 class="text-4xl font-bold text-[#2C3E50] mb-4">Daftar Novel</h1>
        <p class="text-gray-600">Temukan ribuan novel keren untuk menambah wawasan dan hiburanmu</p>
    </div>

    <!-- Search Bar -->
    <div class="mb-8" data-aos="fade-up" data-aos-delay="100">
        <form action="{{ route('books.index') }}" method="GET" class="flex gap-4">
            <div class="flex-1 relative">
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}"
                       placeholder="Cari judul novel atau penulis..." 
                       class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#E67E22] focus:border-transparent">
            </div>
            <button type="submit" class="bg-[#2C3E50] hover:bg-[#1A252F] text-white px-6 py-3 rounded-lg transition flex items-center space-x-2">
                <i class="fas fa-search"></i>
                <span>Cari</span>
            </button>
        </form>
    </div>

    <!-- Books Grid - UKURAN A4 TETAP -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($books as $index => $book)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover flex flex-col" 
             data-aos="fade-up" 
             data-aos-delay="{{ $index * 50 }}">
            <a href="{{ route('books.show', $book) }}" class="block flex flex-col h-full">
                <!-- Cover dengan rasio A4 -->
                <div class="relative bg-[#ECF0F1] w-full" style="padding-bottom: 141.4%;">
                    <div class="absolute inset-0 flex items-center justify-center overflow-hidden">
                        @if($book->thumbnail_url)
                            <img src="{{ $book->thumbnail_url }}" 
                                 alt="{{ $book->title }}" 
                                 class="w-full h-full object-cover object-center"
                                 loading="lazy">
                        @else
                            <div class="flex flex-col items-center justify-center w-full h-full bg-gradient-to-br from-[#ECF0F1] to-gray-200">
                                <i class="fas fa-book-open text-6xl text-[#2C3E50] mb-2 opacity-50"></i>
                                <span class="text-xs text-gray-500 font-medium">No Cover</span>
                            </div>
                        @endif
                        
                        <!-- Genre Badge -->
                        @if($book->genre)
                            <div class="absolute top-3 left-3">
                                <span class="bg-[#E67E22] text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg">
                                    {{ $book->genre }}
                                </span>
                            </div>
                        @endif
                        
                        <!-- Stock Badge -->
                        <div class="absolute top-3 right-3">
                            @if($book->stock > 0)
                                <span class="bg-green-500 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg">
                                    <i class="fas fa-check-circle mr-1"></i>Tersedia
                                </span>
                            @else
                                <span class="bg-red-500 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg">
                                    <i class="fas fa-times-circle mr-1"></i>Habis
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Info Buku -->
                <div class="p-5 flex-1 flex flex-col">
                    <h3 class="font-bold text-lg text-[#2C3E50] mb-1 hover:text-[#E67E22] transition line-clamp-2">
                        {{ $book->title }}
                    </h3>
                    <p class="text-gray-600 text-sm mb-2">{{ $book->authors_display }}</p>
                    
                    <!-- Genre (opsional) - muncul lagi di bawah penulis -->
                    @if($book->genre)
                        <div class="mb-3">
                            <span class="px-2 py-1 bg-[#E67E22] bg-opacity-10 text-[#E67E22] rounded-full text-xs">
                                <i class="fas fa-tag mr-1"></i>{{ $book->genre }}
                            </span>
                        </div>
                    @endif
                    
                    <!-- Deskripsi singkat -->
                    @if($book->description)
                        <p class="text-gray-500 text-sm line-clamp-3 mb-4 flex-1">{{ strip_tags($book->description) }}</p>
                    @else
                        <p class="text-gray-400 text-sm italic mb-4 flex-1">Tidak ada deskripsi</p>
                    @endif
                    
                    <!-- Footer dengan stok, pinjam, dan favorite -->
                    <div class="mt-auto flex flex-wrap justify-between items-center pt-3 border-t border-gray-100 gap-2">
                        <span class="text-sm text-gray-500 flex items-center">
                            <i class="fas fa-copy mr-1"></i>
                            <span>Stok: <span class="font-semibold {{ $book->stock > 0 ? 'text-green-600' : 'text-red-600' }}">{{ $book->stock ?? 0 }}</span></span>
                        </span>
                        
                        <div class="flex items-center gap-2">
                            @auth
                                <!-- Tombol Pinjam -->
                                @php
                                    $isBorrowed = auth()->user()->borrowedBooks()
                                                    ->where('book_id', $book->id)
                                                    ->where('status', 'dipinjam')
                                                    ->exists();
                                @endphp
                                
                                @if($book->stock > 0)
                                    @if(!$isBorrowed)
                                        <form action="{{ route('books.borrow', $book) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="bg-[#2C3E50] hover:bg-[#1A252F] text-white px-3 py-1.5 rounded-lg text-xs transition flex items-center space-x-1"
                                                    title="Pinjam Novel">
                                                <i class="fas fa-hand-holding-heart"></i>
                                                <span>Pinjam</span>
                                            </button>
                                        </form>
                                    @else
                                        <span class="bg-green-100 text-green-600 px-3 py-1.5 rounded-lg text-xs flex items-center space-x-1">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Dipinjam</span>
                                        </span>
                                    @endif
                                @else
                                    <span class="bg-gray-100 text-gray-400 px-3 py-1.5 rounded-lg text-xs flex items-center space-x-1">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Habis</span>
                                    </span>
                                @endif
                                
                                <!-- Tombol Favorite (Love) -->
                                <form action="{{ route('books.favorite', $book) }}" method="POST" class="inline favorite-form">
                                    @csrf
                                    @php
                                        $isFavorite = auth()->user()->favorites()->where('book_id', $book->id)->exists();
                                    @endphp
                                    <button type="submit" 
                                            class="favorite-btn text-xl transition transform hover:scale-110 focus:outline-none"
                                            data-book-id="{{ $book->id }}"
                                            title="{{ $isFavorite ? 'Hapus dari favorit' : 'Tambah ke favorit' }}">
                                        <i class="fas fa-heart {{ $isFavorite ? 'text-[#E67E22]' : 'text-gray-300 hover:text-[#E67E22]' }}"></i>
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-span-full text-center py-16" data-aos="fade-up">
            <div class="bg-white rounded-xl shadow-lg p-12 max-w-md mx-auto">
                <i class="fas fa-books text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-600 mb-2">Tidak Ada Novel</h3>
                <p class="text-gray-500 mb-6">Belum ada novel yang tersedia saat ini.</p>
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.books.create') }}" 
                           class="inline-flex items-center space-x-2 bg-[#E67E22] hover:bg-[#D35400] text-white px-6 py-3 rounded-lg transition">
                            <i class="fas fa-plus"></i>
                            <span>Tambah Novel</span>
                        </a>
                    @endif
                @endauth
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($books->hasPages())
        <div class="mt-12 pb-8" data-aos="fade-up">
            <div class="flex justify-center">
                {{ $books->links() }}
            </div>
        </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
        transform: translateY(-6px);
        box-shadow: 0 25px 30px -12px rgba(44, 62, 80, 0.25);
    }

    img {
        transition: opacity 0.3s ease;
    }
    
    img[loading="lazy"] {
        opacity: 0;
    }
    
    img.loaded {
        opacity: 1;
    }

    /* Animasi untuk favorite button */
    .favorite-btn {
        transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
    
    .favorite-btn:active {
        transform: scale(1.3);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Loading gambar
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            if (img.complete) {
                img.classList.add('loaded');
            } else {
                img.addEventListener('load', function() {
                    this.classList.add('loaded');
                });
            }
        });

        // Animasi untuk tombol favorite
        document.querySelectorAll('.favorite-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const form = this;
                const button = form.querySelector('.favorite-btn');
                const icon = button.querySelector('i');
                
                // Animasi klik
                button.style.transform = 'scale(1.3)';
                setTimeout(() => {
                    button.style.transform = 'scale(1)';
                }, 200);
                
                // Submit form via AJAX
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: new FormData(form)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.is_favorite) {
                        icon.classList.remove('text-gray-300');
                        icon.classList.add('text-[#E67E22]');
                        button.title = 'Hapus dari favorit';
                        
                        showFlashMessage('❤️ Novel ditambahkan ke favorit', 'success');
                    } else {
                        icon.classList.remove('text-[#E67E22]');
                        icon.classList.add('text-gray-300');
                        button.title = 'Tambah ke favorit';
                        
                        showFlashMessage('✖️ Novel dihapus dari favorit', 'success');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    form.submit();
                });
            });
        });

        function showFlashMessage(message, type) {
            if (document.getElementById('custom-flash')) {
                document.getElementById('custom-flash').remove();
            }
            
            const flashDiv = document.createElement('div');
            flashDiv.id = 'custom-flash';
            flashDiv.className = `fixed top-20 right-5 z-50 max-w-md flash-animation`;
            flashDiv.innerHTML = `
                <div class="bg-${type === 'success' ? 'green' : 'red'}-100 border-l-4 border-${type === 'success' ? 'green' : 'red'}-500 text-${type === 'success' ? 'green' : 'red'}-700 p-4 rounded-lg shadow-xl flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} text-${type === 'success' ? 'green' : 'red'}-500 text-xl"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium">${message}</p>
                        </div>
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-${type === 'success' ? 'green' : 'red'}-700 hover:text-${type === 'success' ? 'green' : 'red'}-900">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            
            document.body.appendChild(flashDiv);
            
            setTimeout(() => {
                const flash = document.getElementById('custom-flash');
                if (flash) {
                    flash.style.transition = 'opacity 0.5s ease';
                    flash.style.opacity = '0';
                    setTimeout(() => flash.remove(), 500);
                }
            }, 3000);
        }
    });
</script>
@endpush