@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sukses</div>

                <div class="card-body">
                    <div class="alert alert-success">
                        Formulir Tes Peminatan Kejuruan SMA berhasil dikirim!
                    </div>
                    <a href="{{ route('formulir.index') }}" class="btn btn-primary">Kembali ke Formulir</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection