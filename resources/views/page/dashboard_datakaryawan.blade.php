@extends('myapp')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Karyawan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Karyawan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i> Daftar Karyawan
                </div>
                <a href="{{ route('karyawan.create') }}" class="btn btn-primary btn-sm">
                    + Tambah Data Karyawan
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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>JK</th>
                            <th>Jabatan</th>
                            <th>Departement</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data_karyawan as $index => $k)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $k->nip }}</td>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->alamat }}</td>
                                <td>{{ $k->jk }}</td>
                                <td>{{ strtoupper($k->jabatan) }}</td>
                                <td>{{ $k->departemen }}</td>

                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('karyawan.destroy', $k->id) }}" 
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
                                <td colspan="8" class="text-center">Belum ada data karyawan</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</main>
@endsection
