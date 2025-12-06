<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faskes;

class FaskesController extends Controller
{
    public function index()
    {
        $data_faskes = Faskes::all();
        return view('page.dashboard_faskes', compact('data_faskes'));
    }

    public function create()
    {
        return view('page.tambah_faskes');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_faskes' => 'required|unique:faskes,id_faskes',
            'name_f' => 'required',
        ], [
            'id_faskes.required' => 'ID Faskes wajib diisi.',
            'id_faskes.unique' => 'ID Faskes sudah digunakan.',
            'name_f.required' => 'Nama Faskes wajib diisi.',
        ]);

        Faskes::create($request->all());

        return redirect()->route('faskes.index')->with('success', 'Data faskes berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $faskes = Faskes::findOrFail($id);
        return view('page.edit_faskes', compact('faskes'));
    }

    public function update(Request $request, $id)
    {
        $faskes = Faskes::findOrFail($id);

        $request->validate([
            'id_faskes' => 'required|unique:faskes,id_faskes,' . $faskes->id,
            'name_f' => 'required',
        ], [
            'id_faskes.required' => 'ID Faskes wajib diisi.',
            'id_faskes.unique' => 'ID Faskes sudah digunakan.',
            'name_f.required' => 'Nama Faskes wajib diisi.',
        ]);

        $faskes->update($request->all());

        return redirect()->route('faskes.index')->with('success', 'Data faskes berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $faskes = Faskes::findOrFail($id);
        $faskes->delete();

        return redirect()->route('faskes.index')->with('success', 'Data faskes berhasil dihapus!');
    }
}
