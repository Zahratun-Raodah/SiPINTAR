<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $data = Admin::all();
        return view('admin.admin', compact('data'));
    }

    public function create()
    {
        return view('admin.tambah');
    }

    public function store(Request $request)
    {
       $request->validate([
        'nama'=>'required',
        'email'=>'required|unique:admin',
        'password'=>'required|min:6'
       ]);

       Admin::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password)
       ]);

    return redirect()->route('admin')->with('success', 'Data Admin berhasil ditambahkan');

    }


    public function edit($id)
    {
        $data = Admin::findOrFail($id);
        return view('admin.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required',
            'email'=>'required',
        ]);

        $data = Admin::findOrFail($id);

        $update = [
            'nama' => $request->nama,
            'email' => $request->email
        ];

        if ($request->filled('password')) {
            $update['password'] = Hash::make($request->password);
        }

        $data->update($update);

        return redirect()->route('admin')->with('success', 'Data Admin berhasil diperbarui');

    }

    public function destroy($id)
    {
       $data = Admin::findOrFail($id);
       $data->delete();

       return redirect()->route('admin')->with('success', 'Data admin berhasil dihapus');

    }
}
