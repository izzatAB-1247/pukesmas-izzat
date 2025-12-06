@extends('myapp')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pasien</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Pasien</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i> Daftar Pasien
                </div>
                <a href="{{ route('pasien.create') }}" class="btn btn-primary btn-sm">
                    + Tambah Data Pasien
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
                            <th>No RM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>JK</th>
                            <th>Tanggal Lahir</th>
                            <th>No Telepon</th>
                            <th>Penyakit</th>
                            <th>Faskes</th> {{-- tambah --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data_pasien as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->no_rm }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->jk }}</td>
                                <td>{{ $p->tanggal_lahir }}</td>
                                <td>{{ $p->no_telepon ?? '-' }}</td>
                                <td>{{ $p->penyakit }}</td>
                                <td>{{ $p->faskes->name_f ?? '-' }}</td>

                                <td>
                                    <div class="d-grid gap-2 d-md-block">

                                        <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('pasien.destroy', $p->id) }}"
                                            method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data pasien ini?')">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">Belum ada data pasien</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</main>
@endsection
