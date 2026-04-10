@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8" data-aos="fade-up">
        <div>
            <div class="flex justify-center">
                <i class="fas fa-book-open text-6xl text-[#E67E22]"></i>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-[#2C3E50]">
                Login ke Novel kita
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Atau
                <a href="{{ route('register') }}" class="font-medium text-[#E67E22] hover:text-[#D35400]">
                    daftar jika belum punya akun
                </a>
            </p>
        </div>
        
        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" 
                           name="email" 
                           type="email" 
                           required 
                           value="{{ old('email') }}"
                           class="appearance-none relative block w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#E67E22] focus:border-transparent @error('email') border-red-500 @enderror"
                           placeholder="Masukkan email">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input id="password" 
                           name="password" 
                           type="password" 
                           required
                           class="appearance-none relative block w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#E67E22] focus:border-transparent @error('password') border-red-500 @enderror"
                           placeholder="Masukkan password">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" 
                           name="remember" 
                           type="checkbox" 
                           class="h-4 w-4 text-[#E67E22] focus:ring-[#E67E22] border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">
                        Ingat saya
                    </label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-[#E67E22] hover:text-[#D35400]">
                        Lupa password?
                    </a>
                </div>
            </div>

            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-[#E67E22] hover:bg-[#D35400] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#E67E22] transition">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-sign-in-alt"></i>
                    </span>
                    Login
                </button>
            </div>
        </form>
        
        <!-- Demo Credentials -->
        <div class="bg-[#ECF0F1] rounded-lg p-4 mt-4">
            <p class="text-sm text-gray-600 mb-2"><i class="fas fa-info-circle mr-1"></i> Demo Akun:</p>
            <div class="grid grid-cols-2 gap-2 text-xs">
                <div>
                    <p class="font-semibold">Admin:</p>
                    <p>admin@bukupintar.com</p>
                    <p>admin123</p>
                </div>
                <div>
                    <p class="font-semibold">User:</p>
                    <p>user@bukupintar.com</p>
                    <p>userbukupintar</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection