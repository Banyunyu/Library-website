@extends('layouts.app')

@section('title', 'Admin - Kelola Novel')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold text-[#2C3E50] mb-2">Kelola Novel</h1>
            <p class="text-gray-600">Manajemen data novel perpustakaan</p>
        </div>
        <a href="{{ route('admin.books.create') }}" 
           class="bg-[#E67E22] hover:bg-[#D35400] text-white px-6 py-3 rounded-lg transition flex items-center space-x-2">
            <i class="fas fa-plus"></i>
            <span>Tambah Novel</span>
        </a>
    </div>

    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <!-- TABLE BOOKS -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-[#2C3E50] text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Cover</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Penulis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Genre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tgl Terbit</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Stok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($books as $book)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="w-12 h-16 bg-[#ECF0F1] rounded flex items-center justify-center overflow-hidden">
                            @if($book->thumbnail_url)
                                <img src="{{ $book->thumbnail_url }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                            @else
                                <i class="fas fa-book text-2xl text-[#2C3E50]"></i>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 font-medium text-[#2C3E50]">{{ $book->title }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $book->authors_display }}</td>
                    <td class="px-6 py-4">
                        @if($book->genre)
                            <span class="px-3 py-1 bg-[#E67E22] bg-opacity-10 text-[#E67E22] rounded-full text-xs font-semibold">
                                {{ $book->genre }}
                            </span>
                        @else
                            <span class="text-gray-400 text-xs">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        @if($book->published_date)
                            {{ date('d/m/Y', strtotime($book->published_date)) }}
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold 
                            {{ $book->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $book->stock ?? 0 }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('admin.books.edit', $book) }}" 
                               class="text-[#E67E22] hover:text-[#D35400] transition transform hover:scale-110" 
                               title="Edit Novel">
                                <i class="fas fa-edit text-xl"></i>
                            </a>
                            
                            <form action="{{ route('admin.books.destroy', $book) }}" 
                                  method="POST" 
                                  class="inline-block delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="text-red-600 hover:text-red-800 transition transform hover:scale-110 delete-btn"
                                        data-title="{{ $book->title }}"
                                        title="Hapus Novel">
                                    <i class="fas fa-trash text-xl"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-16 text-center">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-books text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg mb-4">Belum ada data novel</p>
                            <a href="{{ route('admin.books.create') }}" 
                               class="bg-[#E67E22] hover:bg-[#D35400] text-white px-6 py-3 rounded-lg transition inline-flex items-center space-x-2">
                                <i class="fas fa-plus"></i>
                                <span>Tambah Novel Pertama</span>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    @if($books->hasPages())
        <div class="mt-8">
            {{ $books->links() }}
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');
            const bookTitle = this.dataset.title;
            
            Swal.fire({
                title: 'Hapus Novel?',
                html: `Kamu yakin ingin menghapus <b>"${bookTitle}"</b>?<br><br>
                       <span class="text-sm">⚠️ Semua data favorit dan peminjaman terkait akan ikut terhapus!</span>`,
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