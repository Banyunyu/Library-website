<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Novel Kita') - Platform Novel Digital</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Font Google untuk tampilan novel (opsional) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Merriweather:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #2C3E50;
            --primary-dark: #1A252F;
            --accent: #E67E22;
            --accent-hover: #D35400;
            --bg-light: #ECF0F1;
        }
        
        body {
            font-family: 'Inter', 'Merriweather', system-ui, -apple-system, sans-serif;
            background-color: var(--bg-light);
            color: var(--primary);
        }
        
        /* Gaya untuk judul novel */
        .novel-title {
            font-family: 'Merriweather', serif;
            font-weight: 700;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(44, 62, 80, 0.3);
        }
        
        .btn-accent {
            background-color: var(--accent);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-accent:hover {
            background-color: var(--accent-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(230, 126, 34, 0.3);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(44, 62, 80, 0.2);
        }
        
        .fade-in {
            animation: fadeIn 1s ease-in;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .loader {
            border: 3px solid var(--bg-light);
            border-top: 3px solid var(--accent);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Efek untuk halaman novel */
        .page-fold {
            position: relative;
            background: linear-gradient(to right, transparent 50%, rgba(44, 62, 80, 0.02) 50%);
        }
        
        .quote-mark {
            font-family: 'Merriweather', serif;
            font-size: 4rem;
            line-height: 1;
            opacity: 0.2;
            color: var(--accent);
        }

        /* Animasi untuk flash message */
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        .flash-animation {
            animation: slideIn 0.3s ease-out;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Navbar dengan sentuhan novel -->
    <nav class="bg-[#2C3E50] text-white sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                        <div class="relative">
                            <i class="fas fa-book-open text-2xl text-[#E67E22] group-hover:scale-110 transition"></i>
                            <i class="fas fa-star absolute -top-1 -right-1 text-[#E67E22] text-[8px] animate-ping"></i>
                        </div>
                        <span class="font-bold text-xl novel-title">Novel Kita</span>
                    </a>
                    
                    <div class="hidden md:flex ml-10 space-x-8">
                        <a href="{{ route('books.index') }}" class="hover:text-[#E67E22] transition flex items-center space-x-1 relative group">
                            <i class="fas fa-book"></i>
                            <span>Jelajahi</span>
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#E67E22] group-hover:w-full transition-all duration-300"></span>
                        </a>
                        
                        @auth
                            <a href="{{ route('borrowed.index') }}" class="hover:text-[#E67E22] transition flex items-center space-x-1 relative group">
                                <i class="fas fa-clock"></i>
                                <span>Dipinjam</span>
                                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#E67E22] group-hover:w-full transition-all duration-300"></span>
                            </a>
                            
                            <a href="{{ route('favorites.index') }}" class="hover:text-[#E67E22] transition flex items-center space-x-1 relative group">
                                <i class="fas fa-heart"></i>
                                <span>Favorit</span>
                                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#E67E22] group-hover:w-full transition-all duration-300"></span>
                            </a>
                        @endauth
                        
                        <a href="{{ route('about') }}" class="hover:text-[#E67E22] transition flex items-center space-x-1 relative group">
                            <i class="fas fa-info-circle"></i>
                            <span>Tentang</span>
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#E67E22] group-hover:w-full transition-all duration-300"></span>
                        </a>
                        
                        @auth
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.books.index') }}" class="hover:text-[#E67E22] transition flex items-center space-x-1 relative group">
                                    <i class="fas fa-cog"></i>
                                    <span>Admin</span>
                                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#E67E22] group-hover:w-full transition-all duration-300"></span>
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    @auth
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <span class="text-sm hidden md:block bg-[#E67E22] bg-opacity-20 px-3 py-1 rounded-full">
                                    <i class="fas fa-user-circle mr-1"></i>{{ auth()->user()->name }}
                                </span>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-sm transition flex items-center space-x-1">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span class="hidden md:inline">Keluar</span>
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('login') }}" class="bg-transparent hover:bg-white hover:text-[#2C3E50] px-4 py-2 rounded-lg transition border border-white">
                                <i class="fas fa-sign-in-alt md:mr-1"></i>
                                <span class="hidden md:inline">Masuk</span>
                            </a>
                            <a href="{{ route('register') }}" class="bg-[#E67E22] hover:bg-[#D35400] px-4 py-2 rounded-lg transition">
                                <i class="fas fa-user-plus md:mr-1"></i>
                                <span class="hidden md:inline">Daftar</span>
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages - AUTO HILANG 5 DETIK DENGAN TOMBOL CLOSE -->
    @if(session('success'))
        <div id="success-alert" class="fixed top-20 right-5 z-50 max-w-md flash-animation">
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-xl flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">{{ session('success') }}</p>
                    </div>
                </div>
                <button onclick="closeAlert('success-alert')" class="ml-4 text-green-700 hover:text-green-900 focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- Progress bar -->
            <div class="h-1 bg-green-200 rounded-b-lg overflow-hidden">
                <div id="success-progress" class="h-full bg-green-500" style="width: 100%; transition: width 5s linear;"></div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div id="error-alert" class="fixed top-20 right-5 z-50 max-w-md flash-animation">
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-xl flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">{{ session('error') }}</p>
                    </div>
                </div>
                <button onclick="closeAlert('error-alert')" class="ml-4 text-red-700 hover:text-red-900 focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- Progress bar -->
            <div class="h-1 bg-red-200 rounded-b-lg overflow-hidden">
                <div id="error-progress" class="h-full bg-red-500" style="width: 100%; transition: width 5s linear;"></div>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="fade-in">
        @yield('content')
    </main>

    <!-- Footer dengan tema novel -->
    <footer class="bg-[#2C3E50] text-white mt-12 relative overflow-hidden">
        <!-- Background pattern seperti halaman buku -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-0 w-full h-full" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 20px, rgba(230, 126, 34, 0.1) 20px, rgba(230, 126, 34, 0.1) 40px);"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo dan deskripsi -->
                <div data-aos="fade-up" data-aos-delay="100" class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <div class="relative">
                            <i class="fas fa-book-open text-3xl text-[#E67E22]"></i>
                            <i class="fas fa-feather-alt text-[#E67E22] text-sm absolute -top-1 -right-2 rotate-12"></i>
                        </div>
                        <span class="font-bold text-2xl novel-title">Novel Kita</span>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        Platform novel digital tempat ribuan cerita bertemu dengan jutaan pembaca. Setiap halaman adalah petualangan baru.
                    </p>
                    <div class="flex space-x-3 pt-2">
                        <a href="#" class="w-8 h-8 bg-[#E67E22] bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-100 hover:text-white transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-[#E67E22] bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-100 hover:text-white transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-[#E67E22] bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-100 hover:text-white transition">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Menu -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <h3 class="font-bold text-lg mb-4 text-[#E67E22] flex items-center">
                        <i class="fas fa-compass mr-2"></i>Jelajahi
                    </h3>
                    <ul class="space-y-3 text-gray-300">
                        <li><a href="{{ route('books.index') }}" class="hover:text-[#E67E22] transition flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span>Semua Novel</span>
                        </a></li>
                        <li><a href="#" class="hover:text-[#E67E22] transition flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span>Rekomendasi</span>
                        </a></li>
                        <li><a href="#" class="hover:text-[#E67E22] transition flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span>Terbaru</span>
                        </a></li>
                        <li><a href="#" class="hover:text-[#E67E22] transition flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span>Populer</span>
                        </a></li>
                    </ul>
                </div>
                
                <!-- Layanan -->
                <div data-aos="fade-up" data-aos-delay="300">
                    <h3 class="font-bold text-lg mb-4 text-[#E67E22] flex items-center">
                        <i class="fas fa-star mr-2"></i>Layanan
                    </h3>
                    <ul class="space-y-3 text-gray-300">
                        <li><a href="#" class="hover:text-[#E67E22] transition flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span>Cara Pinjam</span>
                        </a></li>
                        <li><a href="#" class="hover:text-[#E67E22] transition flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span>Syarat & Ketentuan</span>
                        </a></li>
                        <li><a href="#" class="hover:text-[#E67E22] transition flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span>Privasi</span>
                        </a></li>
                        <li><a href="#" class="hover:text-[#E67E22] transition flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span>Bantuan</span>
                        </a></li>
                    </ul>
                </div>
                
                <!-- Kontak -->
                <div data-aos="fade-up" data-aos-delay="400">
                    <h3 class="font-bold text-lg mb-4 text-[#E67E22] flex items-center">
                        <i class="fas fa-envelope mr-2"></i>Kontak
                    </h3>
                    <ul class="space-y-3 text-gray-300">
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-envelope w-5 text-[#E67E22]"></i>
                            <span>hello@novelkita.id</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-envelope w-5 text-[#E67E22]"></i>
                            <span>info@novelkita.id</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-phone w-5 text-[#E67E22]"></i>
                            <span>(+62) 812 2707 7896</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <i class="fas fa-map-marker-alt w-5 text-[#E67E22] mt-1"></i>
                            <span>Rumah Admin Rahasia<br>Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Quote footer -->
            <div class="border-t border-gray-700 mt-8 pt-6 text-center">
                <div class="quote-mark absolute left-1/2 transform -translate-x-1/2 -top-3">❝</div>
                <p class="text-gray-400 text-sm italic max-w-2xl mx-auto">
                    "Sebanyak bintang di langit, sebanyak cerita di sini. Selamat membaca, selamat berpetualang."
                </p>
            </div>
            
            <div class="border-t border-gray-700 mt-6 pt-6 text-center text-gray-400 text-sm">
                <p>&copy; {{ date('Y') }} Novel Kita. Setiap cerita memiliki takdirnya masing-masing.</p>
            </div>
        </div>
    </footer>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
            easing: 'ease-in-out'
        });
    </script>
    
    <!-- Script untuk Flash Message -->
    <script>
        // Auto close flash message setelah 5 detik
        document.addEventListener('DOMContentLoaded', function() {
            // Untuk success alert
            setTimeout(function() {
                const successAlert = document.getElementById('success-alert');
                if (successAlert) {
                    successAlert.style.transition = 'opacity 0.5s ease';
                    successAlert.style.opacity = '0';
                    setTimeout(() => {
                        successAlert.style.display = 'none';
                    }, 500);
                }
            }, 5000);

            // Untuk error alert
            setTimeout(function() {
                const errorAlert = document.getElementById('error-alert');
                if (errorAlert) {
                    errorAlert.style.transition = 'opacity 0.5s ease';
                    errorAlert.style.opacity = '0';
                    setTimeout(() => {
                        errorAlert.style.display = 'none';
                    }, 500);
                }
            }, 5000);
        });

        // Fungsi untuk close manual
        function closeAlert(alertId) {
            const alert = document.getElementById(alertId);
            if (alert) {
                alert.style.transition = 'opacity 0.3s ease';
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 300);
            }
        }
    </script>
    
    @stack('scripts')
</body>
</html>