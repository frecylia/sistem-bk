@extends('layouts.app')

@section('content')
<div class="container">
    <form id="peminatan-form" action="{{ route('formulir.store') }}" method="POST">
        @csrf
        <h1>FORMULIR TES PEMINATAN KEJURUAN MAN 1 Bandung</h1>
        <p style="text-align: center; font-weight: bold;">Tahun Ajaran 2025/2026</p>
        
        <h2>DATA PRIBADI</h2>
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="nis">Nomor Induk Siswa:</label>
            <input type="text" id="nis" name="nis" required value="{{ old('nis') }}" class="form-control @error('nis') is-invalid @enderror">
            @error('nis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="ttl">Tempat, Tanggal Lahir:</label>
            <input type="text" id="ttl" name="ttl" required value="{{ old('ttl') }}" class="form-control @error('ttl') is-invalid @enderror">
            @error('ttl')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="laki-laki" required {{ old('gender') == 'laki-laki' ? 'checked' : '' }}> Laki-laki</label>
                <label><input type="radio" name="gender" value="perempuan" {{ old('gender') == 'perempuan' ? 'checked' : '' }}> Perempuan</label>
            </div>
            @error('gender')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror">
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="telepon">No. Telepon/HP:</label>
            <input type="tel" id="telepon" name="telepon" required value="{{ old('telepon') }}" class="form-control @error('telepon') is-invalid @enderror">
            @error('telepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <h2>RIWAYAT PENDIDIKAN</h2>
        <div class="form-group">
            <label for="asal_smp">Asal SMP:</label>
            <input type="text" id="asal_smp" name="asal_smp" required value="{{ old('asal_smp') }}" class="form-control @error('asal_smp') is-invalid @enderror">
            @error('asal_smp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="nilai_rapor">Nilai Rata-rata Rapor Kelas 9:</label>
            <input type="number" id="nilai_rapor" name="nilai_rapor" min="0" max="100" step="0.01" required value="{{ old('nilai_rapor') }}" class="form-control @error('nilai_rapor') is-invalid @enderror">
            @error('nilai_rapor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="prestasi">Prestasi Akademik/Non-Akademik:</label>
            <textarea id="prestasi" name="prestasi" class="form-control @error('prestasi') is-invalid @enderror">{{ old('prestasi') }}</textarea>
            @error('prestasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <h2>PEMINATAN JURUSAN</h2>
        <p><em>Urutkan pilihan jurusan dari 1-3 sesuai minat Anda (1 = pilihan tertinggi)</em></p>
        
        <div class="jurusan-rank">
            <label for="rank_ipa">IPA (Ilmu Pengetahuan Alam)</label>
            <input type="number" id="rank_ipa" name="rank_ipa" min="1" max="3" required value="{{ old('rank_ipa') }}" class="form-control @error('rank_ipa') is-invalid @enderror">
            @error('rank_ipa')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="jurusan-rank">
            <label for="rank_ips">IPS (Ilmu Pengetahuan Sosial)</label>
            <input type="number" id="rank_ips" name="rank_ips" min="1" max="3" required value="{{ old('rank_ips') }}" class="form-control @error('rank_ips') is-invalid @enderror">
            @error('rank_ips')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="jurusan-rank">
            <label for="rank_bahasa">Bahasa</label>
            <input type="number" id="rank_bahasa" name="rank_bahasa" min="1" max="3" required value="{{ old('rank_bahasa') }}" class="form-control @error('rank_bahasa') is-invalid @enderror">
            @error('rank_bahasa')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <h2>BAGIAN A: TES MINAT DAN BAKAT</h2>
        <p><strong>Petunjuk</strong>: Beri tanda centang pada pernyataan yang paling menggambarkan diri Anda.</p>
        
        <div class="peminatan-section">
            <h3>Peminatan IPA</h3>
            <div class="checkbox-group">
                <label><input type="checkbox" name="minat_ipa_1" value="1" {{ old('minat_ipa_1') ? 'checked' : '' }}> Saya tertarik melakukan eksperimen dan percobaan ilmiah</label>
                <label><input type="checkbox" name="minat_ipa_2" value="1" {{ old('minat_ipa_2') ? 'checked' : '' }}> Saya senang mempelajari struktur dan fungsi makhluk hidup</label>
                <label><input type="checkbox" name="minat_ipa_3" value="1" {{ old('minat_ipa_3') ? 'checked' : '' }}> Saya tertarik menyelesaikan soal-soal matematika</label>
                <label><input type="checkbox" name="minat_ipa_4" value="1" {{ old('minat_ipa_4') ? 'checked' : '' }}> Saya senang mengamati fenomena alam dan mencari penjelasannya</label>
                <label><input type="checkbox" name="minat_ipa_5" value="1" {{ old('minat_ipa_5') ? 'checked' : '' }}> Saya tertarik dengan teknologi dan cara kerjanya</label>
            </div>
        </div>
        
        <div class="peminatan-section">
            <h3>Peminatan IPS</h3>
            <div class="checkbox-group">
                <label><input type="checkbox" name="minat_ips_1" value="1" {{ old('minat_ips_1') ? 'checked' : '' }}> Saya tertarik mempelajari perilaku manusia dan interaksi sosial</label>
                <label><input type="checkbox" name="minat_ips_2" value="1" {{ old('minat_ips_2') ? 'checked' : '' }}> Saya senang mengikuti perkembangan ekonomi dan bisnis</label>
                <label><input type="checkbox" name="minat_ips_3" value="1" {{ old('minat_ips_3') ? 'checked' : '' }}> Saya tertarik dengan sejarah dan peristiwa-peristiwa masa lalu</label>
                <label><input type="checkbox" name="minat_ips_4" value="1" {{ old('minat_ips_4') ? 'checked' : '' }}> Saya menikmati diskusi tentang isu-isu sosial dan politik</label>
                <label><input type="checkbox" name="minat_ips_5" value="1" {{ old('minat_ips_5') ? 'checked' : '' }}> Saya senang menganalisis pola pikir dan tingkah laku masyarakat</label>
            </div>
        </div>
        
        <div class="peminatan-section">
            <h3>Peminatan Bahasa</h3>
            <div class="checkbox-group">
                <label><input type="checkbox" name="minat_bahasa_1" value="1" {{ old('minat_bahasa_1') ? 'checked' : '' }}> Saya senang mempelajari berbagai bahasa</label>
                <label><input type="checkbox" name="minat_bahasa_2" value="1" {{ old('minat_bahasa_2') ? 'checked' : '' }}> Saya tertarik dengan sastra dan karya-karya tulis</label>
                <label><input type="checkbox" name="minat_bahasa_3" value="1" {{ old('minat_bahasa_3') ? 'checked' : '' }}> Saya menikmati menganalisis makna di balik teks</label>
                <label><input type="checkbox" name="minat_bahasa_4" value="1" {{ old('minat_bahasa_4') ? 'checked' : '' }}> Saya tertarik dengan budaya dari berbagai negara</label>
                <label><input type="checkbox" name="minat_bahasa_5" value="1" {{ old('minat_bahasa_5') ? 'checked' : '' }}> Saya senang menulis cerita atau puisi</label>
            </div>
        </div>
        
        <h2>BAGIAN B: TES KEMAMPUAN DASAR</h2>
        
        <div class="peminatan-section">
            <h3>Matematika (untuk semua peminatan)</h3>
            
            <div class="question">
                <p>1. Hasil dari 3x² + 5x - 2 = 0 adalah...</p>
                <div class="radio-group">
                    <label class="option"><input type="radio" name="math_1" value="a" required {{ old('math_1') == 'a' ? 'checked' : '' }}> a. x = -2 dan x = 1/3</label>
                    <label class="option"><input type="radio" name="math_1" value="b" {{ old('math_1') == 'b' ? 'checked' : '' }}> b. x = 2 dan x = -1/3</label>
                    <label class="option"><input type="radio" name="math_1" value="c" {{ old('math_1') == 'c' ? 'checked' : '' }}> c. x = -2 dan x = -1/3</label>
                    <label class="option"><input type="radio" name="math_1" value="d" {{ old('math_1') == 'd' ? 'checked' : '' }}> d. x = 2 dan x = 1/3</label>
                </div>
                @error('math_1')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="question">
                <p>2. Jika 2 log 8 = a, maka nilai dari 2 log 4 adalah...</p>
                <div class="radio-group">
                    <label class="option"><input type="radio" name="math_2" value="a" required {{ old('math_2') == 'a' ? 'checked' : '' }}> a. a/2</label>
                    <label class="option"><input type="radio" name="math_2" value="b" {{ old('math_2') == 'b' ? 'checked' : '' }}> b. a/3</label>
                    <label class="option"><input type="radio" name="math_2" value="c" {{ old('math_2') == 'c' ? 'checked' : '' }}> c. 2a/3</label>
                    <label class="option"><input type="radio" name="math_2" value="d" {{ old('math_2') == 'd' ? 'checked' : '' }}> d. 3a/2</label>
                </div>
                @error('math_2')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="peminatan-section">
            <h3>Ilmu Pengetahuan Alam</h3>
            
            <div class="question">
                <p>1. Proses pembuatan makanan pada tumbuhan disebut...</p>
                <div class="radio-group">
                    <label class="option"><input type="radio" name="ipa_1" value="a" required {{ old('ipa_1') == 'a' ? 'checked' : '' }}> a. Fotosintesis</label>
                    <label class="option"><input type="radio" name="ipa_1" value="b" {{ old('ipa_1') == 'b' ? 'checked' : '' }}> b. Respirasi</label>
                    <label class="option"><input type="radio" name="ipa_1" value="c" {{ old('ipa_1') == 'c' ? 'checked' : '' }}> c. Transpirasi</label>
                    <label class="option"><input type="radio" name="ipa_1" value="d" {{ old('ipa_1') == 'd' ? 'checked' : '' }}> d. Reproduksi</label>
                </div>
                @error('ipa_1')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="question">
                <p>2. Gaya yang bekerja pada benda bermassa 5 kg sehingga mengalami percepatan 4 m/s² adalah...</p>
                <div class="radio-group">
                    <label class="option"><input type="radio" name="ipa_2" value="a" required {{ old('ipa_2') == 'a' ? 'checked' : '' }}> a. 9,8 N</label>
                    <label class="option"><input type="radio" name="ipa_2" value="b" {{ old('ipa_2') == 'b' ? 'checked' : '' }}> b. 20 N</label>
                    <label class="option"><input type="radio" name="ipa_2" value="c" {{ old('ipa_2') == 'c' ? 'checked' : '' }}> c. 1,25 N</label>
                    <label class="option"><input type="radio" name="ipa_2" value="d" {{ old('ipa_2') == 'd' ? 'checked' : '' }}> d. 125 N</label>
                </div>
                @error('ipa_2')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="peminatan-section">
            <h3>Ilmu Pengetahuan Sosial</h3>
            
            <div class="question">
                <p>1. Berikut yang termasuk faktor-faktor produksi adalah...</p>
                <div class="radio-group">
                    <label class="option"><input type="radio" name="ips_1" value="a" required {{ old('ips_1') == 'a' ? 'checked' : '' }}> a. Modal, laba, dan tanah</label>
                    <label class="option"><input type="radio" name="ips_1" value="b" {{ old('ips_1') == 'b' ? 'checked' : '' }}> b. Tanah, tenaga kerja, dan bunga</label>
                    <label class="option"><input type="radio" name="ips_1" value="c" {{ old('ips_1') == 'c' ? 'checked' : '' }}> c. Modal, tanah, dan tenaga kerja</label>
                    <label class="option"><input type="radio" name="ips_1" value="d" {{ old('ips_1') == 'd' ? 'checked' : '' }}> d. Laba, bunga, dan sewa</label>
                </div>
                @error('ips_1')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="question">
                <p>2. Peristiwa Proklamasi Kemerdekaan Indonesia terjadi pada tanggal...</p>
                <div class="radio-group">
                    <label class="option"><input type="radio" name="ips_2" value="a" required {{ old('ips_2') == 'a' ? 'checked' : '' }}> a. 17 Agustus 1944</label>
                    <label class="option"><input type="radio" name="ips_2" value="b" {{ old('ips_2') == 'b' ? 'checked' : '' }}> b. 17 Agustus 1945</label>
                    <label class="option"><input type="radio" name="ips_2" value="c" {{ old('ips_2') == 'c' ? 'checked' : '' }}> c. 18 Agustus 1945</label>
                    <label class="option"><input type="radio" name="ips_2" value="d" {{ old('ips_2') == 'd' ? 'checked' : '' }}> d. 1 Juni 1945</label>
                </div>
                @error('ips_2')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="peminatan-section">
            <h3>Bahasa</h3>
            
            <div class="question">
                <p>1. Kalimat berikut yang menggunakan majas personifikasi adalah...</p>
                <div class="radio-group">
                    <label class="option"><input type="radio" name="bahasa_1" value="a" required {{ old('bahasa_1') == 'a' ? 'checked' : '' }}> a. Dia secantik bidadari</label>
                    <label class="option"><input type="radio" name="bahasa_1" value="b" {{ old('bahasa_1') == 'b' ? 'checked' : '' }}> b. Angin berbisik di telingaku</label>
                    <label class="option"><input type="radio" name="bahasa_1" value="c" {{ old('bahasa_1') == 'c' ? 'checked' : '' }}> c. Dia bekerja seperti kuda</label>
                    <label class="option"><input type="radio" name="bahasa_1" value="d" {{ old('bahasa_1') == 'd' ? 'checked' : '' }}> d. Hatinya sekeras batu</label>
                </div>
                @error('bahasa_1')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="question">
                <p>2. "I ___ studying when she called me yesterday."</p>
                <div class="radio-group">
                    <label class="option"><input type="radio" name="bahasa_2" value="a" required {{ old('bahasa_2') == 'a' ? 'checked' : '' }}> a. am</label>
                    <label class="option"><input type="radio" name="bahasa_2" value="b" {{ old('bahasa_2') == 'b' ? 'checked' : '' }}> b. was</label>
                    <label class="option"><input type="radio" name="bahasa_2" value="c" {{ old('bahasa_2') == 'c' ? 'checked' : '' }}> c. were</label>
                    <label class="option"><input type="radio" name="bahasa_2" value="d" {{ old('bahasa_2') == 'd' ? 'checked' : '' }}> d. is</label>
                </div>
                @error('bahasa_2')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <h2>BAGIAN C: ESAI</h2>
        <p>Pilih satu topik di bawah ini dan tuliskan esai singkat (150-200 kata):</p>
        
        <div class="form-group">
            <div class="radio-group">
                <label><input type="radio" name="topik_esai" value="1" required {{ old('topik_esai') == '1' ? 'checked' : '' }}> 1. Bagaimana teknologi mempengaruhi cara belajar siswa di era digital?</label>
                <label><input type="radio" name="topik_esai" value="2" {{ old('topik_esai') == '2' ? 'checked' : '' }}> 2. Mengapa pelestarian budaya lokal penting di tengah arus globalisasi?</label>
                <label><input type="radio" name="topik_esai" value="3" {{ old('topik_esai') == '3' ? 'checked' : '' }}> 3. Apa peran bahasa dalam pembentukan identitas nasional?</label>
            </div>
            @error('topik_esai')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="esai">Jawaban:</label>
            <textarea id="esai" name="esai" required class="form-control @error('esai') is-invalid @enderror">{{ old('esai') }}</textarea>
            @error('esai')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <h2>PERNYATAAN DAN TANDA TANGAN</h2>
        <p>Saya menyatakan bahwa informasi yang saya berikan dalam formulir ini adalah benar dan dapat dipertanggungjawabkan. Saya bersedia mengikuti proses peminatan jurusan sesuai dengan ketentuan yang berlaku di sekolah.</p>
        
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required value="{{ old('tanggal') ?? date('Y-m-d') }}" class="form-control @error('tanggal') is-invalid @enderror">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="signature-container">
            <div>
                <div class="signature-box"></div>
                <p class="signature-label">Tanda tangan siswa</p>
            </div>
            
            <div>
                <div class="signature-box"></div>
                <p class="signature-label">Tanda tangan orang tua/wali</p>
            </div>
        </div>
        
        @if(Auth::check() && Auth::user()->role === 'admin')
        <div class="admin-section">
            <h2>BAGIAN INI DIISI OLEH PETUGAS</h2>
            
            <div class="form-group">
                <label for="nilai_matematika">Nilai Matematika:</label>
                <input type="number" id="nilai_matematika" name="nilai_matematika" min="0" max="100" value="{{ old('nilai_matematika') }}" class="form-control @error('nilai_matematika') is-invalid @enderror">
                @error('nilai_matematika')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="nilai_ipa">Nilai IPA:</label>
                <input type="number" id="nilai_ipa" name="nilai_ipa" min="0" max="100" value="{{ old('nilai_ipa') }}" class="form-control @error('nilai_ipa') is-invalid @enderror">
                @error('nilai_ipa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="nilai_ips">Nilai IPS:</label>
                <input type="number" id="nilai_ips" name="nilai_ips" min="0" max="100" value="{{ old('nilai_ips') }}" class="form-control @error('nilai_ips') is-invalid @enderror">
                @error('nilai_ips')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="nilai_bahasa">Nilai Bahasa:</label>
                <input type="number" id="nilai_bahasa" name="nilai_bahasa" min="0" max="100" value="{{ old('nilai_bahasa') }}" class="form-control @error('nilai_bahasa') is-invalid @enderror">
                @error('nilai_bahasa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Rekomendasi Jurusan:</label>
                <div class="radio-group">
                    <label><input type="radio" name="rekomendasi" value="ipa" {{ old('rekomendasi') == 'ipa' ? 'checked' : '' }}> IPA</label>
                    <label><input type="radio" name="rekomendasi" value="ips" {{ old('rekomendasi') == 'ips' ? 'checked' : '' }}> IPS</label>
                    <label><input type="radio" name="rekomendasi" value="bahasa" {{ old('rekomendasi') == 'bahasa' ? 'checked' : '' }}> Bahasa</label>
                </div>
                @error('rekomendasi')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="catatan">Catatan:</label>
                <textarea id="catatan" name="catatan" class="form-control @error('catatan') is-invalid @enderror">{{ old('catatan') }}</textarea>
                @error('catatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div>
                <div class="signature-box"></div>
                <p class="signature-label">Petugas</p>
            </div>
        </div>
        @endif
        
        <button type="submit" class="submit-btn">Kirim Formulir</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Validasi untuk memastikan ranking jurusan tidak duplikat
        function validateRanking() {
            const rankIPA = document.getElementById('rank_ipa').value;
            const rankIPS = document.getElementById('rank_ips').value;
            const rankBahasa = document.getElementById('rank_bahasa').value;
            
            // Mengonversi ke angka untuk perbandingan
            const ranks = [parseInt(rankIPA), parseInt(rankIPS), parseInt(rankBahasa)];
            
            // Cek apakah ada angka yang sama
            const uniqueRanks = new Set(ranks);
            if (uniqueRanks.size !== ranks.length) {
                alert('Peringkat jurusan harus unik (1, 2, dan 3). Tidak boleh ada peringkat yang sama.');
                return false;
            }
            
            // Memastikan angka 1-3
            for (const rank of ranks) {
                if (isNaN(rank) || rank < 1 || rank > 3) {
                    alert('Peringkat jurusan harus berupa angka 1, 2, atau 3.');
                    return false;
                }
            }
            
            return true;
        }
        
        // Handle form submission
        const form = document.getElementById('peminatan-form');
        form.addEventListener('submit', function(e) {
            if (!validateRanking()) {
                e.preventDefault();
                return;
            }
        });
    });
</script>
@endsection
