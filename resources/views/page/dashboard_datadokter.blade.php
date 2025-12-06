@extends('myapp')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Dokter</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Dokter</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i> Daftar Dokter
                </div>
                <a href="{{ route('dokter.create') }}" class="btn btn-primary btn-sm">
                    + Tambah Data Dokter
                </a>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table id="datatablesSimple" class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Dokter</th>
                            <th>Alamat</th>
                            <th>JK</th>
                            <th>Spesialis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data_dokter as $index => $d)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $d->nip }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->alamat }}</td>
                                <td>{{ $d->jk }}</td>
                                <td>{{ $d->spesialis }}</td>

                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ route('dokter.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('dokter.destroy', $d->id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data dokter</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</main>
@endsection
