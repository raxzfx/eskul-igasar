<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Eskul;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eskuls = Eskul::all();
        return view('user.index',compact('eskuls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showForm()
    {
        $eskuls = Eskul::all();
        return view('user.formDaftar',compact('eskuls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insertData(Request $request)
    {
        $request->validate([
            'nama_murid' => 'required|string|max:255',
            'nis' => 'required|integer',
            'hobi' => 'required|string',
            'alasan' => 'required|string',
            'tgl_daftar' => 'required|date',
            'eskul_id' => 'required|array', // Bisa lebih dari satu eskul
            'eskul_id.*' => 'exists:eskul,id_eskul',
        ]);

        $konflik = Pendaftaran::where('nis', $request->nis)->exists();
        if ($konflik) {
            return redirect()->back()->withErrors(['error' => 'NIS sudah terdaftar']);
        }

        // Simpan data pendaftaran
        $pendaftaran = Pendaftaran::create([
            'nama_murid' => $request->nama_murid,
            'nis' => $request->nis,
            'hobi' => $request->hobi,
            'alasan' => $request->alasan,
            'tgl_daftar' => $request->tgl_daftar,
        ]);

        // Simpan data ke tabel pivot menggunakan attach
        $pendaftaran->eskuls()->attach($request->eskul_id, ['status' => 'pending']);

        return redirect()->route('formPendaftaran')->with('success','data berhasil di tambah');
    }

    
    public function showList(Request $request){
        $eskuls = Eskul::all();
        return view('user.eskulList',compact('eskuls'));
  }

  public function showDetail($id)
{
    $eskul = Eskul::findOrFail($id);
    return view('user.eskulDetail', compact('eskul'));
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
