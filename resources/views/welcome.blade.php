@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="min-h-screen">
    <!-- Hero Section - LANGSUNG DI BAWAH NAVBAR -->
    <section class="relative bg-[#2C3E50] text-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right" data-aos-duration="1000">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                        Selamat Datang di 
                        <span class="text-[#E67E22] block mt-2">Novel Kita</span>
                    </h1>
                    <p class="text-xl mb-8 text-gray-200 leading-relaxed">
                        Platform novel digital dengan ribuan koleksi cerita keren dari penulis terbaik. 
                        Baca, pinjam, dan temukan novel favoritmu setiap hari.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('books.index') }}" 
                           class="bg-[#E67E22] hover:bg-[#D35400] px-8 py-4 rounded-lg font-semibold transition transform hover:scale-105 flex items-center space-x-2 group">
                            <i class="fas fa-book-open group-hover:rotate-12 transition"></i>
                            <span>Jelajahi Novel</span>
                        </a>
                        <a href="{{ route('about') }}" 
                           class="bg-transparent border-2 border-white hover:bg-white hover:text-[#2C3E50] px-8 py-4 rounded-lg font-semibold transition transform hover:scale-105">
                            Tentang Kami
                        </a>
                    </div>
                </div>
                
                <!-- Hero Image / Illustration -->
                <div class="hidden lg:block" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-[#E67E22] rounded-full filter blur-3xl opacity-20 animate-pulse"></div>
                        <div class="relative bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-4">
                                    <div class="bg-white/20 rounded-lg p-4 animate-bounce" style="animation-delay: 0s">
                                        <i class="fas fa-book text-3xl text-[#E67E22]"></i>
                                    </div>
                                    <div class="bg-white/20 rounded-lg p-4 animate-bounce" style="animation-delay: 0.2s">
                                        <i class="fas fa-clock text-3xl text-[#E67E22]"></i>
                                    </div>
                                </div>
                                <div class="space-y-4 mt-8">
                                    <div class="bg-white/20 rounded-lg p-4 animate-bounce" style="animation-delay: 0.4s">
                                        <i class="fas fa-heart text-3xl text-[#E67E22]"></i>
                                    </div>
                                    <div class="bg-white/20 rounded-lg p-4 animate-bounce" style="animation-delay: 0.6s">
                                        <i class="fas fa-users text-3xl text-[#E67E22]"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" 
                      fill="#ECF0F1"/>
            </svg>
        </div>
    </section>

    <!-- STATS SECTION - TETAP & TIDAK BERGERAK SAAT DISCROLL -->
    <div class="bg-white py-12 shadow-md relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @php
                use App\Models\Book;
                use App\Models\User;
                $totalNovel = Book::count();
                $totalMember = User::count();
            @endphp
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Stat 1 -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-5xl font-bold text-[#E67E22] mb-2">{{ $totalNovel }}+</div>
                    <div class="text-xl text-gray-600 font-medium">Judul Novel</div>
                    <div class="w-16 h-1 bg-[#E67E22] mx-auto mt-3 rounded-full"></div>
                </div>
                
                <!-- Stat 2 -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-5xl font-bold text-[#E67E22] mb-2">{{ $totalMember }}+</div>
                    <div class="text-xl text-gray-600 font-medium">Pembaca Aktif</div>
                    <div class="w-16 h-1 bg-[#E67E22] mx-auto mt-3 rounded-full"></div>
                </div>
                
                <!-- Stat 3 -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-5xl font-bold text-[#E67E22] mb-2">24/7</div>
                    <div class="text-xl text-gray-600 font-medium">Akses Online</div>
                    <div class="w-16 h-1 bg-[#E67E22] mx-auto mt-3 rounded-full"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <section class="py-20 bg-[#ECF0F1]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-[#2C3E50] mb-4">Kenapa Memilih Novel Kita?</h2>
                <p class="text-xl text-gray-600">Nikmati berbagai fitur menarik yang kami sediakan</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-xl p-8 shadow-lg card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-[#E67E22] rounded-full flex items-center justify-center mb-6 transform group-hover:rotate-12 transition">
                        <i class="fas fa-book-reader text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#2C3E50] mb-3">Baca Online</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Akses ribuan novel dan baca langsung di browser tanpa perlu download. Nyaman di mana saja.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-white rounded-xl p-8 shadow-lg card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-[#E67E22] rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-clock text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#2C3E50] mb-3">Peminjaman Mudah</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Pinjam novel favorit dengan mudah dan lacak status peminjaman secara real-time. Gratis!
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-white rounded-xl p-8 shadow-lg card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-[#E67E22] rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-heart text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#2C3E50] mb-3">Favorit & Koleksi</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Simpan novel favorit dan buat daftar bacaan pribadi Anda. Tidak akan pernah hilang.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Novels Preview - AMBIL DARI DATABASE -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-[#2C3E50] mb-4">Novel Populer</h2>
                <p class="text-xl text-gray-600">Koleksi novel yang paling banyak dibaca bulan ini</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php
                    // Ambil 4 novel pertama dari database
                    $popularNovels = App\Models\Book::latest()->take(4)->get();
                @endphp
                
                @forelse($popularNovels as $index => $novel)
                <a href="{{ route('books.show', $novel) }}" class="group cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="bg-[#ECF0F1] rounded-lg overflow-hidden mb-3 aspect-[3/4] relative group-hover:shadow-xl transition-all">
                        @if($novel->thumbnail_url)
                            <img src="{{ $novel->thumbnail_url }}" alt="{{ $novel->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#ECF0F1] to-gray-200">
                                <i class="fas fa-book-open text-6xl text-[#2C3E50] group-hover:text-[#E67E22] transition-colors"></i>
                            </div>
                        @endif
                        
                        <!-- Badge stok -->
                        @if($novel->stock > 0)
                            <div class="absolute top-2 right-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full">
                                <i class="fas fa-check-circle mr-1"></i>Tersedia
                            </div>
                        @else
                            <div class="absolute top-2 right-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                                <i class="fas fa-times-circle mr-1"></i>Habis
                            </div>
                        @endif
                    </div>
                    <h3 class="font-semibold text-[#2C3E50] group-hover:text-[#E67E22] transition line-clamp-1">{{ $novel->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $novel->authors_display }}</p>
                </a>
                @empty
                    @php
                        $sampleNovels = [
                            ['title' => 'Atomic Habits', 'author' => 'James Clear'],
                            ['title' => 'The Psychology of Money', 'author' => 'Morgan Housel'],
                            ['title' => 'Deep Work', 'author' => 'Cal Newport'],
                            ['title' => 'Think and Grow Rich', 'author' => 'Napoleon Hill'],
                        ];
                    @endphp
                    
                    @foreach($sampleNovels as $index => $novel)
                    <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="bg-[#ECF0F1] rounded-lg p-4 mb-3 aspect-[3/4] flex items-center justify-center group-hover:bg-[#E67E22] transition-colors">
                            <i class="fas fa-book text-6xl text-[#2C3E50] group-hover:text-white transition-colors"></i>
                        </div>
                        <h3 class="font-semibold text-[#2C3E50] group-hover:text-[#E67E22] transition">{{ $novel['title'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $novel['author'] }}</p>
                    </div>
                    @endforeach
                @endforelse
            </div>
            
            <div class="text-center mt-12" data-aos="fade-up">
                <a href="{{ route('books.index') }}" class="inline-flex items-center space-x-2 text-[#E67E22] hover:text-[#D35400] font-semibold group">
                    <span>Lihat Semua Novel</span>
                    <i class="fas fa-arrow-right group-hover:translate-x-2 transition"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-[#2C3E50] text-white relative overflow-hidden">
        <!-- Background pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-0 w-full h-full" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 20px, rgba(230, 126, 34, 0.2) 20px, rgba(230, 126, 34, 0.2) 40px);"></div>
        </div>
        
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8 relative z-10">
            <div data-aos="zoom-in">
                <i class="fas fa-feather-alt text-6xl text-[#E67E22] mb-6 opacity-75"></i>
                <h2 class="text-4xl font-bold mb-6 novel-title">Siap Memulai Petualangan Membaca?</h2>
                <p class="text-xl mb-8 text-gray-300">Daftar sekarang dan dapatkan akses ke ribuan novel keren</p>
                @guest
                    <a href="{{ route('register') }}" 
                       class="bg-[#E67E22] hover:bg-[#D35400] px-8 py-4 rounded-lg font-semibold transition transform hover:scale-105 inline-flex items-center space-x-2 shadow-xl">
                        <i class="fas fa-user-plus"></i>
                        <span>Daftar Gratis</span>
                    </a>
                @else
                    <a href="{{ route('books.index') }}" 
                       class="bg-[#E67E22] hover:bg-[#D35400] px-8 py-4 rounded-lg font-semibold transition transform hover:scale-105 inline-flex items-center space-x-2 shadow-xl">
                        <i class="fas fa-book-open"></i>
                        <span>Jelajahi Novel</span>
                    </a>
                @endguest
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<style>
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Fix untuk stats biar gak ikut kebawa scroll */
    .stats-section {
        transform: translateZ(0);
        will-change: transform;
    }
</style>
@endpush

@push('scripts')
<script>
    // HAPUS PARALLAX EFFECT biar stats gak bergerak
    // window.addEventListener('scroll', () => {
    //     const hero = document.querySelector('.relative.bg-\\[\\#2C3E50\\]');
    //     const scrolled = window.pageYOffset;
    //     if (hero) {
    //         hero.style.transform = `translateY(${scrolled * 0.5}px)`;
    //     }
    // });
</script>
@endpush