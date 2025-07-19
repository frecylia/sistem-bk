@extends('layouts.admin.app')
@section('content')
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="main-content">
                    <form id="peminatan-form" action="" method="POST" class="bg-white p-4 rounded shadow-sm" novalidate>
                        @csrf
                        <div class="text-center mb-5">
                            <h1 class="text-primary">FORMULIR TES PEMINATAN KEJURUAN</h1>
                            <h2 class="text-secondary h3">MAN 1 Bandung</h2>
                            <p class="fw-bold">Tahun Ajaran 2025/2026</p>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white"><h2 class="mb-0 h4">DATA PRIBADI</h2></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama" class="form-label">Nama Lengkap:</label>
                                    <input type="text" id="nama" name="nama" required value="{{ Auth::user()->name }}" class="form-control @error('nama') is-invalid @enderror">
                                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="nis" class="form-label">Nomor Induk Siswa:</label>
                                    <input type="text" id="nis" name="nis" required value="{{ Auth::user()->nis }}" class="form-control @error('nis') is-invalid @enderror">
                                    @error('nis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" id="email" name="email" required value="{{ Auth::user()->email }}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="telepon" class="form-label">No. Telepon/HP:</label>
                                    <input type="tel" id="telepon" name="telepon" required value="{{ old('telepon') }}" class="form-control @error('telepon') is-invalid @enderror">
                                    @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="ttl" class="form-label">Tempat, Tanggal Lahir:</label>
                                    <input type="date" id="ttl" name="ttl" required  class="form-control @error('ttl') is-invalid @enderror" placeholder="Contoh: Bandung, 17 Agustus 2009">
                                    @error('ttl') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Jenis Kelamin:</label>
                                    <div class="radio-group">
                                        <label><input type="radio" name="gender" value="laki-laki" required {{ old('gender') == 'laki-laki' ? 'checked' : '' }}> Laki-laki</label>
                                        <label><input type="radio" name="gender" value="perempuan" {{ old('gender') == 'perempuan' ? 'checked' : '' }}> Perempuan</label>
                                    </div>
                                    @error('gender') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="alamat" class="form-label">Alamat:</label>
                                    <input type="text" id="alamat" name="alamat" required value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror">
                                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                
                                
                                
                               
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white"><h2 class="mb-0 h4">RIWAYAT PENDIDIKAN</h2></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="asal_smp" class="form-label">Asal SMP:</label>
                                    <input type="text" id="asal_smp" name="asal_smp" required value="{{ old('asal_smp') }}" class="form-control @error('asal_smp') is-invalid @enderror">
                                    @error('asal_smp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="nilai_rapor" class="form-label">Nilai Rata-rata Rapor Kelas 9:</label>
                                    <input type="number" id="nilai_rapor" name="nilai_rapor" min="0" max="100" step="0.01" required value="{{ old('nilai_rapor') }}" class="form-control @error('nilai_rapor') is-invalid @enderror">
                                    @error('nilai_rapor') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="prestasi" class="form-label">Prestasi Akademik/Non-Akademik:</label>
                                    <textarea id="prestasi" name="prestasi" class="form-control @error('prestasi') is-invalid @enderror">{{ old('prestasi') }}</textarea>
                                    @error('prestasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white"><h2 class="mb-0 h4">PEMINATAN JURUSAN</h2></div>
                            <div class="card-body">
                                <p class="alert alert-info"><em>Urutkan pilihan jurusan dari 1-3 sesuai minat Anda (1 = pilihan tertinggi). Peringkat tidak boleh sama.</em></p>
                        
                                <div class="jurusan-rank">
                                    <label for="rank_ipa" class="form-label">Peringkat IPA (Ilmu Pengetahuan Alam)</label>
                                    <input type="number" id="rank_ipa" name="rank_ipa" min="1" max="3" required value="{{ old('rank_ipa') }}" class="form-control @error('rank_ipa') is-invalid @enderror">
                                    @error('rank_ipa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="jurusan-rank">
                                    <label for="rank_ips" class="form-label">Peringkat IPS (Ilmu Pengetahuan Sosial)</label>
                                    <input type="number" id="rank_ips" name="rank_ips" min="1" max="3" required value="{{ old('rank_ips') }}" class="form-control @error('rank_ips') is-invalid @enderror">
                                    @error('rank_ips') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="jurusan-rank">
                                    <label for="rank_bahasa" class="form-label">Peringkat Bahasa</label>
                                    <input type="number" id="rank_bahasa" name="rank_bahasa" min="1" max="3" required value="{{ old('rank_bahasa') }}" class="form-control @error('rank_bahasa') is-invalid @enderror">
                                    @error('rank_bahasa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white"><h2 class="mb-0 h4">BAGIAN B: TES KEMAMPUAN DASAR</h2></div>
                            <div class="card-body">
                                <div class="peminatan-section card mb-3">
                                    <div class="card-header bg-light"><h3 class="mb-0 h5">Matematika (untuk semua peminatan)</h3></div>
                                    <div class="card-body">
                                        <div class="question">
                                            <p class="fw-bold">1. Hasil dari $3x^2 + 5x - 2 = 0$ adalah...</p>
                                            <div class="radio-group">
                                                <label><input type="radio" name="math_1" value="a" required {{ old('math_1') == 'a' ? 'checked' : '' }}> a. $x = -2$ dan $x = 1/3$</label>
                                                <label><input type="radio" name="math_1" value="b" {{ old('math_1') == 'b' ? 'checked' : '' }}> b. $x = 2$ dan $x = -1/3$</label>
                                                <label><input type="radio" name="math_1" value="c" {{ old('math_1') == 'c' ? 'checked' : '' }}> c. $x = -2$ dan $x = -1/3$</label>
                                                <label><input type="radio" name="math_1" value="d" {{ old('math_1') == 'd' ? 'checked' : '' }}> d. $x = 2$ dan $x = 1/3$</label>
                                            </div>
                                            @error('math_1') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="question">
                                            <p class="fw-bold">2. Jika $^2\log 8 = a$, maka nilai dari $^2\log 4$ adalah...</p>
                                            <div class="radio-group">
                                                <label><input type="radio" name="math_2" value="a" required {{ old('math_2') == 'a' ? 'checked' : '' }}> a. $a/2$</label>
                                                <label><input type="radio" name="math_2" value="b" {{ old('math_2') == 'b' ? 'checked' : '' }}> b. $a/3$</label>
                                                <label><input type="radio" name="math_2" value="c" {{ old('math_2') == 'c' ? 'checked' : '' }}> c. $2a/3$</label>
                                                <label><input type="radio" name="math_2" value="d" {{ old('math_2') == 'd' ? 'checked' : '' }}> d. $3a/2$</label>
                                            </div>
                                            @error('math_2') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white"><h2 class="mb-0 h4">PERNYATAAN DAN TANDA TANGAN</h2></div>
                            <div class="card-body">
                                <p class="alert alert-secondary">Saya menyatakan bahwa informasi yang saya berikan dalam formulir ini adalah benar dan dapat dipertanggungjawabkan. Saya bersedia mengikuti proses peminatan jurusan sesuai dengan ketentuan yang berlaku di sekolah.</p>
                        
                                <div class="form-group">
                                    <label for="tanggal" class="form-label">Tanggal:</label>
                                    <input type="date" id="tanggal" name="tanggal" required value="{{ old('tanggal') ?? date('Y-m-d') }}" class="form-control @error('tanggal') is-invalid @enderror" style="max-width: 200px;">
                                    @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                        
                                <div class="row mt-5 text-center">
                                    <div class="col-md-6 mb-4">
                                        <div class="signature-box border p-3 mb-2 mx-auto" style="max-width: 300px;"></div>
                                        <p class="signature-label fw-bold">Tanda tangan siswa</p>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="signature-box border p-3 mb-2 mx-auto" style="max-width: 300px;"></div>
                                        <p class="signature-label fw-bold">Tanda tangan orang tua/wali</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @auth
                            @if(Auth::user()->role === 'admin')
                            <div class="card mb-4 border-danger">
                                <div class="card-header bg-danger text-white"><h2 class="mb-0 h4">BAGIAN INI DIISI OLEH PETUGAS</h2></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nilai_matematika" class="form-label">Nilai Matematika:</label>
                                        <input type="number" id="nilai_matematika" name="nilai_matematika" min="0" max="100" value="{{ old('nilai_matematika') }}" class="form-control @error('nilai_matematika') is-invalid @enderror">
                                        @error('nilai_matematika') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Rekomendasi Jurusan:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="rekomendasi" value="ipa" {{ old('rekomendasi') == 'ipa' ? 'checked' : '' }}> IPA</label>
                                            <label><input type="radio" name="rekomendasi" value="ips" {{ old('rekomendasi') == 'ips' ? 'checked' : '' }}> IPS</label>
                                            <label><input type="radio" name="rekomendasi" value="bahasa" {{ old('rekomendasi') == 'bahasa' ? 'checked' : '' }}> Bahasa</label>
                                        </div>
                                        @error('rekomendasi') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="catatan" class="form-label">Catatan:</label>
                                        <textarea id="catatan" name="catatan" class="form-control @error('catatan') is-invalid @enderror">{{ old('catatan') }}</textarea>
                                        @error('catatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                            
                                    <div class="text-center mt-4">
                                        <div class="signature-box border p-3 mb-2 mx-auto" style="max-width: 300px;"></div>
                                        <p class="signature-label fw-bold">Petugas</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endauth
                        
                        <div class="text-center mt-4 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg px-5">Kirim Formulir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
@push('styles')
    <style>
        .form-group {
            margin-bottom: 1.25rem;
        }
        
        .radio-group, .checkbox-group {
            display: flex;
            flex-direction: column;
        }
        
        .radio-group label, .checkbox-group label {
            margin-bottom: 0.5rem;
            padding: 0.5rem 0.75rem;
            border-radius: .25rem;
            transition: background-color 0.2s;
            cursor: pointer;
        }
        
        .radio-group label:hover, .checkbox-group label:hover {
            background-color: #f8f9fa;
        }
        
        .question {
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
        }
        
        .question:last-child {
            border-bottom: none;
        }
        
        .jurusan-rank {
            margin-bottom: 1rem;
            padding: 1rem;
            background-color: #f8f9fa;
            border-radius: .25rem;
        }
        
        #esai {
            min-height: 150px;
        }
        .signature-box {
            height: 100px;
            background-color: #f8f9fa;
        }
    </style>
@endpush
@push('scripts')
<script type="text/javascript" id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('peminatan-form');
        const rankInputs = [
            document.getElementById('rank_ipa'),
            document.getElementById('rank_ips'),
            document.getElementById('rank_bahasa')
        ];

        function validateRanking() {
            // Ambil nilai yang tidak kosong
            const ranks = rankInputs.map(input => input.value).filter(Boolean);
            
            // Validasi hanya jika ketiga input sudah terisi
            if (ranks.length < 3) {
                return true;
            }
            
            // Cek apakah ada nilai duplikat
            const uniqueRanks = new Set(ranks);
            if (uniqueRanks.size !== ranks.length) {
                alert('Peringkat jurusan harus unik (1, 2, dan 3). Tidak boleh ada peringkat yang sama.');
                return false;
            }
            
            return true;
        }
        
        form.addEventListener('submit', function(e) {
            if (!validateRanking()) {
                e.preventDefault(); // Mencegah form dikirim jika validasi gagal
            }
        });
    });
</script>
@endpush