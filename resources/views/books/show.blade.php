@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Back Button -->
    <div class="mb-6" data-aos="fade-right">
        <a href="{{ route('books.index') }}" class="text-[#2C3E50] hover:text-[#E67E22] transition flex items-center space-x-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali ke Daftar Novel</span>
        </a>
    </div>

    <!-- Book Detail -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cover -->
            <div class="lg:col-span-1 p-6 bg-[#ECF0F1]" data-aos="fade-right">
                <div class="aspect-[3/4] flex items-center justify-center rounded-lg overflow-hidden">
                    @if($book->thumbnail_url)
                        <img src="{{ $book->thumbnail_url }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#ECF0F1] to-gray-200">
                            <i class="fas fa-book-open text-8xl text-[#2C3E50] opacity-50"></i>
                        </div>
                    @endif
                </div>
                
                <!-- Actions -->
                <div class="mt-6 space-y-3">
                    @auth
                        @if($book->stock > 0)
                            <form action="{{ route('books.borrow', $book) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full bg-[#E67E22] hover:bg-[#D35400] text-white py-3 rounded-lg transition flex items-center justify-center space-x-2">
                                    <i class="fas fa-hand-holding-heart"></i>
                                    <span>Pinjam Novel</span>
                                </button>
                            </form>
                        @else
                            <button disabled class="w-full bg-gray-400 text-white py-3 rounded-lg cursor-not-allowed flex items-center justify-center space-x-2">
                                <i class="fas fa-times-circle"></i>
                                <span>Stok Habis</span>
                            </button>
                        @endif
                        
                        <form action="{{ route('books.favorite', $book) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full border-2 border-[#E67E22] text-[#E67E22] hover:bg-[#E67E22] hover:text-white py-3 rounded-lg transition flex items-center justify-center space-x-2">
                                @if($isFavorite)
                                    <i class="fas fa-heart"></i>
                                    <span>Hapus dari Favorit</span>
                                @else
                                    <i class="far fa-heart"></i>
                                    <span>Tambah ke Favorit</span>
                                @endif
                            </button>
                        </form>
                        
                        <a href="{{ route('books.read', $book) }}" class="block w-full bg-[#2C3E50] hover:bg-[#1A252F] text-white py-3 rounded-lg transition text-center flex items-center justify-center space-x-2">
                            <i class="fas fa-book-open"></i>
                            <span>Baca Online</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="block w-full bg-[#E67E22] hover:bg-[#D35400] text-white py-3 rounded-lg transition text-center">
                            Login untuk Meminjam
                        </a>
                    @endauth
                </div>
            </div>
            
            <!-- Info -->
            <div class="lg:col-span-2 p-6" data-aos="fade-left">
                <h1 class="text-3xl font-bold text-[#2C3E50] mb-2">{{ $book->title }}</h1>
                <p class="text-xl text-gray-600 mb-4">
                    Oleh: {{ $book->authors_display }}
                </p>
                
                <!-- Genre & Status -->
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    @if($book->genre)
                        <div class="flex items-center space-x-2">
                            <span class="px-4 py-2 bg-[#E67E22] bg-opacity-10 text-[#E67E22] rounded-full text-sm font-semibold">
                                <i class="fas fa-tag mr-2"></i>{{ $book->genre }}
                            </span>
                        </div>
                    @endif
                    
                    <div class="flex items-center space-x-2">
                        @if($book->stock > 0)
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                            <span class="text-green-600">Tersedia ({{ $book->stock }} stok)</span>
                        @else
                            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                            <span class="text-red-600">Stok Habis</span>
                        @endif
                    </div>
                    
                    @if($isBorrowed)
                    <div class="flex items-center space-x-2">
                        <span class="w-3 h-3 bg-[#E67E22] rounded-full"></span>
                        <span class="text-[#E67E22]">Kamu sedang meminjam novel ini</span>
                    </div>
                    @endif
                </div>
                
                <!-- Description -->
                <div class="prose max-w-none mb-8">
                    <h2 class="text-xl font-semibold text-[#2C3E50] mb-3">Sinopsis</h2>
                    <p class="text-gray-700 leading-relaxed">{{ $book->description }}</p>
                </div>
                
                <!-- Additional Info - Grid 3 Kolom -->
                <div class="mt-8 border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-[#2C3E50] mb-4">Informasi Lengkap</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <!-- Genre (detail) -->
                        <div class="bg-[#ECF0F1] p-4 rounded-lg">
                            <span class="text-gray-500 text-sm">Genre</span>
                            <p class="font-semibold text-[#2C3E50] mt-1">
                                @if($book->genre)
                                    {{ $book->genre }}
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </p>
                        </div>
                        
                        <!-- Tanggal Terbit -->
                        <div class="bg-[#ECF0F1] p-4 rounded-lg">
                            <span class="text-gray-500 text-sm">Tanggal Terbit</span>
                            <p class="font-semibold text-[#2C3E50] mt-1">
                                @if($book->published_date)
                                    {{ \Carbon\Carbon::parse($book->published_date)->format('d F Y') }}
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </p>
                        </div>
                        
                        <!-- Penulis -->
                        <div class="bg-[#ECF0F1] p-4 rounded-lg">
                            <span class="text-gray-500 text-sm">Penulis</span>
                            <p class="font-semibold text-[#2C3E50] mt-1">{{ $book->authors_display }}</p>
                        </div>
                        
                        <!-- Penerbit -->
                        <div class="bg-[#ECF0F1] p-4 rounded-lg">
                            <span class="text-gray-500 text-sm">Penerbit</span>
                            <p class="font-semibold text-[#2C3E50] mt-1">
                                @if($book->publisher)
                                    {{ $book->publisher }}
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </p>
                        </div>
                        
                        <!-- Halaman -->
                        <div class="bg-[#ECF0F1] p-4 rounded-lg">
                            <span class="text-gray-500 text-sm">Jumlah Halaman</span>
                            <p class="font-semibold text-[#2C3E50] mt-1">
                                @if($book->page_count)
                                    {{ $book->page_count }} halaman
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </p>
                        </div>
                        
                        <!-- Bahasa -->
                        <div class="bg-[#ECF0F1] p-4 rounded-lg">
                            <span class="text-gray-500 text-sm">Bahasa</span>
                            <p class="font-semibold text-[#2C3E50] mt-1">
                                @if($book->language)
                                    {{ strtoupper($book->language) }}
                                @else
                                    <span class="text-gray-400">Indonesia</span>
                                @endif
                            </p>
                        </div>
                        
                        <!-- ISBN -->
                        <div class="bg-[#ECF0F1] p-4 rounded-lg">
                            <span class="text-gray-500 text-sm">ISBN</span>
                            <p class="font-semibold text-[#2C3E50] mt-1">
                                @if($book->isbn)
                                    {{ $book->isbn }}
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </p>
                        </div>
                        
                        <!-- Stok -->
                        <div class="bg-[#ECF0F1] p-4 rounded-lg">
                            <span class="text-gray-500 text-sm">Stok Tersedia</span>
                            <p class="font-semibold {{ $book->stock > 0 ? 'text-green-600' : 'text-red-600' }} mt-1">
                                {{ $book->stock ?? 0 }} unit
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection