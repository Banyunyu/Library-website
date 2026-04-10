<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Menampilkan daftar semua buku
     */
    public function index(Request $request)
    {
        $query = Book::query();
        
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('authors', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        $books = $query->latest()->paginate(12);
        
        return view('books.index', compact('books'));
    }
    
    /**
     * Menampilkan detail buku
     */
    public function show(Book $book)
    {
        $isFavorite = false;
        $isBorrowed = false;
        
        if (auth()->check()) {
            $isFavorite = auth()->user()->favorites()
                            ->where('book_id', $book->id)
                            ->exists();
            
            $isBorrowed = auth()->user()->borrowedBooks()
                            ->where('book_id', $book->id)
                            ->where('status', 'dipinjam')
                            ->exists();
        }
        
        return view('books.show', compact('book', 'isFavorite', 'isBorrowed'));
    }
    
    /**
     * Menampilkan halaman baca buku (halaman 1 default)
     */
    public function read(Book $book)
    {
        if ($book->stock < 1) {
            return redirect()->back()->with('error', 'Novel sedang tidak tersedia untuk dibaca.');
        }
        
        // Reset ke halaman 1 saat pertama kali buka
        session(['reading_page_' . $book->id => 1]);
        
        return view('books.read', compact('book'));
    }
    
    /**
     * Menampilkan halaman baca buku dengan halaman tertentu
     */
    public function readPage(Book $book, $page)
    {
        if ($book->stock < 1) {
            return redirect()->back()->with('error', 'Novel sedang tidak tersedia untuk dibaca.');
        }
        
        // Validasi page tidak boleh kurang dari 1
        $page = max(1, $page);
        
        // Simpan halaman yang sedang dibaca ke session
        session(['reading_page_' . $book->id => $page]);
        
        return view('books.read', compact('book'));
    }
}