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
        <h1 class="mt-4">Tambah Pasien</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Pasien</li>
        </ol>

        <form action="{{ url('pasien') }}" method="POST">
            @csrf

            {{-- No RM --}}
            <div class="mb-3">
                <label for="no_rm" class="form-label">No Rekam Medis</label>
                <input type="text" class="form-control" id="no_rm" name="no_rm" value="{{ old('no_rm') }}">
            </div>

            {{-- Nama --}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pasien</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
            </div>

            {{-- Jenis Kelamin --}}
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label><br>
                <label><input type="radio" name="jk" value="Laki-laki" {{ old('jk')=='Laki-laki' ? 'checked' : '' }}> Laki-laki</label> &nbsp;
                <label><input type="radio" name="jk" value="Perempuan" {{ old('jk')=='Perempuan' ? 'checked' : '' }}> Perempuan</label>
            </div>

            {{-- Tanggal Lahir --}}
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            </div>

            {{-- No Telepon --}}
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="number" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}">
            </div>

            {{-- Penyakit --}}
            <div class="mb-3">
                <label for="penyakit" class="form-label">Penyakit</label>
                <input type="text" class="form-control" id="penyakit" name="penyakit" value="{{ old('penyakit') }}">
            </div>

            {{-- Faskes --}}
            <div class="mb-3">
                <label for="faskes_id" class="form-label">Fasilitas Kesehatan</label>
                <select name="faskes_id" id="faskes_id" class="form-control">
                    <option value="">-- Pilih Faskes --</option>

                    @foreach ($faskes as $f)
                        <option value="{{ $f->id }}" {{ old('faskes_id') == $f->id ? 'selected' : '' }}>
                            {{ $f->name_f }} {{-- atau nama field faskes yang benar --}}
                        </option>
                    @endforeach

                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</main>
@endsection
