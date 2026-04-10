<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke tabel favorites
     * User memiliki banyak favorite
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * Relasi ke tabel borrowed_books
     * User memiliki banyak peminjaman
     */
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }

    /**
     * Cek apakah user adalah admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Mendapatkan semua buku favorit user
     */
    public function favoriteBooks()
    {
        return $this->belongsToMany(Book::class, 'favorites')
            ->withTimestamps();
    }

    /**
     * Cek apakah user sudah memfavoritkan buku tertentu
     */
    public function hasFavorited(Book $book): bool
    {
        return $this->favorites()
            ->where('book_id', $book->id)
            ->exists();
    }
}