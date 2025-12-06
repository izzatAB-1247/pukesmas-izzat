@extends('myapp')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Obat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Obat</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i> Daftar Obat
                </div>
                <a href="{{ route('obat.create') }}" class="btn btn-primary btn-sm">
                    + Tambah Data Obat
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
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Jenis Obat</th>
                            <th>Dosis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data_obat as $index => $o)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $o->kode_obat }}</td>
                                <td>{{ $o->nama_obat }}</td>
                                <td>{{ $o->jenis_obat }}</td>
                                <td>{{ $o->dosis }}</td>

                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ route('obat.edit', $o->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('obat.destroy', $o->id) }}" 
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
                                <td colspan="6" class="text-center">Belum ada data obat</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</main>
@endsection
