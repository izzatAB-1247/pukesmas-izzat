@extends('myapp')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Data Pasien</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('pasien.index') }}">Data Pasien</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-edit me-1"></i> Form Edit Pasien
            </div>

            <div class="card-body">
                <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- NO RM --}}
                    <div class="mb-3">
                        <label for="no_rm" class="form-label">No Rekam Medis (RM)</label>
                        <input type="text" name="no_rm" id="no_rm" value="{{ $pasien->no_rm }}" 
                               class="form-control" required>
                    </div>

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pasien</label>
                        <input type="text" name="nama" id="nama" value="{{ $pasien->nama }}"
                               class="form-control" required>
                    </div>

                    {{-- Alamat --}}
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat" value="{{ $pasien->alamat }}"
                               class="form-control" required>
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label><br>

                        <label>
                            <input type="radio" name="jk" value="Laki-laki"
                                {{ $pasien->jk == 'Laki-laki' ? 'checked' : '' }}>
                            Laki-laki
                        </label>

                        &nbsp;&nbsp;

                        <label>
                            <input type="radio" name="jk" value="Perempuan"
                                {{ $pasien->jk == 'Perempuan' ? 'checked' : '' }}>
                            Perempuan
                        </label>
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                               value="{{ $pasien->tanggal_lahir }}" class="form-control" required>
                    </div>

                    {{-- No Telepon --}}
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No Telepon</label>
                        <input type="text" name="no_telepon" id="no_telepon"
                               value="{{ $pasien->no_telepon }}" class="form-control">
                    </div>

                    {{-- Penyakit --}}
                    <div class="mb-3">
                        <label for="penyakit" class="form-label">Penyakit</label>
                        <input type="text" name="penyakit" id="penyakit"
                               value="{{ $pasien->penyakit }}" class="form-control" required>
                    </div>

                    {{-- Faskes --}}
                    <div class="mb-3">
                        <label for="id_faskes" class="form-label">Faskes</label>
                        <select name="id_faskes" id="id_faskes" class="form-control" required>
                            <option value="">-- Pilih Faskes --</option>

                            @foreach ($faskes as $f)
                                <option value="{{ $f->id }}"
                                    {{ $pasien->id_faskes == $f->id ? 'selected' : '' }}>
                                    {{ $f->name_f }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>

                </form>
            </div>
        </div>
    </div>
</main>
@endsection
