<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Faskes;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $data = Pemeriksaan::with(['pasien', 'dokter', 'faskes'])->get();
        return view('proces.pemeriksaan', compact('data'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        $faskes = Faskes::all();
        return view('proces.tambah_pemeriksaan', compact('pasiens', 'dokters', 'faskes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pemeriksaan' => 'required',
            'no_rm' => 'required|exists:pasiens,no_rm',
            'nip' => 'required|exists:dokter,nip',
            'id_faskes' => 'required|exists:faskes,id_faskes',
            'tanggal' => 'required|date',
        ]);

        Pemeriksaan::create($request->all());

        return redirect()->route('pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Pemeriksaan::findOrFail($id);
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        $faskes = Faskes::all();

        return view('proces.edit_pemeriksaan', compact('data', 'pasiens', 'dokters', 'faskes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pemeriksaan' => 'required',
            'no_rm' => 'required|exists:pasiens,no_rm',
            'nip' => 'required|exists:dokter,nip',
            'id_faskes' => 'required|exists:faskes,id_faskes',
            'tanggal' => 'required|date',
        ]);

        $data = Pemeriksaan::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = Pemeriksaan::findOrFail($id);
        $data->delete();

        return redirect()->route('pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil dihapus!');
    }
}
