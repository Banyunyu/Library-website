<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GoogleBooksService
{
    protected $apiKey;
    protected $baseUrl = 'https://www.googleapis.com/books/v1';

    public function __construct()
    {
        $this->apiKey = env('GOOGLE_BOOKS_API_KEY');
    }

    public function searchBooks($query, $maxResults = 40)
    {
        try {
            $response = Http::get("{$this->baseUrl}/volumes", [
                'q' => $query,
                'maxResults' => $maxResults,
                'key' => $this->apiKey,
                'printType' => 'books',
                'orderBy' => 'relevance'
            ]);

            if ($response->successful()) {
                return $this->formatBooks($response->json()['items'] ?? []);
            }
            
            return [];
        } catch (\Exception $e) {
            Log::error('Google Books API Error: ' . $e->getMessage());
            return [];
        }
    }

    public function getBookById($googleBooksId)
    {
        try {
            $response = Http::get("{$this->baseUrl}/volumes/{$googleBooksId}", [
                'key' => $this->apiKey
            ]);

            if ($response->successful()) {
                return $this->formatSingleBook($response->json());
            }
            
            return null;
        } catch (\Exception $e) {
            Log::error('Google Books API Error: ' . $e->getMessage());
            return null;
        }
    }

    public function getPopularBooks($category = 'fiction', $maxResults = 40)
    {
        return $this->searchBooks("subject:{$category}", $maxResults);
    }

    protected function formatBooks($items)
    {
        $books = [];
        foreach ($items as $item) {
            $books[] = $this->formatSingleBook($item);
        }
        return $books;
    }

    protected function formatSingleBook($item)
    {
        $volumeInfo = $item['volumeInfo'] ?? [];
        $industryIdentifiers = $volumeInfo['industryIdentifiers'] ?? [];
        
        // Extract ISBN
        $isbn = null;
        foreach ($industryIdentifiers as $identifier) {
            if ($identifier['type'] === 'ISBN_13' || $identifier['type'] === 'ISBN_10') {
                $isbn = $identifier['identifier'];
                break;
            }
        }

        // Extract categories
        $categories = isset($volumeInfo['categories']) ? $volumeInfo['categories'] : [];
        
        // Extract authors
        $authors = isset($volumeInfo['authors']) ? $volumeInfo['authors'] : [];

        // Extract images
        $imageLinks = $volumeInfo['imageLinks'] ?? [];

        return [
            'google_books_id' => $item['id'] ?? null,
            'title' => $volumeInfo['title'] ?? 'Unknown Title',
            'subtitle' => $volumeInfo['subtitle'] ?? null,
            'authors' => $authors,
            'publisher' => $volumeInfo['publisher'] ?? null,
            'published_date' => $volumeInfo['publishedDate'] ?? null,
            'description' => $volumeInfo['description'] ?? null,
            'isbn' => $isbn,
            'page_count' => $volumeInfo['pageCount'] ?? null,
            'categories' => $categories,
            'language' => $volumeInfo['language'] ?? null,
            'thumbnail' => $imageLinks['thumbnail'] ?? null,
            'small_thumbnail' => $imageLinks['smallThumbnail'] ?? null,
            'preview_link' => $volumeInfo['previewLink'] ?? null,
            'info_link' => $volumeInfo['infoLink'] ?? null,
        ];
    }
}