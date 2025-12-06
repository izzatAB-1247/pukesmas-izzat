<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dokter;

class dokterController extends Controller
{
    public function index()
    {
        $data_dokter = dokter::all();
        return view('page.dashboard_datadokter', compact('data_dokter'));
    }

    public function create()
    {
        return view('page.tambah_dokter');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:dokter,nip',
            'nama' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'spesialis' => 'required',
        ],
        [
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'nama.required' => 'Nama wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'jk.required' => 'Jenis Kelamin wajib diisi.',
            'spesialis.required' => 'Spesialis wajib diisi.',
        ]);

        dokter::create($request->all());
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dokter = dokter::findOrFail($id);
        return view('page.edit_dokter', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $dokter = dokter::findOrFail($id);

        $request->validate([
            'nip' => 'required|unique:dokter,nip,'.$dokter->id,
            'nama' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'spesialis' => 'required',
        ],
        [
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'nama.required' => 'Nama wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'jk.required' => 'Jenis Kelamin wajib diisi.',
            'spesialis.required' => 'Spesialis wajib diisi.',
        ]);

        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dokter = dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus!');
    }
}
