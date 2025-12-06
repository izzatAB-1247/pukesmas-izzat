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
        <h1 class="mt-4">Tambah Dokter</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Dokter</li>
        </ol>

        <form action="{{ url('dokter') }}" method="POST">
            @csrf

            {{-- NIP --}}
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip">
            </div>

            {{-- Nama --}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>

            {{-- Jenis Kelamin --}}
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label><br>
                <label><input type="radio" name="jk" value="Laki-laki"> Laki-laki</label> &nbsp;
                <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
            </div>

            {{-- Spesialis --}}
            <div class="mb-3">
                <label for="spesialis" class="form-label">Spesialis</label>
                <select class="form-select" id="spesialis" name="spesialis">
                    <option selected disabled>-- Pilih Spesialis --</option>
                    <option value="Umum">Dokter Umum</option>
                    <option value="Anak">Spesialis Anak</option>
                    <option value="Kandungan">Spesialis Kandungan</option>
                    <option value="Saraf">Spesialis Saraf</option>
                    <option value="Bedah">Spesialis Bedah</option>
                    <option value="Gigi">Dokter Gigi</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</main>
@endsection
