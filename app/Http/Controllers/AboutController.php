<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $visi = "Menjadi perpustakaan digital terdepan yang mencerdaskan bangsa melalui akses pengetahuan yang mudah dan menyenangkan.";
        
        $misi = [
            "Menyediakan koleksi buku berkualitas untuk semua kalangan",
            "Mengembangkan platform baca yang nyaman dan interaktif",
            "Mendorong minat baca masyarakat melalui teknologi",
            "Berkolaborasi dengan penulis dan penerbit lokal",
            "Memberikan layanan peminjaman buku yang mudah dan cepat"
        ];
        
        return view('about', compact('visi', 'misi'));
    }
}