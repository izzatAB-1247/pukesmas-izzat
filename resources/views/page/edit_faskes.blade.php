@extends('myapp')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Data Faskes</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('faskes.index') }}">Data Faskes</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i> Form Edit Faskes
            </div>

            <div class="card-body">
                <form action="{{ route('faskes.update', $faskes->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- ID Faskes --}}
                    <div class="mb-3">
                        <label for="id_faskes" class="form-label">ID Faskes</label>
                        <input type="text" name="id_faskes" id="id_faskes" 
                               value="{{ $faskes->id_faskes }}" class="form-control" required>
                    </div>

                    {{-- Nama Faskes --}}
                    <div class="mb-3">
                        <label for="name_f" class="form-label">Nama Faskes</label>
                        <input type="text" name="name_f" id="name_f" 
                               value="{{ $faskes->name_f }}" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('faskes.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
