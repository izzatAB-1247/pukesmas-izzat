@extends('myapp')
@section('content')
<main>
    @if ($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ol>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    @endif

    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Obat</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Obat</li>
        </ol>

        <form action="{{ url('obat') }}" method="POST">
            @csrf

            {{-- Kode Obat --}}
            <div class="mb-3">
                <label for="kode_obat" class="form-label">Kode Obat</label>
                <input type="text" class="form-control" id="kode_obat" name="kode_obat">
            </div>

            {{-- Nama Obat --}}
            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat">
            </div>

            {{-- Jenis Obat --}}
            <div class="mb-3">
                <label for="jenis_obat" class="form-label">Jenis Obat</label>
                <select class="form-select" id="jenis_obat" name="jenis_obat">
                    <option selected disabled>-- Pilih Jenis Obat --</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Kapsul">Kapsul</option>
                    <option value="Sirup">Sirup</option>
                    <option value="Salep">Salep</option>
                    <option value="Injeksi">Injeksi</option>
                </select>
            </div>

            {{-- Dosis --}}
            <div class="mb-3">
                <label for="dosis" class="form-label">Dosis</label>
                <input type="text" class="form-control" id="dosis" name="dosis" placeholder="Contoh: 3x1 / hari">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</main>
@endsection
