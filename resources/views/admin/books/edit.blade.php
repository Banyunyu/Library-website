@extends('layouts.app')

@section('title', 'Edit Novel')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-[#2C3E50] mb-2">Edit Novel</h1>
        <p class="text-gray-600">Ubah informasi novel yang sudah ada</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Novel <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}" required
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#E67E22] focus:border-transparent @error('title') border-red-500 @enderror"
                           placeholder="Masukkan judul novel">
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <!-- Penulis - DIPERBAIKI -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Penulis <span class="text-red-500">*</span></label>
                    <input type="text" name="authors" 
                           value="{{ old('authors', 
                               is_string($book->authors) && str_starts_with($book->authors, '[') 
                                   ? implode(', ', json_decode($book->authors, true)) 
                                   : (is_array($book->authors) ? implode(', ', $book->authors) : $book->authors)
                           ) }}" 
                           required
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#E67E22] focus:border-transparent @error('authors') border-red-500 @enderror"
                           placeholder="Masukkan nama penulis">
                    @error('authors') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <!-- Genre -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Genre</label>
                    <select name="genre" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#E67E22] focus:border-transparent">
                        <option value="">-- Pilih Genre --</option>
                        @foreach($genres as $key => $value)
                            <option value="{{ $key }}" {{ old('genre', $book->genre) == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('genre') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <!-- Penerbit -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Penerbit</label>
                    <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#E67E22] focus:border-transparent"
                           placeholder="Masukkan nama penerbit">
                    @error('publisher') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <!-- Tanggal Terbit -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Terbit</label>
                    <input type="date" name="published_date" 
                           value="{{ old('published_date', $book->published_date ? date('Y-m-d', strtotime($book->published_date)) : '') }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#E67E22] focus:border-transparent">
                    @error('published_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <!-- Jumlah Halaman -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Halaman</label>
                    <input type="number" name="page_count" value="{{ old('page_count', $book->page_count) }}" min="1"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#E67E22] focus:border-transparent"
                           placeholder="Contoh: 250">
                    @error('page_count') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <!-- Bahasa -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bahasa</label>
                    <input type="text" name="language" value="{{ old('language', $book->language ?? 'Indonesia') }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#E67E22] focus:border-transparent"
                           placeholder="Contoh: Indonesia, Inggris">
                    @error('language') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <!-- ISBN -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">ISBN</label>
                    <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#E67E22] focus:border-transparent"
                           placeholder="Contoh: 978-602-1234-56-7">
                    @error('isbn') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea name="description" rows="5" required
                              class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#E67E22] focus:border-transparent @error('description') border-red-500 @enderror"
                              placeholder="Masukkan deskripsi novel">{{ old('description', $book->description) }}</textarea>
                    @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <!-- Stok -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stok <span class="text-red-500">*</span></label>
                    <input type="number" name="stock" value="{{ old('stock', $book->stock ?? 0) }}" min="0" required
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#E67E22] focus:border-transparent @error('stock') border-red-500 @enderror"
                           placeholder="Jumlah stok">
                    @error('stock') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <!-- Cover -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cover Novel</label>
                    <div class="flex items-center space-x-4 mb-2">
                        @if($book->thumbnail_url)
                            <div class="w-20 h-24 bg-[#ECF0F1] rounded-lg overflow-hidden">
                                <img src="{{ $book->thumbnail_url }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <div class="flex-1">
                            <input type="file" name="cover" accept="image/*"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#E67E22] focus:border-transparent">
                        </div>
                    </div>
                    <p class="text-sm text-gray-500">Kosongkan jika tidak ingin mengubah cover</p>
                </div>
                
                <!-- Tombol -->
                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <a href="{{ route('admin.books.index') }}" 
                       class="px-6 py-2 border rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-[#E67E22] hover:bg-[#D35400] text-white rounded-lg transition flex items-center space-x-2">
                        <i class="fas fa-save"></i>
                        <span>Update</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection