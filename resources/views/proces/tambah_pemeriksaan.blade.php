@extends('myapp')

@section('content')
<main class="container-fluid px-4">
    <h1 class="mt-4">Tambah Pemeriksaan</h1>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('pemeriksaan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>ID Pemeriksaan</label>
                    <input type="text" name="id_pemeriksaan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>No RM (Pasien)</label>
                    <select name="no_rm" class="form-control" required>
                        <option value="">--pilih Pasien--</option> 
                        @foreach ($pasiens as $p)
                            <option value="{{ $p->no_rm }}">{{ $p->no_rm }} - {{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>NIP Dokter</label>
                    <select name="nip" class="form-control" required>
                        <option value="">--Pilih Dokter--</option>
                        @foreach ($dokters as $d)
                            <option value="{{ $d->nip }}">{{ $d->nip }} - {{ $d->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Faskes</label>
                    <select name="id_faskes" class="form-control" required>
                       <option value="">--Pilih Faskes--</option>
                        @foreach ($faskes as $f)
                            <option value="{{ $f->id_faskes }}">{{ $f->id_faskes }} - {{ $f->name_f }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Keluhan</label>
                    <textarea name="keluhan" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Hasil</label>
                    <textarea name="hasil" class="form-control"></textarea>
                </div>

                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</main>
@endsection
