@extends('myapp')

@section('content')
<main class="container-fluid px-4">
    <h1 class="mt-4">Edit Pemeriksaan</h1>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('pemeriksaan.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>ID Pemeriksaan</label>
                    <input type="text" name="id_pemeriksaan" class="form-control" value="{{ $data->id_pemeriksaan }}" required>
                </div>

                <div class="mb-3">
                    <label>No RM (Pasien)</label>
                    <select name="no_rm" class="form-control" required>
                        @foreach ($pasiens as $p)
                            <option value="{{ $p->no_rm }}" {{ $p->no_rm == $data->no_rm ? 'selected' : '' }}>
                                {{ $p->no_rm }} - {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>NIP Dokter</label>
                    <select name="nip" class="form-control" required>
                        @foreach ($dokters as $d)
                            <option value="{{ $d->nip }}" {{ $d->nip == $data->nip ? 'selected' : '' }}>
                                {{ $d->nip }} - {{ $d->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Faskes</label>
                    <select name="id_faskes" class="form-control" required>
                        @foreach ($faskes as $f)
                            <option value="{{ $f->id_faskes }}" {{ $f->id_faskes == $data->id_faskes ? 'selected' : '' }}>
                                {{ $f->id_faskes }} - {{ $f->name_f }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $data->tanggal }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Keluhan</label>
                    <textarea name="keluhan" class="form-control">{{ $data->keluhan }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Hasil</label>
                    <textarea name="hasil" class="form-control">{{ $data->hasil }}</textarea>
                </div>

                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</main>
@endsection
