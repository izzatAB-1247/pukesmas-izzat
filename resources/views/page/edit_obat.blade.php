@extends('myapp')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Data Obat</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('obat.index') }}">Data Obat</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-pills me-1"></i> Form Edit Obat
            </div>

            <div class="card-body">
                <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Kode Obat --}}
                    <div class="mb-3">
                        <label for="kode_obat" class="form-label">Kode Obat</label>
                        <input type="text" name="kode_obat" id="kode_obat"
                            value="{{ $obat->kode_obat }}"
                            class="form-control" required>
                    </div>

                    {{-- Nama Obat --}}
                    <div class="mb-3">
                        <label for="nama_obat" class="form-label">Nama Obat</label>
                        <input type="text" name="nama_obat" id="nama_obat"
                            value="{{ $obat->nama_obat }}"
                            class="form-control" required>
                    </div>

                    {{-- Jenis Obat --}}
                    <div class="mb-3">
                        <label for="jenis_obat" class="form-label">Jenis Obat</label>
                        <input type="text" name="jenis_obat" id="jenis_obat"
                            value="{{ $obat->jenis_obat }}"
                            class="form-control" required>
                    </div>

                    {{-- Dosis --}}
                    <div class="mb-3">
                        <label for="dosis" class="form-label">Dosis</label>
                        <input type="text" name="dosis" id="dosis"
                            value="{{ $obat->dosis }}"
                            class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('obat.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
