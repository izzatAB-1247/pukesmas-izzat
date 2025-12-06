@extends('myapp')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Faskes</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Faskes</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-hospital me-1"></i> Daftar Fasilitas Kesehatan
                </div>
                <a href="{{ route('faskes.create') }}" class="btn btn-primary btn-sm">
                    + Tambah Data Faskes
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
                            <th>ID Faskes</th>
                            <th>Nama Faskes</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data_faskes as $index => $f)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $f->id_faskes }}</td>
                                <td>{{ $f->name_f }}</td>

                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ route('faskes.edit', $f->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('faskes.destroy', $f->id) }}" 
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
                                <td colspan="4" class="text-center">Belum ada data faskes</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</main>
@endsection
