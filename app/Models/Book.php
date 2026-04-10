<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'google_books_id',
        'title',
        'subtitle',
        'authors',
        'genre', // TAMBAHAN
        'publisher',
        'published_date',
        'description',
        'isbn',
        'page_count',
        'categories',
        'language',
        'thumbnail',
        'small_thumbnail',
        'preview_link',
        'info_link',
        'is_favorite',
        'stock',
    ];

    protected $casts = [
        'authors' => 'array',
        'categories' => 'array',
    ];

    /**
     * Daftar genre yang tersedia
     */
    public static function genres()
    {
        return [
            'Romance' => 'Romance',
            'Horror' => 'Horror',
            'Action' => 'Action',
            'Fantasy' => 'Fantasy',
            'Mystery' => 'Mystery',
            'History' => 'History',
            'Comedy' => 'Comedy',
            'Adventure' => 'Adventure',
            'Drama' => 'Drama',
            'Sci-Fi' => 'Sci-Fi',
            'Thriller' => 'Thriller',
            'Slice of Life' => 'Slice of Life',
        ];
    }

    /**
     * Accessor untuk menampilkan authors sebagai string biasa
     */
    public function getAuthorsDisplayAttribute()
    {
        $authors = $this->authors;
        
        if (is_string($authors) && str_starts_with($authors, '[')) {
            $authors = json_decode($authors, true);
        }
        
        if (is_array($authors)) {
            return implode(', ', $authors);
        }
        
        return $authors ?? 'Unknown';
    }

    /**
     * Accessor untuk URL thumbnail
     */
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            if (filter_var($this->thumbnail, FILTER_VALIDATE_URL)) {
                return $this->thumbnail;
            }
            
            if (Storage::disk('public')->exists($this->thumbnail)) {
                return Storage::url($this->thumbnail);
            }
        }
        
        return null;
    }

    /**
     * Format tanggal terbit
     */
    public function getFormattedPublishedDateAttribute()
    {
        if ($this->published_date) {
            return date('d F Y', strtotime($this->published_date));
        }
        return '-';
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }

    public function isAvailable()
    {
        return $this->stock > 0;
    }
}