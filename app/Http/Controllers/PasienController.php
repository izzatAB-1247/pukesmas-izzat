<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Faskes;

class PasienController extends Controller
{
    public function index()
    {
        $data_pasien = Pasien::with('faskes')->get(); // load relasi
        return view('page.dashboard_datapasien', compact('data_pasien'));
    }

    public function create()
    {
        $faskes = Faskes::all(); // ambil list faskes untuk dropdown
        return view('page.tambah_pasien', compact('faskes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_rm' => 'required|unique:pasiens,no_rm',
            'nama' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'nullable',
            'penyakit' => 'required',
            'faskes_id' => 'required|exists:faskes,id', // VALIDASI BARU
        ]);

        Pasien::create([
            'no_rm' => $request->no_rm,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'penyakit' => $request->penyakit,
            'faskes_id' => $request->faskes_id, // SIMPAN FASKES
        ]);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        $faskes = Faskes::all(); // untuk menu dropdown
        return view('page.edit_pasien', compact('pasien', 'faskes'));
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);

        $request->validate([
            'no_rm' => 'required|unique:pasiens,no_rm,' . $pasien->id,
            'nama' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'nullable',
            'penyakit' => 'required',
            'faskes_id' => 'required|exists:faskes,id', // VALIDASI BARU
        ]);

        $pasien->update([
            'no_rm' => $request->no_rm,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'penyakit' => $request->penyakit,
            'faskes_id' => $request->faskes_id,
        ]);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus!');
    }
}
