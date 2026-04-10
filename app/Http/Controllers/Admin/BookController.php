<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Book::genres();
        return view('admin.books.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'page_count' => 'nullable|integer|min:1',
            'language' => 'nullable|string|max:50',
            'isbn' => 'nullable|string|max:20',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'authors' => json_encode([$request->authors]),
            'genre' => $request->genre,
            'publisher' => $request->publisher,
            'published_date' => $request->published_date,
            'page_count' => $request->page_count,
            'language' => $request->language,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'stock' => $request->stock,
            'google_books_id' => 'manual-' . uniqid(),
        ];

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $data['thumbnail'] = $coverPath;
            $data['small_thumbnail'] = $coverPath;
        }

        Book::create($data);

        return redirect()->route('admin.books.index')
            ->with('success', '✨ Novel berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $genres = Book::genres();
        return view('admin.books.edit', compact('book', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'page_count' => 'nullable|integer|min:1',
            'language' => 'nullable|string|max:50',
            'isbn' => 'nullable|string|max:20',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'authors' => json_encode([$request->authors]),
            'genre' => $request->genre,
            'publisher' => $request->publisher,
            'published_date' => $request->published_date,
            'page_count' => $request->page_count,
            'language' => $request->language,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'stock' => $request->stock,
        ];

        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($book->thumbnail) {
                Storage::disk('public')->delete($book->thumbnail);
            }
            $coverPath = $request->file('cover')->store('covers', 'public');
            $data['thumbnail'] = $coverPath;
            $data['small_thumbnail'] = $coverPath;
        }

        $book->update($data);

        return redirect()->route('admin.books.index')
            ->with('success', '✏️ Novel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            // Hapus relasi terlebih dahulu
            $book->favorites()->delete();
            $book->borrowedBooks()->delete();
            
            // Hapus file cover jika ada
            if ($book->thumbnail) {
                Storage::disk('public')->delete($book->thumbnail);
            }
            
            // Hapus data buku
            $book->delete();
            
            return redirect()->route('admin.books.index')
                ->with('success', '🗑️ Novel berhasil dihapus!');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.books.index')
                ->with('error', '❌ Gagal menghapus novel: ' . $e->getMessage());
        }
    }
}