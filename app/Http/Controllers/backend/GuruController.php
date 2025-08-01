<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class GuruController extends Controller
{

    public function index()
    {
        $data = Guru::all();
       return view('guru.guru', compact('data'));
    }

    public function create()
    {
        return view('guru.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npsn'=>'nullable',
            'unit_kerja'=>'nullable',
            'grl_dpn'=>'nullable',
            'nama'=>'required',
            'grl_belakang'=>'nullable',
            'nip'=>'required|unique:guru',
            'pangkat'=>'nullable',
            'gol'=>'nullable',
            'jenis_kelamin'=>'required',
            'no_hp'=>'nullable',
            'mapel'=>'nullable',
            'email'=>'required|unique:guru',
            'alamat'=>'nullable',
            'agama'=>'required',
            'status' =>'required',
            'password'=>'required|min:6'
        ]);

        Guru::create([
            'npsn' => $request->npsn,
            'unit_kerja' => $request->unit_kerja,
            'grl_dpn' => $request->grl_dpn,
            'nama' => $request->nama,
            'grl_belakang' => $request->grl_belakang,
            'nip' => $request->nip,
            'pangkat' => $request->pangkat,
            'gol' => $request->gol,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'mapel' => $request->mapel,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'status' => $request->status,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('guru')->with('success', 'Data Guru berhasil ditambahkan');

    }

    public function edit($id)
    {
        $data =  Guru::findOrFail($id);
        return view('guru.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'npsn'=>'nullable',
            'unit_kerja'=>'nullable',
            'grl_dpn'=>'nullable',
            'nama'=>'required',
            'grl_belakang'=>'nullable',
            'nip'=>'required',
            'pangkat'=>'nullable',
            'gol'=>'nullable',
            'jenis_kelamin'=>'required',
            'no_hp'=>'nullable',
            'mapel'=>'nullable',
            'email'=>'required',
            'alamat'=>'nullable',
            'agama'=>'required',
            'status' =>'required',
            'password'=>'nullable|min:6'
        ]);

        $data = Guru::findOrFail($id);

        $updateData = [
            'npsn' => $request->npsn,
            'unit_kerja' => $request->unit_kerja,
            'grl_dpn' => $request->grl_dpn,
            'nama' => $request->nama,
            'grl_belakang' => $request->grl_belakang,
            'nip' => $request->nip,
            'pangkat' => $request->pangkat,
            'gol' => $request->gol,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'mapel' => $request->mapel,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'status' => $request->status
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $data->update($updateData);

        return redirect()->route('guru')->with('success', 'Data Guru berhasil diperbarui');

    }

    public function destroy($id)
    {
        $data = Guru::findOrFail($id);
        $data->delete();

        return redirect()->route('guru')->with('success', 'Data Guru berhasil dihapus');

    }

    public function show($id)
{
    $data = Guru::findOrFail($id);
    return view('guru.detail', compact('data'));
}
}
