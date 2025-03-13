<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Eskul;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $pendaftaran = Pendaftaran::with('eskuls')
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_murid', 'like', "%$search%");
            })
            ->paginate(10);
    
        return view('admin.page.pendaftaranTable', compact('pendaftaran'));
    }
    

    public function create(){
        $eskuls = Eskul::all();
        return view('admin.form.pendaftaranAdd',compact('eskuls'));
    }

    public function store(Request $request)
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

        return redirect()->route('pendaftaranTable')->with('success','data berhasil di tambah');
    }

    public function updateStatus(Request $request, $id)
{
    $pendaftaran = Pendaftaran::findOrFail($id);
    $pendaftaran->status = $request->status; // 'approved' atau 'rejected'
    $pendaftaran->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui!');
}

}
