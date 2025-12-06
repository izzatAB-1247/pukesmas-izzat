@extends('myapp')
@section('content')
<main>

    @if ($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ol>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    @endif

    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Faskes</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Faskes</li>
        </ol>

        <form action="{{ url('faskes') }}" method="POST">
            @csrf

            {{-- ID Faskes --}}
            <div class="mb-3">
                <label for="id_faskes" class="form-label">ID Faskes</label>
                <input type="text" class="form-control" id="id_faskes" name="id_faskes" required>
            </div>

            {{-- Nama Faskes --}}
            <div class="mb-3">
                <label for="name_f" class="form-label">Nama Faskes</label>
                <select class="form-control" id="name_f" name="name_f" required>
                    <option value="">-- Pilih Jenis Faskes --</option>
                    <option value="BPJS">BPJS</option>
                    <option value="Reguler">Reguler</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>
</main>
@endsection
