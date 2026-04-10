@extends('layouts.app')

@section('title', 'Membaca - ' . $book->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Tombol Kembali -->
    <div class="mb-6" data-aos="fade-right">
        <a href="{{ route('books.show', $book) }}" 
           class="inline-flex items-center gap-2 text-[#2C3E50] hover:text-[#E67E22] transition font-medium">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali ke Detail Novel</span>
        </a>
    </div>

    <!-- Header Buku -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6" data-aos="fade-down">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-[#2C3E50] mb-2">{{ $book->title }}</h1>
                <p class="text-gray-500">{{ $book->authors_display }}</p>
            </div>
            
            <!-- Controls -->
            <div class="flex items-center gap-3 bg-gray-100 rounded-xl p-2">
                <button onclick="decreaseFont()" 
                        class="w-10 h-10 bg-white rounded-lg hover:bg-[#2C3E50] hover:text-white transition flex items-center justify-center shadow-sm">
                    <i class="fas fa-minus text-sm"></i>
                </button>
                <span id="font-size" class="w-16 text-center font-medium text-gray-700">16px</span>
                <button onclick="increaseFont()" 
                        class="w-10 h-10 bg-white rounded-lg hover:bg-[#2C3E50] hover:text-white transition flex items-center justify-center shadow-sm">
                    <i class="fas fa-plus text-sm"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Konten Baca -->
    <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 mb-8" data-aos="fade-up">
        <div id="reader-content" class="prose prose-lg max-w-none text-gray-700 leading-relaxed" style="font-size: 16px;">
            @php
                // Data konten per halaman
                $chapters = [
                    1 => [
                        'title' => 'Bab 1: Awal Mula',
                        'content' => '
                            <h1 class="text-3xl font-bold text-[#2C3E50] mb-6 text-center">' . e($book->title) . '</h1>
                            <div class="text-center mb-8">
                                <p class="text-gray-500 italic">Karya: ' . e($book->authors_display) . '</p>
                                <div class="w-16 h-0.5 bg-[#E67E22] mx-auto mt-4"></div>
                            </div>
                            <h2 class="text-2xl font-bold text-[#2C3E50] mt-8 mb-4">Bab 1: Awal Mula</h2>
                            <p class="mb-4">Matahari pagi menyinari kota kecil itu dengan hangat. Burung-burung berkicau riang menyambut hari baru. Di sebuah rumah sederhana, seorang pemuda bernama Andi terbangun dari tidurnya. Ia meregangkan tubuh dan menarik napas dalam-dalam.</p>
                            <p class="mb-4">"Hari ini adalah hari pertama," gumamnya sambil tersenyum. Ia segera bangkit dan membersihkan diri. Setelah selesai, ia mengenakan pakaian terbaiknya dan bersiap untuk pergi.</p>
                            <p class="mb-4">Perjalanan menuju tempat baru itu terasa berbeda. Ada kegembiraan yang bercampur dengan sedikit kegugupan. Andi tidak pernah membayangkan bahwa hidupnya akan berubah drastis hari ini.</p>
                            <div class="my-8 text-center">
                                <i class="fas fa-book-open text-3xl text-gray-300"></i>
                            </div>
                            <p class="mb-4">Sesampainya di tempat tujuan, ia disambut oleh pemandangan yang menakjubkan. Gedung megah berdiri kokoh di hadapannya. "Ini adalah awal dari petualangan baruku," bisiknya penuh semangat.</p>
                        '
                    ],
                    2 => [
                        'title' => 'Bab 2: Pertemuan',
                        'content' => '
                            <h2 class="text-2xl font-bold text-[#2C3E50] mt-8 mb-4">Bab 2: Pertemuan</h2>
                            <p class="mb-4">Setelah melewati pintu utama, Andi disambut oleh suasana yang ramai. Banyak orang berlalu lalang dengan berbagai keperluan. Ia berjalan perlahan sambil mengamati sekeliling.</p>
                            <p class="mb-4">Tiba-tiba, seseorang menepuk pundaknya dari belakang. "Hei, kamu pasti Andi, benar kan?" tanya seorang pemuda dengan senyum ramah.</p>
                            <p class="mb-4">"Ya, benar. Siapa kamu?" jawab Andi sedikit terkejut.</p>
                            <blockquote class="border-l-4 border-[#E67E22] pl-4 italic my-4 text-gray-600">
                                "Aku Budi, teman sekelompokmu. Ayo, aku akan menunjukkan tempat kita!"
                            </blockquote>
                            <p class="mb-4">Andi mengikuti Budi menuju ruangan yang telah disediakan. Di perjalanan, mereka berbincang tentang banyak hal. Andi merasa nyaman dengan kehadiran Budi.</p>
                            <p class="mb-4">"Kita akan menghabiskan banyak waktu bersama. Semoga kita bisa menjadi teman baik," ujar Budi sambil membukakan pintu.</p>
                            <div class="my-8 text-center">
                                <i class="fas fa-users text-3xl text-gray-300"></i>
                            </div>
                            <p class="mb-4">Di dalam ruangan, sudah ada beberapa orang yang sedang duduk dan berbincang. Mereka menyambut Andi dengan hangat. Andi merasa diterima dengan baik.</p>
                        '
                    ],
                    3 => [
                        'title' => 'Bab 3: Tantangan Pertama',
                        'content' => '
                            <h2 class="text-2xl font-bold text-[#2C3E50] mt-8 mb-4">Bab 3: Tantangan Pertama</h2>
                            <p class="mb-4">Hari-hari berlalu dengan cepat. Andi mulai terbiasa dengan rutinitas barunya. Namun, tantangan pertama akhirnya datang juga.</p>
                            <p class="mb-4">"Kita akan menghadapi ujian besar minggu depan," kata Budi suatu sore. Wajahnya tampak serius.</p>
                            <p class="mb-4">Andi menghela napas. Ia tahu ini adalah momen yang ditunggu-tunggu. "Aku siap," jawabnya mantap.</p>
                            <blockquote class="border-l-4 border-[#E67E22] pl-4 italic my-4 text-gray-600">
                                "Kegagalan adalah batu loncatan menuju kesuksesan. Jangan takut untuk mencoba!"
                            </blockquote>
                            <p class="mb-4">Mereka mulai belajar bersama setiap malam. Andi merasa kemampuannya semakin meningkat. Ia bersyukur memiliki teman-teman yang mendukung.</p>
                            <div class="my-8 text-center">
                                <i class="fas fa-trophy text-3xl text-gray-300"></i>
                            </div>
                            <p class="mb-4">Hari ujian pun tiba. Andi merasa gugup tapi juga bersemangat. Ia mengambil napas dalam-dalam dan mulai mengerjakan soal demi soal.</p>
                        '
                    ],
                    4 => [
                        'title' => 'Bab 4: Hasil',
                        'content' => '
                            <h2 class="text-2xl font-bold text-[#2C3E50] mt-8 mb-4">Bab 4: Hasil</h2>
                            <p class="mb-4">Beberapa minggu setelah ujian, pengumuman akhirnya keluar. Andi dan teman-temannya berkumpul di ruangan yang sama.</p>
                            <p class="mb-4">"Aku gugup sekali," bisik Budi di sampingnya.</p>
                            <p class="mb-4">Andi hanya bisa mengangguk. Matanya tertuju pada papan pengumuman yang masih tertutup kain merah.</p>
                            <p class="mb-4">Saat kain itu dibuka, terdengar sorak sorai. Andi melihat namanya terpampang di urutan teratas. Ia tidak percaya dengan apa yang dilihatnya.</p>
                            <blockquote class="border-l-4 border-[#E67E22] pl-4 italic my-4 text-gray-600">
                                "Selamat, Andi! Kamu berhasil menjadi yang terbaik!"
                            </blockquote>
                            <p class="mb-4">Air mata haru mengalir di pipinya. Ia berpelukan dengan Budi dan teman-teman lainnya. Perjuangan kerasnya selama ini membuahkan hasil yang manis.</p>
                            <div class="my-8 text-center">
                                <i class="fas fa-star text-3xl text-[#E67E22]"></i>
                            </div>
                            <p class="mb-4">"Ini baru awal," kata Andi dalam hati. "Masih banyak petualangan yang menungguku."</p>
                            <p class="mb-4 text-center italic text-gray-500">~ Tamat ~</p>
                        '
                    ]
                ];
                
                $currentPage = session('reading_page_' . $book->id, 1);
                $totalPages = count($chapters);
                $currentChapter = $chapters[$currentPage];
                $progress = round(($currentPage / $totalPages) * 100);
            @endphp
            
            {!! $currentChapter['content'] !!}
        </div>
        
        <!-- Navigasi Halaman -->
        <div class="flex flex-wrap justify-between items-center mt-8 pt-6 border-t border-gray-200 gap-4">
            @if($currentPage > 1)
                <a href="{{ route('books.read.page', ['book' => $book->id, 'page' => $currentPage - 1]) }}" 
                   class="px-5 py-2.5 bg-gray-100 hover:bg-[#2C3E50] hover:text-white rounded-xl transition flex items-center gap-2 text-gray-600 hover:text-white">
                    <i class="fas fa-chevron-left text-sm"></i>
                    <span>Bab Sebelumnya</span>
                </a>
            @else
                <div></div>
            @endif
            
            <span class="text-gray-500 text-sm bg-gray-100 px-4 py-2 rounded-full">
                Bab {{ $currentPage }} dari {{ $totalPages }}
            </span>
            
            @if($currentPage < $totalPages)
                <a href="{{ route('books.read.page', ['book' => $book->id, 'page' => $currentPage + 1]) }}" 
                   class="px-5 py-2.5 bg-gray-100 hover:bg-[#2C3E50] hover:text-white rounded-xl transition flex items-center gap-2 text-gray-600 hover:text-white">
                    <span>Bab Selanjutnya</span>
                    <i class="fas fa-chevron-right text-sm"></i>
                </a>
            @else
                <a href="{{ route('books.show', $book) }}" 
                   class="px-5 py-2.5 bg-[#E67E22] hover:bg-[#D35400] text-white rounded-xl transition flex items-center gap-2">
                    <span>Selesai Membaca</span>
                    <i class="fas fa-check text-sm"></i>
                </a>
            @endif
        </div>
    </div>
    
    <!-- Progress Membaca -->
    <div class="bg-white rounded-2xl shadow-lg p-5" data-aos="fade-up">
        <div class="flex justify-between items-center mb-3">
            <span class="text-gray-600 font-medium">📖 Progress Membaca</span>
            <span class="text-[#E67E22] font-semibold">{{ $progress }}%</span>
        </div>
        <div class="relative w-full bg-gray-200 rounded-full h-2.5 overflow-hidden">
            <div class="bg-gradient-to-r from-[#E67E22] to-[#D35400] h-2.5 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
        </div>
        <p class="text-xs text-gray-400 mt-2 text-right">
            @if($progress < 100)
                Teruslah membaca, petualangan menanti!
            @else
                🎉 Selamat! Kamu telah menyelesaikan novel ini! 🎉
            @endif
        </p>
    </div>
</div>

@push('scripts')
<script>
    function increaseFont() {
        let content = document.getElementById('reader-content');
        let currentSize = parseInt(window.getComputedStyle(content).fontSize);
        if (currentSize < 24) {
            let newSize = currentSize + 2;
            content.style.fontSize = newSize + 'px';
            document.getElementById('font-size').innerText = newSize + 'px';
            
            // Simpan preferensi font di localStorage
            localStorage.setItem('font_size', newSize);
        }
    }
    
    function decreaseFont() {
        let content = document.getElementById('reader-content');
        let currentSize = parseInt(window.getComputedStyle(content).fontSize);
        if (currentSize > 12) {
            let newSize = currentSize - 2;
            content.style.fontSize = newSize + 'px';
            document.getElementById('font-size').innerText = newSize + 'px';
            
            // Simpan preferensi font di localStorage
            localStorage.setItem('font_size', newSize);
        }
    }
    
    // Load saved font size
    document.addEventListener('DOMContentLoaded', function() {
        let savedFontSize = localStorage.getItem('font_size');
        if (savedFontSize) {
            document.getElementById('reader-content').style.fontSize = savedFontSize + 'px';
            document.getElementById('font-size').innerText = savedFontSize + 'px';
        }
    });
</script>
@endpush

@push('styles')
<style>
    .prose p {
        margin-bottom: 1.25rem;
        line-height: 1.8;
    }
    
    .prose h2 {
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    
    .prose h3 {
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
    }
    
    .prose blockquote {
        font-style: italic;
        border-left: 4px solid #E67E22;
        padding-left: 1rem;
        margin: 1.5rem 0;
        color: #4b5563;
    }
    
    button:active {
        transform: scale(0.95);
    }
    
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #E67E22;
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #D35400;
    }
</style>
@endpush
@endsection