<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $data_obat = Obat::all();
        return view('page.dashboard_dataobat', compact('data_obat'));
    }

    public function create()
    {
        return view('page.tambah_obat');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:obats,kode_obat',
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'dosis' => 'required',
        ], [
            'kode_obat.required' => 'Kode obat wajib diisi.',
            'kode_obat.unique' => 'Kode obat sudah digunakan.',
            'nama_obat.required' => 'Nama obat wajib diisi.',
            'jenis_obat.required' => 'Jenis obat wajib diisi.',
            'dosis.required' => 'Dosis wajib diisi.',
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('page.edit_obat', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $request->validate([
            'kode_obat' => 'required|unique:obats,kode_obat,' . $obat->id,
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'dosis' => 'required',
        ], [
            'kode_obat.required' => 'Kode obat wajib diisi.',
            'kode_obat.unique' => 'Kode obat sudah digunakan.',
            'nama_obat.required' => 'Nama obat wajib diisi.',
            'jenis_obat.required' => 'Jenis obat wajib diisi.',
            'dosis.required' => 'Dosis wajib diisi.',
        ]);

        $obat->update($request->all());

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus!');
    }
}
