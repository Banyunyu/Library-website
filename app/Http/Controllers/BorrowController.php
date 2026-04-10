<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowController extends Controller
{
    /**
     * Menampilkan daftar buku yang dipinjam user
     */
    public function index()
    {
        $borrowedBooks = auth()->user()->borrowedBooks()
                        ->with('book')
                        ->where('status', 'dipinjam')
                        ->latest()
                        ->get();
        
        return view('borrowed.index', compact('borrowedBooks'));
    }

    /**
     * Meminjam buku
     */
    public function borrow(Book $book)
    {
        // Cek stok
        if ($book->stock < 1) {
            return redirect()->back()->with('error', 'Stok buku tidak tersedia.');
        }

        // Cek apakah sudah meminjam buku ini
        $alreadyBorrowed = auth()->user()->borrowedBooks()
                            ->where('book_id', $book->id)
                            ->where('status', 'dipinjam')
                            ->exists();

        if ($alreadyBorrowed) {
            return redirect()->back()->with('error', 'Anda sudah meminjam buku ini.');
        }

        // Kurangi stok
        $book->decrement('stock');

        // Buat record peminjaman
        BorrowedBook::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
            'due_date' => Carbon::now()->addDays(7),
            'status' => 'dipinjam'
        ]);

        return redirect()->route('borrowed.index')->with('success', '📚 Buku berhasil dipinjam!');
    }

    /**
     * Mengembalikan buku
     */
    public function returnBook(Book $book)
    {
        $borrowed = auth()->user()->borrowedBooks()
                    ->where('book_id', $book->id)
                    ->where('status', 'dipinjam')
                    ->first();

        if (!$borrowed) {
            return redirect()->back()->with('error', 'Anda tidak sedang meminjam buku ini.');
        }

        // Update stok
        $book->increment('stock');

        // Update status peminjaman
        $borrowed->update([
            'returned_at' => now(),
            'status' => 'dikembalikan'
        ]);

        return redirect()->route('borrowed.index')->with('success', '✅ Buku berhasil dikembalikan!');
    }

    /**
     * Menghapus/membatalkan peminjaman (delete)
     */
    public function destroy(BorrowedBook $borrowed)
    {
        // Pastikan buku milik user yang login
        if ($borrowed->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses.');
        }

        // Kembalikan stok
        $borrowed->book->increment('stock');

        // Hapus record peminjaman
        $borrowed->delete();

        return redirect()->route('borrowed.index')->with('success', '🗑️ Peminjaman dibatalkan!');
    }
}