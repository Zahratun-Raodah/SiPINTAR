<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function index()
    {
        $data = Siswa::all();
        return view('siswa.siswa', compact('data'));
    }


    public function create()
    {
        return view('siswa.tambah');
    }


    public function store(Request $request)
    {
       $request->validate([
        'nama'=>'required',
        'nipd'=>'required|unique:siswa',
        'jenis_kelamin'=>'required',
        'nisn'=>'required|unique:siswa',
        'tempat_lahir'=>'required',
        'agama'=>'required',
        'alamat'=>'required',
        'dusun'=>'required',
        'kelurahan'=>'required',
        'kelas'=>'required',
        'nama_ortu'=>'required',
        'pekerjaan_ortu'=>'required',
        'status_ortu'=>'required',
        'nomer_wa'=>'required'
       ]);

       Siswa::create([
        'nama' => $request->nama,
        'nipd' => $request->nipd,
        'jenis_kelamin' => $request->jenis_kelamin,
        'nisn' => $request->nisn,
        'tempat_lahir' => $request->tempat_lahir,
        'agama' => $request->agama,
        'alamat' => $request->alamat,
        'dusun' => $request->dusun,
        'kelurahan' => $request->kelurahan,
        'kelas' => $request->kelas,
        'nama_ortu' => $request->nama_ortu,
        'pekerjaan_ortu' => $request->pekerjaan_ortu,
        'status_ortu' => $request->status_ortu,
        'nomer_wa' => $request->nomer_wa
       ]);

       return redirect()->route('siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Siswa::findOrFail($id);
        return view('siswa.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required',
            'nipd'=>'required',
            'jenis_kelamin'=>'required',
            'nisn'=>'required',
            'tempat_lahir'=>'required',
            'agama'=>'required',
            'alamat'=>'required',
            'dusun'=>'required',
            'kelurahan'=>'required',
            'kelas'=>'required',
            'nama_ortu'=>'required',
            'pekerjaan_ortu'=>'required',
            'status_ortu'=>'required',
            'nomer_wa'=>'required'
        ]);

        $data = Siswa::findOrFail($id);

        $update = [
            'nama' => $request->nama,
            'nipd' => $request->nipd,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'dusun' => $request->dusun,
            'kelurahan' => $request->kelurahan,
            'kelas' => $request->kelas,
            'nama_ortu' => $request->nama_ortu,
            'pekerjaan_ortu' => $request->pekerjaan_ortu,
            'status_ortu' => $request->status_ortu,
            'nomer_wa' => $request->nomer_wa
        ];

        $data->update($update);

        return redirect()->route('siswa')->with('success', 'Data siswa berhasil diperbaharui');
    }


    public function destroy($id)
    {
       $data = Siswa::findOrFail($id);
       $data->delete();

       return redirect()->route('siswa')->with('success', 'Data siswa berhasil dihapus');
    }

    public function sharching(Request $request)
{
    $keyword = $request->get('keyword', '');

    $data = Siswa::when($keyword, function ($query) use ($keyword) {
        $query->where('nama', 'like', "%$keyword%")
              ->orWhere('nisn', 'like', "%$keyword%")
              ->orWhere('kelas', 'like', "%$keyword%");
    })->get();

    return view('siswa.siswa', compact('data', 'keyword'));
}

public function filter(Request $request)
{
    $query = Siswa::query();

    if ($request->filled('nama')) {
        $query->where('nama', 'like', '%' . $request->nama . '%');
    }

    if ($request->filled('kelas')) {
        $query->where('kelas', $request->kelas);
    }

    $data = $query->paginate(10);

    return view('siswa.filter', compact('data'));
}

public function show($id)
{
    $data = Siswa::findOrFail($id);
    return view('siswa.detail', compact('data'));
}
}
