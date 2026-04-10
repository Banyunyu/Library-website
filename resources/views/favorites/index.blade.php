@extends('layouts.app')

@section('title', 'Novel Favorit')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12">
    <!-- Header -->
    <div class="mb-8" data-aos="fade-down">
        <h1 class="text-4xl font-bold text-[#2C3E50] mb-4">Novel Favoritku</h1>
        <p class="text-gray-600">Koleksi novel yang kamu suka dan simpan</p>
    </div>

    <!-- Favorites Grid -->
    @if($favorites->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($favorites as $index => $favorite)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover flex flex-col relative group" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $index * 50 }}">
                
                <!-- Badge Favorite -->
                <div class="absolute top-3 left-3 z-10">
                    <span class="bg-[#E67E22] text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg flex items-center">
                        <i class="fas fa-heart mr-1"></i> Favorit
                    </span>
                </div>
                
                <a href="{{ route('books.show', $favorite->book) }}" class="block flex flex-col h-full">
                    <!-- Cover dengan rasio A4 -->
                    <div class="relative bg-[#ECF0F1] w-full" style="padding-bottom: 141.4%;">
                        <div class="absolute inset-0 flex items-center justify-center overflow-hidden">
                            @if($favorite->book->thumbnail_url)
                                <img src="{{ $favorite->book->thumbnail_url }}" 
                                     alt="{{ $favorite->book->title }}" 
                                     class="w-full h-full object-cover object-center"
                                     loading="lazy">
                            @else
                                <div class="flex flex-col items-center justify-center w-full h-full bg-gradient-to-br from-[#ECF0F1] to-gray-200">
                                    <i class="fas fa-book-open text-6xl text-[#2C3E50] mb-2 opacity-50"></i>
                                    <span class="text-xs text-gray-500 font-medium">No Cover</span>
                                </div>
                            @endif
                            
                            <!-- Genre Badge -->
                            @if($favorite->book->genre)
                                <div class="absolute top-3 right-3">
                                    <span class="bg-[#2C3E50] text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg">
                                        {{ $favorite->book->genre }}
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Info Buku -->
                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="font-bold text-lg text-[#2C3E50] mb-1 hover:text-[#E67E22] transition line-clamp-2">
                            {{ $favorite->book->title }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-2">{{ $favorite->book->authors_display }}</p>
                        
                        <!-- Deskripsi singkat -->
                        @if($favorite->book->description)
                            <p class="text-gray-500 text-sm line-clamp-3 mb-4 flex-1">{{ strip_tags($favorite->book->description) }}</p>
                        @else
                            <p class="text-gray-400 text-sm italic mb-4 flex-1">Tidak ada deskripsi</p>
                        @endif
                        
                        <!-- Footer -->
                        <div class="mt-auto flex justify-between items-center pt-3 border-t border-gray-100">
                            <span class="text-sm text-gray-500 flex items-center">
                                <i class="fas fa-copy mr-1"></i>
                                <span>Stok: <span class="font-semibold {{ $favorite->book->stock > 0 ? 'text-green-600' : 'text-red-600' }}">{{ $favorite->book->stock ?? 0 }}</span></span>
                            </span>
                            
                            <!-- Tombol Hapus dari Favorit dengan SweetAlert -->
                            <form action="{{ route('favorites.destroy', $favorite->book) }}" method="POST" class="inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="delete-btn text-red-500 hover:text-red-700 transition transform hover:scale-110"
                                        data-title="{{ $favorite->book->title }}"
                                        title="Hapus dari favorit">
                                    <i class="fas fa-trash text-xl"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($favorites->hasPages())
            <div class="mt-12 pb-8" data-aos="fade-up">
                <div class="flex justify-center">
                    {{ $favorites->links() }}
                </div>
            </div>
        @endif
    @else
        <!-- Empty State -->
        <div class="text-center py-16" data-aos="fade-up">
            <div class="bg-white rounded-xl shadow-lg p-12 max-w-md mx-auto">
                <div class="mb-6">
                    <i class="fas fa-heart text-7xl text-gray-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-2">Belum Ada Novel Favorit</h3>
                <p class="text-gray-500 mb-6">
                    Kamu belum menambahkan novel ke favorit. Yuk jelajahi novel-novel keren dan klik tombol love ❤️
                </p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('books.index') }}" 
                       class="bg-[#E67E22] hover:bg-[#D35400] text-white px-6 py-3 rounded-lg transition inline-flex items-center space-x-2">
                        <i class="fas fa-book-open"></i>
                        <span>Jelajahi Novel</span>
                    </a>
                </div>
                <!-- Contoh animasi love -->
                <div class="mt-8 text-gray-400 text-sm">
                    <span class="inline-block animate-bounce mx-1">❤️</span>
                    <span class="inline-block animate-bounce mx-1" style="animation-delay: 0.1s">❤️</span>
                    <span class="inline-block animate-bounce mx-1" style="animation-delay: 0.2s">❤️</span>
                </div>
            </div>
        </div>
    @endif
</div>

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
</style>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Konfirmasi hapus dari favorit dengan SweetAlert2
        const deleteButtons = document.querySelectorAll('.delete-btn');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');
                const bookTitle = this.dataset.title;
                
                Swal.fire({
                    title: 'Hapus dari Favorit?',
                    html: `Kamu yakin ingin menghapus <b>"${bookTitle}"</b> dari daftar favorit?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#2C3E50',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    background: '#fff',
                    customClass: {
                        title: 'text-[#2C3E50] font-bold text-xl',
                        htmlContainer: 'text-gray-600',
                        confirmButton: 'bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2 rounded-lg mx-1',
                        cancelButton: 'bg-[#2C3E50] hover:bg-[#1A252F] text-white font-medium px-5 py-2 rounded-lg mx-1'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
@endsection