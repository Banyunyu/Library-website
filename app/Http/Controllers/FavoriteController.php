<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Menampilkan daftar favorit user
     */
    public function index()
    {
        $favorites = Auth::user()->favorites()
            ->with('book')
            ->latest()
            ->paginate(12);

        return view('favorites.index', compact('favorites'));
    }

    /**
     * Menambahkan atau menghapus buku dari favorit (toggle)
     */
    public function toggle(Request $request, Book $book)
    {
        $user = Auth::user();
        
        // Cek apakah buku sudah ada di favorit
        $favorite = $user->favorites()
            ->where('book_id', $book->id)
            ->first();

        if ($favorite) {
            // Jika sudah ada, hapus
            $favorite->delete();
            $message = '✖️ Novel dihapus dari favorit';
            $status = 'removed';
            $isFavorite = false;
        } else {
            // Jika belum ada, tambahkan
            $user->favorites()->create([
                'book_id' => $book->id
            ]);
            $message = '❤️ Novel ditambahkan ke favorit';
            $status = 'added';
            $isFavorite = true;
        }

        // Untuk request AJAX
        if ($request->wantsJson()) {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'is_favorite' => $isFavorite
            ]);
        }

        // Redirect back dengan flash message
        return redirect()->back()->with('success', $message);
    }

    /**
     * Menghapus buku dari favorit (khusus hapus)
     */
    public function destroy(Book $book)
    {
        $user = Auth::user();
        
        $favorite = $user->favorites()
            ->where('book_id', $book->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return redirect()->back()->with('success', '✖️ Novel dihapus dari favorit');
        }

        return redirect()->back()->with('error', 'Novel tidak ditemukan di favorit');
    }

    /**
     * Menampilkan jumlah favorit user
     */
    public function count()
    {
        $count = Auth::user()->favorites()->count();
        return response()->json(['count' => $count]);
    }
}