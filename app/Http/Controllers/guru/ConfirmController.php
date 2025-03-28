<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Eskul;

class ConfirmController extends Controller
{
  

    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $eskuls = Eskul::with(['pendaftarans' => function($query) use ($search) {
            $query->when($search, function ($q) use ($search) {
                return $q->where('nama_murid', 'like', "%$search%");
            });
        }])->get();
    
        return view('guru.confirmPendaftaran', compact('eskuls', 'search'));
    }

    public function updateStatus(Request $request, $id, $eskulId)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->eskuls()->updateExistingPivot($eskulId, ['status' => $request->status]);
    
        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }
}
