<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mapel;

class MapelController extends Controller
{
    public function index()
    {
        $data = Mapel::with('guru')->get();
        return view('mapel.mapel', compact('data'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('mapel.tambah', compact('guru'));
    }

    public function store(Request $request)
    {
       $request->validate([
        'id_guru'=>'required',
        'nama_mapel'=>'required'
       ]);

       Mapel::create([
        'id_guru' => $request->id_guru,
        'nama_mapel' => $request->nama_mapel
       ]);

    return redirect()->route('mapel')->with('success', 'Data mapel berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        $guru = Guru::all();
        return view('mapel.edit', compact('mapel', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_guru'=>'required',
            'nama_mapel'=>'required'
        ]);

        $mapel = Mapel::findOrFail($id);

        $update = [
            'id_guru' => $request->id_guru,
            'nama_mapel' => $request->nama_mapel
        ];

        $mapel->update($update);

        return redirect()->route('mapel')->with('success', 'Data mapel berhasil diperbarui');
    }

    public function destroy($id)
    {
       $data = Mapel::findOrFail($id);
       $data->delete();

       return redirect()->route('mapel')->with('success', 'Data mapel berhasil dihapus');
    }
}