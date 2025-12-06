@extends('myapp')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Data Dokter</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dokter.index') }}">Data Dokter</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-edit me-1"></i> Form Edit Dokter
            </div>

            <div class="card-body">
                <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- NIP --}}
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" name="nip" id="nip" value="{{ $dokter->nip }}" class="form-control" required>
                    </div>

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Dokter</label>
                        <input type="text" name="nama" id="nama" value="{{ $dokter->nama }}" class="form-control" required>
                    </div>

                    {{-- Alamat --}}
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat" value="{{ $dokter->alamat }}" class="form-control" required>
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label><br>

                        <label>
                            <input type="radio" name="jk" value="Laki-laki"
                                {{ $dokter->jk == 'Laki-laki' ? 'checked' : '' }}>
                            Laki-laki
                        </label>

                        &nbsp;&nbsp;

                        <label>
                            <input type="radio" name="jk" value="Perempuan"
                                {{ $dokter->jk == 'Perempuan' ? 'checked' : '' }}>
                            Perempuan
                        </label>
                    </div>

                    {{-- Spesialis --}}
                    <div class="mb-3">
                        <label for="spesialis" class="form-label">Spesialis</label>
                        <select name="spesialis" id="spesialis" class="form-select" required>
                            <option value="Umum"       {{ $dokter->spesialis == 'Umum' ? 'selected' : '' }}>Dokter Umum</option>
                            <option value="Anak"       {{ $dokter->spesialis == 'Anak' ? 'selected' : '' }}>Spesialis Anak</option>
                            <option value="Kandungan"  {{ $dokter->spesialis == 'Kandungan' ? 'selected' : '' }}>Spesialis Kandungan</option>
                            <option value="Saraf"      {{ $dokter->spesialis == 'Saraf' ? 'selected' : '' }}>Spesialis Saraf</option>
                            <option value="Bedah"      {{ $dokter->spesialis == 'Bedah' ? 'selected' : '' }}>Spesialis Bedah</option>
                            <option value="Gigi"       {{ $dokter->spesialis == 'Gigi' ? 'selected' : '' }}>Dokter Gigi</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
