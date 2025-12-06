@extends('myapp')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Data Karyawan</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('karyawan.index') }}">Data Karyawan</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-edit me-1"></i> Form Edit Karyawan
            </div>

            <div class="card-body">
                <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- NIP --}}
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" name="nip" id="nip"
                            value="{{ $karyawan->nip }}"
                            class="form-control" required>
                    </div>

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Karyawan</label>
                        <input type="text" name="nama" id="nama"
                            value="{{ $karyawan->nama }}"
                            class="form-control" required>
                    </div>

                    {{-- Alamat --}}
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat"
                            value="{{ $karyawan->alamat }}"
                            class="form-control" required>
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label><br>

                        <label>
                            <input type="radio" name="jk" value="Laki-laki"
                                {{ $karyawan->jk == 'Laki-laki' ? 'checked' : '' }}>
                            Laki-laki
                        </label>

                        &nbsp;&nbsp;

                        <label>
                            <input type="radio" name="jk" value="Perempuan"
                                {{ $karyawan->jk == 'Perempuan' ? 'checked' : '' }}>
                            Perempuan
                        </label>
                    </div>

                    {{-- Jabatan --}}
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan"
                            value="{{ $karyawan->jabatan }}"
                            class="form-control" required>
                    </div>

                    {{-- Departemen --}}
                    <div class="mb-3">
                        <label for="departemen" class="form-label">Departemen</label>
                        <input type="text" name="departemen" id="departemen"
                            value="{{ $karyawan->departemen }}"
                            class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
