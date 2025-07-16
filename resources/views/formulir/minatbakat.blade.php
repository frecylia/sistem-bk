<?php

// File: routes/web.php
use App\Http\Controllers\TestController;

Route::get('/tes-minat-bakat', [TestController::class, 'form'])->name('tes.form');
Route::post('/tes-minat-bakat', [TestController::class, 'submit'])->name('tes.submit');


// File: app/Http/Controllers/TestController.php
namespace App\Http\TestControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    public function form()
    {
        // Soal minat RIASEC
        $minat = [
            ['no' => 1, 'pertanyaan' => 'Saya suka menganalisis data dan menyelesaikan persoalan logis.'],
            ['no' => 2, 'pertanyaan' => 'Saya senang membantu teman yang kesulitan belajar.'],
            ['no' => 3, 'pertanyaan' => 'Saya suka membuat desain atau menggambar bebas.'],
            ['no' => 4, 'pertanyaan' => 'Saya tertarik mengelola uang dan membuat rencana keuangan.'],
            ['no' => 5, 'pertanyaan' => 'Saya lebih suka bekerja di luar ruangan daripada di kantor.'],
            ['no' => 6, 'pertanyaan' => 'Saya suka memimpin dan mengambil keputusan untuk kelompok.'],
            ['no' => 7, 'pertanyaan' => 'Saya senang meneliti topik sains dan melakukan eksperimen.'],
            ['no' => 8, 'pertanyaan' => 'Saya menikmati membuat tulisan, cerita, atau puisi.'],
            ['no' => 9, 'pertanyaan' => 'Saya suka berbicara di depan umum dan menyampaikan ide.'],
            ['no' => 10, 'pertanyaan' => 'Saya tertarik bekerja di laboratorium atau ruang eksperimen.'],
            ['no' => 11, 'pertanyaan' => 'Saya suka bekerja dengan data atau angka.'],
            ['no' => 12, 'pertanyaan' => 'Saya senang mempelajari struktur tumbuhan dan hewan.'],
            ['no' => 13, 'pertanyaan' => 'Saya senang berinteraksi dan membimbing teman.'],
            ['no' => 14, 'pertanyaan' => 'Saya tertarik mengembangkan aplikasi atau teknologi baru.'],
            ['no' => 15, 'pertanyaan' => 'Saya suka memecahkan teka-teki dan soal logika.'],
            ['no' => 16, 'pertanyaan' => 'Saya menikmati menghias atau merancang ruang.'],
            ['no' => 17, 'pertanyaan' => 'Saya senang melayani dan memberi dukungan kepada orang lain.'],
            ['no' => 18, 'pertanyaan' => 'Saya tertarik dalam dunia bisnis dan pemasaran.'],
            ['no' => 19, 'pertanyaan' => 'Saya suka bekerja dengan mesin atau alat-alat teknis.'],
            ['no' => 20, 'pertanyaan' => 'Saya senang membuat jadwal atau daftar tugas yang rapi.'],
            ['no' => 21, 'pertanyaan' => 'Saya tertarik membaca buku-buku sains atau teknologi.'],
            ['no' => 22, 'pertanyaan' => 'Saya menikmati pekerjaan yang mengandalkan kreativitas.'],
            ['no' => 23, 'pertanyaan' => 'Saya senang memberikan nasihat atau bimbingan.'],
            ['no' => 24, 'pertanyaan' => 'Saya suka menjadi pemimpin dalam organisasi.'],
            ['no' => 25, 'pertanyaan' => 'Saya menikmati membuat laporan atau grafik.'],
            ['no' => 26, 'pertanyaan' => 'Saya suka mengeksplorasi alam dan lingkungan sekitar.'],
            ['no' => 27, 'pertanyaan' => 'Saya senang menggambar karakter atau ilustrasi.'],
            ['no' => 28, 'pertanyaan' => 'Saya suka mengajar dan berbagi ilmu.'],
            ['no' => 29, 'pertanyaan' => 'Saya suka membangun atau memperbaiki barang rusak.'],
            ['no' => 30, 'pertanyaan' => 'Saya senang merancang produk dan tampilannya.'],
        ];

        // Soal bakat logika, numerik, verbal
        $bakat = [
            ['no' => 31, 'pertanyaan' => 'Berapa hasil dari 5 x (3 + 2)?', 'options' => ['10', '15', '20', '25', '30']],
            ['no' => 32, 'pertanyaan' => "Apa sinonim dari kata 'aktif'?", 'options' => ['Pasif', 'Lesu', 'Dinamis', 'Lambat', 'Tenang']],
            ['no' => 33, 'pertanyaan' => 'Temukan pola berikut: 2, 4, 8, 16, ...', 'options' => ['20', '22', '24', '30', '32']],
            ['no' => 34, 'pertanyaan' => 'Kalimat dengan tanda baca yang benar:', 'options' => [
                'Dia berkata, "Saya akan pergi."',
                'Dia berkata "saya akan pergi".',
                'Dia berkata saya akan pergi.',
                'Dia berkata: "Saya akan pergi"',
                'Dia berkata saya "akan pergi".'
            ]],
            ['no' => 35, 'pertanyaan' => 'Jika semua burung bisa terbang, dan elang adalah burung, maka ...', 'options' => [
                'Elang bisa terbang', 'Elang tidak bisa terbang', 'Elang bukan burung', 'Tidak tahu', 'Tidak relevan'
            ]],
            // ... Tambahkan soal hingga nomor 60
        ];

        return view('tes.form', compact('minat', 'bakat'));
    }

    public function submit(Request $request)
    {
        $input = $request->except('_token');
        $skor = 0;
        $kunci = [
            31 => 'b', 32 => 'c', 33 => 'e', 34 => 'a', 35 => 'a', // dan seterusnya
        ];

        foreach ($kunci as $no => $jawaban) {
            if (isset($input['q'.$no]) && strtolower($input['q'.$no]) == strtolower($jawaban)) {
                $skor++;
            }
        }

        return view('tes.hasil', compact('skor'));
    }
}
