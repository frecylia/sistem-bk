@extends('layouts.app')

@section('title', 'Hasil Tes Minat Bakat')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Tabel Hasil Tes Minat & Bakat</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Minat</th>
                        <th>Bakat</th>
                        <th>Rekomendasi Jurusan</th>
                        <th>Waktu Tes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $i => $hasil)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $hasil->user->name }}</td>
                        <td>{{ $hasil->user->nis }}</td>
                        <td>{{ $hasil->user->kelas }}</td>
                        <td>
                            <ul>
                                @foreach(json_decode($hasil->minat) ?? [] as $minat)
                                    <li>{{ $minat }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach(json_decode($hasil->bakat) ?? [] as $key => $val)
                                    <li>Pernyataan {{ $key+1 }}: Skor {{ $val }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td><strong>{{ $hasil->rekomendasi_jurusan }}</strong></td>
                        <td>{{ $hasil->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    @endforeach
                    @if($data->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data hasil tes</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
