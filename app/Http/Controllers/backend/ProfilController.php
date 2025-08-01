<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function index()
    {
        $data = Profil::all();
       return view('profil.profil', compact('data'));
    }

    public function create()
    {
        if (Profil::count() > 0) {
            return redirect()->route('profil')->with('error', 'Data sudah ada! Tidak bisa menambahkan data lagi.');
        }

        return view('profil.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga'=>'required',
            'nama_instansi'=>'required',
            'nama_sekolah'=>'required',
            'alamat'=>'required',
            'tgl_berdiri'=>'required',
            'no_sk'=>'required',
            'akreditasi'=>'required',
            'nama_pimpinan'=>'required',
            'noHp_instansi'=>'required',
            'email'=>'required',
            'logo'=>'required|image|mimes:jpg,jpeg,png',
            'visi' =>'required',
            'misi' =>'required'
        ]);

        // Proses upload logo
        $logo = $request->file('logo');
        $logoName = $logo->getClientOriginalName();
        $tujuan = public_path('asset/images/gallery/');

        // Cek jika file dengan nama sama sudah ada, beri nama unik
        if (file_exists($tujuan . $logoName)) {
            $namaTanpaExt = pathinfo($logoName, PATHINFO_FILENAME);
            $ext = $logo->getClientOriginalExtension();
            $logoName = $namaTanpaExt . '_' . uniqid() . '.' . $ext;
        }

        $logo->move($tujuan, $logoName);
        $logoPath = 'asset/images/gallery/' . $logoName;

        Profil::create([
            'nama_lembaga' => $request->nama_lembaga,
            'nama_instansi' => $request->nama_instansi,
            'nama_sekolah' => $request->nama_sekolah,
            'tgl_berdiri' => $request->tgl_berdiri,
            'no_sk' => $request->no_sk,
            'akreditasi' => $request->akreditasi,
            'nama_pimpinan' => $request->nama_pimpinan,
            'noHp_instansi' => $request->noHp_instansi,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'logo' => $logoPath,
            'visi' => $request->visi,
            'misi' => $request->misi
        ]);

        return redirect()->route('profil')->with('success', 'Data profil berhasil ditambahkan');

    }

    public function edit()
    {
        $data = Profil::all();
        return view('profil.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required',
            'nama_instansi' => 'required',
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'tgl_berdiri' => 'required',
            'no_sk' => 'required',
            'akreditasi' => 'required',
            'nama_pimpinan' => 'required',
            'noHp_instansi' => 'required',
            'email' => 'required|email',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png',
            'visi' => 'required',
            'misi' => 'required'
        ]);

        $data = Profil::first();

        if ($request->hasFile('logo')) {
            if ($data->logo && file_exists(public_path($data->logo))) {
                unlink(public_path($data->logo));
            }

            $logo = $request->logo->getClientOriginalName();
            $tujuan = public_path('asset/images/gallery/');

            if (file_exists($tujuan . $logo)) {
                $namaTanpaExt = pathinfo($logo, PATHINFO_FILENAME);
                $ext = $request->logo->getClientOriginalExtension();
                $logo = $namaTanpaExt . '_' . uniqid() . '.' . $ext;
            }

            $request->logo->move($tujuan, $logo);
            $logoPath = 'asset/images/gallery/' . $logo;

        } else {
            $logoPath = $data->logo;
        }

        $data->update([
            'nama_lembaga' => $request->nama_lembaga,
            'nama_instansi' => $request->nama_instansi,
            'nama_sekolah' => $request->nama_sekolah,
            'alamat' => $request->alamat,
            'tgl_berdiri' => $request->tgl_berdiri,
            'no_sk' => $request->no_sk,
            'akreditasi' => $request->akreditasi,
            'nama_pimpinan' => $request->nama_pimpinan,
            'noHp_instansi' => $request->noHp_instansi,
            'email' => $request->email,
            'logo' => $logoPath,
            'visi' => $request->visi,
            'misi' => $request->misi
        ]);

        return redirect()->route('profil')->with('success', 'Data profil berhasil diperbaharui');
    }

    public function show()
    {
    $data = Profil::all();
    return view('profil.detail', compact('data'));
    }
}