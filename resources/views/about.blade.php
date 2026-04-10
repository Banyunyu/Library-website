@extends('layouts.app')

@section('title', 'Tentang Novel Kita')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header dengan efek lebih menarik -->
    <div class="text-center mb-16" data-aos="fade-down">
        <h1 class="text-5xl md:text-6xl font-bold text-[#2C3E50] mb-4">
            Tentang <span class="text-[#E67E22]">Novel Kita</span>
        </h1>
        <div class="w-32 h-1 bg-gradient-to-r from-transparent via-[#E67E22] to-transparent mx-auto"></div>
        <p class="text-xl text-gray-600 mt-6 max-w-3xl mx-auto">
            Platform novel digital yang menghadirkan ribuan cerita keren dari penulis terbaik
        </p>
    </div>

    <!-- About Content dengan desain lebih modern -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
        <!-- Left Column - Cerita Kami -->
        <div data-aos="fade-right" data-aos-duration="1000">
            <div class="bg-white rounded-2xl shadow-xl p-8 h-full relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[#E67E22] opacity-5 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition duration-700"></div>
                <div class="relative z-10">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-[#E67E22] rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-book-open text-xl text-white"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-[#2C3E50]">Cerita Kami</h2>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4 text-lg">
                        <span class="font-semibold text-[#E67E22]">Novel Kita</span> lahir pada tahun 2023 dari kecintaan terhadap cerita. Kami percaya setiap orang punya cerita, dan setiap cerita layak untuk dibaca.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Berawal dari komunitas kecil pecinta novel, kami berkembang menjadi platform digital yang menghubungkan penulis dengan jutaan pembaca di seluruh Indonesia.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Hari ini, <span class="font-semibold">Novel Kita</span> telah menjadi rumah bagi ribuan novel dari berbagai genre - dari romance, fantasi, horor, hingga slice of life. Semua bisa kamu baca dan nikmati secara digital.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Right Column - Visi & Misi dengan desain lebih elegan -->
        <div data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
            <div class="bg-gradient-to-br from-[#2C3E50] to-[#1a2632] text-white rounded-2xl shadow-xl p-8 h-full relative overflow-hidden">
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-[#E67E22] opacity-10 rounded-full -blur-3xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 bg-[#E67E22] rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-bullseye text-xl text-white"></i>
                        </div>
                        <h2 class="text-3xl font-bold">Visi & Misi</h2>
                    </div>
                    
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-[#E67E22] mb-3 flex items-center">
                            <i class="fas fa-eye mr-2"></i> Visi Kami
                        </h3>
                        <p class="leading-relaxed text-gray-200 italic">
                            "Menjadi rumah digital bagi setiap cerita, dan menjadikan membaca novel sebagai budaya baru generasi Indonesia"
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold text-[#E67E22] mb-4 flex items-center">
                            <i class="fas fa-list-check mr-2"></i> Misi Kami
                        </h3>
                        <ul class="space-y-4">
                            @foreach($misi as $index => $item)
                            <li class="flex items-start space-x-3 group">
                                <div class="flex-shrink-0 w-6 h-6 bg-[#E67E22] rounded-full flex items-center justify-center mt-0.5 group-hover:scale-110 transition">
                                    <i class="fas fa-check text-xs text-white"></i>
                                </div>
                                <span class="text-gray-200">{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section dengan animasi lebih keren -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-20">
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center card-hover group" data-aos="zoom-in" data-aos-delay="100">
            <div class="text-5xl font-bold text-[#E67E22] mb-2 group-hover:scale-110 transition">1000+</div>
            <div class="text-gray-600 font-medium">Judul Novel</div>
            <div class="w-12 h-1 bg-[#E67E22] mx-auto mt-3 rounded-full group-hover:w-20 transition-all"></div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center card-hover group" data-aos="zoom-in" data-aos-delay="200">
            <div class="text-5xl font-bold text-[#E67E22] mb-2 group-hover:scale-110 transition">5000+</div>
            <div class="text-gray-600 font-medium">Pembaca Aktif</div>
            <div class="w-12 h-1 bg-[#E67E22] mx-auto mt-3 rounded-full group-hover:w-20 transition-all"></div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center card-hover group" data-aos="zoom-in" data-aos-delay="300">
            <div class="text-5xl font-bold text-[#E67E22] mb-2 group-hover:scale-110 transition">24/7</div>
            <div class="text-gray-600 font-medium">Akses Online</div>
            <div class="w-12 h-1 bg-[#E67E22] mx-auto mt-3 rounded-full group-hover:w-20 transition-all"></div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center card-hover group" data-aos="zoom-in" data-aos-delay="400">
            <div class="text-5xl font-bold text-[#E67E22] mb-2 group-hover:scale-110 transition">100+</div>
            <div class="text-gray-600 font-medium">Penulis</div>
            <div class="w-12 h-1 bg-[#E67E22] mx-auto mt-3 rounded-full group-hover:w-20 transition-all"></div>
        </div>
    </div>

    <!-- Team Section - Pembuat Website dengan desain lebih premium -->
    <div class="mb-20" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-3xl font-bold text-center text-[#2C3E50] mb-12 relative">
            <span class="relative z-10 px-4">Pengembang Website Novel Kita</span>
        </h2>

        <div class="flex justify-center">
            <!-- Profil Pembuat dengan desain lebih premium -->
            <div class="bg-white rounded-2xl shadow-xl p-8 text-center card-hover max-w-md w-full relative overflow-hidden group">
                <!-- Background decoration -->
                <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-r from-[#E67E22] to-[#D35400] opacity-10"></div>
                <div class="absolute top-0 right-0 w-40 h-40 bg-[#E67E22] opacity-5 rounded-full -mr-10 -mt-10"></div>
                
                <div class="relative z-10">
                    <!-- Foto/avatar dengan border gradient -->
                    <div class="relative inline-block mb-4">
                        <div class="w-36 h-36 bg-gradient-to-br from-[#E67E22] to-[#D35400] rounded-full p-1 mx-auto">
                            <div class="w-full h-full bg-[#ECF0F1] rounded-full flex items-center justify-center">
                                <i class="fas fa-user-tie text-6xl text-[#2C3E50]"></i>
                            </div>
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-[#E67E22] rounded-full flex items-center justify-center text-white border-4 border-white">
                            <i class="fas fa-code text-sm"></i>
                        </div>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-[#2C3E50] mb-1">Banyu Ganesha Widiyana</h3>
                    <p class="text-[#E67E22] font-semibold mb-3 flex items-center justify-center">
                        <i class="fas fa-crown mr-2"></i> Software Developer
                        <i class="fas fa-crown ml-2"></i>
                    </p>
                    
                    <!-- Quote -->
                    <div class="bg-[#ECF0F1] rounded-lg p-4 mb-4 italic text-gray-600">
                        <i class="fas fa-quote-left text-[#E67E22] opacity-50 mr-1"></i>
                        "Membangun bukan sekadar menulis kode, tapi menciptakan ruang di mana cerita bisa hidup dan menginspirasi."
                        <i class="fas fa-quote-right text-[#E67E22] opacity-50 ml-1"></i>
                    </div>
                    
                    <!-- Social links dengan desain lebih keren -->
                    <div class="flex justify-center space-x-4">
                        <a href="https://www.linkedin.com/in/banyu-ganesha-widiyana-b48413269/" 
                           target="_blank" 
                           class="w-12 h-12 bg-[#0077B5] text-white rounded-xl flex items-center justify-center hover:scale-110 transition shadow-lg">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                        <a href="https://github.com/Banyunyu" 
                           target="_blank" 
                           class="w-12 h-12 bg-[#333] text-white rounded-xl flex items-center justify-center hover:scale-110 transition shadow-lg">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        <a href="#" 
                           class="w-12 h-12 bg-[#2C3E50] text-white rounded-xl flex items-center justify-center hover:scale-110 transition shadow-lg">
                            <i class="fas fa-globe text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section dengan desain lebih fresh -->
    <div class="bg-white rounded-2xl shadow-xl p-10 mb-16 relative overflow-hidden" data-aos="fade-up">
        <!-- Background decoration -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-[#E67E22] opacity-5 rounded-full -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-[#2C3E50] opacity-5 rounded-full -ml-20 -mb-20"></div>
        
        <div class="relative z-10">
            <h2 class="text-3xl font-bold text-[#2C3E50] mb-8 text-center flex items-center justify-center">
                <i class="fas fa-headset text-[#E67E22] mr-3"></i>
                Mari Bercerita
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center group">
                    <div class="w-20 h-20 bg-gradient-to-br from-[#E67E22] to-[#D35400] rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition shadow-lg">
                        <i class="fas fa-map-marker-alt text-3xl text-white"></i>
                    </div>
                    <h3 class="font-semibold text-[#2C3E50] mb-2">Alamat</h3>
                    <p class="text-gray-600">Rumah Admin Rahasia</p>
                    <p class="text-sm text-gray-500">(Markas Besar Novel Kita)</p>
                </div>
                
                <div class="text-center group">
                    <div class="w-20 h-20 bg-gradient-to-br from-[#E67E22] to-[#D35400] rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition shadow-lg">
                        <i class="fas fa-envelope text-3xl text-white"></i>
                    </div>
                    <h3 class="font-semibold text-[#2C3E50] mb-2">Email</h3>
                    <p class="text-gray-600">hello@novelkita.id</p>
                    <p class="text-sm text-gray-500">info@novelkita.id</p>
                </div>
                
                <div class="text-center group">
                    <div class="w-20 h-20 bg-gradient-to-br from-[#E67E22] to-[#D35400] rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition shadow-lg">
                        <i class="fas fa-phone text-3xl text-white"></i>
                    </div>
                    <h3 class="font-semibold text-[#2C3E50] mb-2">Telepon</h3>
                    <p class="text-gray-600">(+62) 812 2707 7896</p>
                    <p class="text-sm text-gray-500">Senin - Jumat, 09:00 - 17:00</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center" data-aos="fade-up" data-aos-delay="200">
        <h3 class="text-2xl font-bold text-[#2C3E50] mb-4">Siap menemukan cerita baru?</h3>
        <a href="{{ route('books.index') }}" 
           class="inline-flex items-center space-x-2 bg-[#E67E22] hover:bg-[#D35400] text-white px-8 py-4 rounded-xl font-semibold transition transform hover:scale-105 shadow-lg">
            <i class="fas fa-book-open"></i>
            <span>Jelajahi Novel Sekarang</span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</div>
@endsection