@extends('myapp')

@section('content')
<main class="container-fluid px-4">

    <h1 class="mt-4">Data Pemeriksaan</h1>

    <a href="{{ route('pemeriksaan.create') }}" class="btn btn-primary mb-3">+ Tambah Pemeriksaan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-stethoscope"></i> Daftar Pemeriksaan
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID Pemeriksaan</th>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Faskes</th>
                        <th>Tanggal</th>
                        <th>Keluhan</th>
                        <th>Hasil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $p)
                        <tr>
                            <td>{{ $p->id_pemeriksaan }}</td>
                            <td>{{ $p->pasien->nama ?? '-' }}</td>
                            <td>{{ $p->dokter->nama ?? '-' }}</td>
                            <td>{{ $p->faskes->name_f ?? '-' }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->keluhan }}</td>
                            <td>{{ $p->hasil }}</td>
                            <td>
                                <a href="{{ route('pemeriksaan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pemeriksaan.destroy', $p->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="text-center">Belum ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</main>
@endsection
