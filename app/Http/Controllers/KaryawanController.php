<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $data_karyawan = Karyawan::all();
        return view('page.dashboard_datakaryawan', compact('data_karyawan'));
    }

    public function create()
    {
        return view('page.tambah_karyawan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:karyawan,nip',
            'nama' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required',
        ], [
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'nama.required' => 'Nama wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'jk.required' => 'Jenis kelamin wajib diisi.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'departemen.required' => 'Departemen wajib diisi.',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('page.edit_karyawan', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nip' => 'required|unique:karyawan,nip,' . $karyawan->id,
            'nama' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required',
        ]);

        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus!');
    }
}
