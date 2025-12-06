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
        <h1 class="mt-4">Tambah Karyawan</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Karyawan</li>
        </ol>

        <form action="{{ url('karyawan') }}" method="POST">
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

            {{-- Jabatan --}}
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select class="form-select" id="jabatan" name="jabatan">
                    <option selected disabled>-- Pilih Jabatan --</option>
                    <option value="Staff">Staff</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Manager">Manager</option>
                    <option value="HRD">HRD</option>
                    <option value="Keuangan">Keuangan</option>
                </select>
            </div>

            {{-- Departement --}}
            <div class="mb-3">
                <label for="departemen" class="form-label">Departement</label>
                <select class="form-select" id="departemen" name="departemen">
                    <option selected disabled>-- Pilih Departement --</option>
                    <option value="Administrasi">Administrasi</option>
                    <option value="Keuangan">Keuangan</option>
                    <option value="SDM">SDM</option>
                    <option value="Operasional">Operasional</option>
                    <option value="Marketing">Marketing</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</main>
@endsection
