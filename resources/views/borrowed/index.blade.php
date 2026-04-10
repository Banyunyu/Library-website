@extends('layouts.app')

@section('title', 'Novel Dipinjam')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="mb-10 text-center" data-aos="fade-down">
        <h1 class="text-5xl font-bold text-[#2C3E50] mb-4">📚 Novel Dipinjam</h1>
        <p class="text-gray-500 text-lg">Koleksi novel yang sedang kamu baca</p>
        <div class="w-24 h-1 bg-[#E67E22] mx-auto mt-4 rounded-full"></div>
    </div>

    <!-- Borrowed Books Grid -->
    @if($borrowedBooks->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($borrowedBooks as $index => $borrowed)
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $index * 50 }}">
                
                <a href="{{ route('books.show', $borrowed->book) }}">
                    <div class="relative h-56 overflow-hidden bg-gradient-to-br from-[#2C3E50] to-[#1a252f]">
                        @if($borrowed->book->thumbnail_url)
                            <img src="{{ $borrowed->book->thumbnail_url }}" 
                                 alt="{{ $borrowed->book->title }}" 
                                 class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="fas fa-book-open text-7xl text-white/30"></i>
                            </div>
                        @endif
                        
                        <div class="absolute top-3 left-3">
                            <span class="bg-[#E67E22] text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                                Dipinjam
                            </span>
                        </div>
                        
                        @php
                            $dueDate = \Carbon\Carbon::parse($borrowed->due_date);
                            $isLate = now() > $dueDate;
                        @endphp
                        <div class="absolute top-3 right-3">
                            <span class="{{ $isLate ? 'bg-red-500' : 'bg-green-500' }} text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                                {{ $dueDate->format('d/m/Y') }}
                            </span>
                        </div>
                        
                        @if($borrowed->book->genre)
                            <div class="absolute bottom-3 right-3">
                                <span class="bg-black/50 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $borrowed->book->genre }}
                                </span>
                            </div>
                        @endif
                    </div>
                </a>
                
                <div class="p-5">
                    <a href="{{ route('books.show', $borrowed->book) }}">
                        <h3 class="font-bold text-xl text-[#2C3E50] mb-1 hover:text-[#E67E22] transition line-clamp-1">
                            {{ $borrowed->book->title }}
                        </h3>
                        <p class="text-gray-500 text-sm mb-3">by {{ $borrowed->book->authors_display }}</p>
                    </a>
                    
                    <div class="bg-gray-50 rounded-xl p-3 mb-4">
                        <div class="flex justify-between items-center text-sm mb-2">
                            <span class="text-gray-500">Dipinjam</span>
                            <span class="font-semibold text-gray-700">{{ \Carbon\Carbon::parse($borrowed->borrowed_at)->format('d M Y') }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Batas kembali</span>
                            <span class="font-semibold {{ $isLate ? 'text-red-600' : 'text-green-600' }}">
                                {{ $dueDate->format('d M Y') }}
                                @if($isLate) <span class="text-red-500 ml-1">⚠️</span> @endif
                            </span>
                        </div>
                    </div>
                    
                    <p class="text-gray-400 text-sm line-clamp-2 mb-4">
                        {{ strip_tags($borrowed->book->description ?? 'Tidak ada deskripsi') }}
                    </p>
                    
                    <div class="flex gap-3 mt-4">
                        <a href="{{ route('books.read', $borrowed->book) }}" 
                           class="flex-1 bg-[#2C3E50] hover:bg-[#1A252F] text-white text-center py-3 rounded-xl font-semibold transition duration-200 flex items-center justify-center gap-2">
                            <i class="fas fa-book-open"></i>
                            <span>Baca</span>
                        </a>
                        
                        <form action="{{ route('books.return', $borrowed->book) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="button" 
                                    class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-3 rounded-xl font-semibold transition duration-200 flex items-center justify-center gap-2 return-btn shadow-md"
                                    data-title="{{ $borrowed->book->title }}"
                                    data-author="{{ $borrowed->book->authors_display }}">
                                <i class="fas fa-undo-alt"></i>
                                <span>Kembali</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-20" data-aos="fade-up">
            <div class="bg-white rounded-2xl shadow-xl p-12 max-w-md mx-auto">
                <div class="mb-6">
                    <div class="w-24 h-24 bg-[#E67E22]/10 rounded-full flex items-center justify-center mx-auto">
                        <i class="fas fa-book-open text-5xl text-[#E67E22]"></i>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Novel Dipinjam</h3>
                <p class="text-gray-400 mb-6">
                    Yuk, pinjam novel favoritmu dan mulai petualangan membaca!
                </p>
                <a href="{{ route('books.index') }}" 
                   class="inline-flex items-center gap-2 bg-[#E67E22] hover:bg-[#D35400] text-white px-8 py-3 rounded-xl font-semibold transition duration-200 shadow-lg hover:shadow-xl">
                    <i class="fas fa-search"></i>
                    <span>Jelajahi Novel</span>
                </a>
            </div>
        </div>
    @endif
</div>

<style>
.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const returnButtons = document.querySelectorAll('.return-btn');
        
        returnButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');
                const bookTitle = this.dataset.title;
                const bookAuthor = this.dataset.author;
                
                // DESAIN NOTIFIKASI KEMBALIKAN - BEDA DENGAN HAPUS FAVORIT
                Swal.fire({
                    title: 'Kembalikan Novel',
                    html: `
                        <div class="text-center">
                            <div class="bg-green-50 rounded-xl p-4 my-3">
                                <p class="font-bold text-[#2C3E50] text-lg mb-1">${bookTitle}</p>
                                <p class="text-gray-500 text-sm">oleh ${bookAuthor}</p>
                            </div>
                            <div class="flex items-center justify-center gap-4 text-sm text-gray-500">
                                <span class="flex items-center gap-1">+7 hari</span>
                                <span>•</span>
                                <span class="flex items-center gap-1">+1 stok</span>
                            </div>
                        </div>
                    `,
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#10B981',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Ya, Kembalikan!',
                    cancelButtonText: 'Batal',
                    reverseButtons: false,
                    background: '#fff',
                    customClass: {
                        title: 'text-[#2C3E50] font-bold text-2xl',
                        htmlContainer: 'text-gray-600',
                        confirmButton: 'bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-2.5 rounded-xl mx-1',
                        cancelButton: 'bg-gray-400 hover:bg-gray-500 text-white font-medium px-6 py-2.5 rounded-xl mx-1'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Mengembalikan...',
                            text: 'Sedang memproses pengembalian novel',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        setTimeout(() => form.submit(), 500);
                    }
                });
            });
        });
    });
</script>
@endpush
@endsection