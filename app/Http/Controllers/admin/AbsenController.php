<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Eskul;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $eskuls = Eskul::all();
        $absensiPerEskul = [];
    
        foreach ($eskuls as $eskul) {
            $query = Absensi::where('eskul_id', $eskul->id_eskul);
    
            // Filter berdasarkan tanggal, bulan, dan tahun dari created_at
            if ($request->filled('tanggal')) {
                $query->whereDate('created_at', $request->tanggal);
            }
    
            if ($request->filled('bulan')) {
                $query->whereMonth('created_at', $request->bulan);
            }
    
            if ($request->filled('tahun')) {
                $query->whereYear('created_at', $request->tahun);
            }
    
            // Paginate dengan nama parameter unik per eskul
            $absensiPerEskul[$eskul->id_eskul] = $query->paginate(10, ['*'], 'page_' . $eskul->id_eskul);
        }
    
        return view('admin.page.absensiTable', compact('eskuls', 'absensiPerEskul'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    $eskul_id = $request->query('eskul_id'); // Ambil eskul_id dari URL
    $eskul = Eskul::where('id_eskul', $eskul_id)->firstOrFail(); // Pastikan eskul ditemukan
    $statusAbsen = ['hadir', 'sakit', 'izin', 'alpha', 'tidak_hadir'];

    // Ambil hanya murid yang sudah disetujui dan sesuai dengan eskul yang dipilih
    $murid = Pendaftaran::whereHas('eskuls', function ($query) use ($eskul_id) {
        $query->where('status', 'approve')->where('eskul_id', $eskul_id);
    })->get();

    return view('admin.form.absenAdd', compact('murid', 'statusAbsen', 'eskul'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
        'eskul_id' => 'required',
        'pendaftaran_id' => 'required',
        'status' => 'required',
        ]);

          // Cek apakah siswa sudah absen di eskul yang sama pada tanggal yang sama
    $existingAbsensi = Absensi::where('eskul_id', $request->eskul_id)
    ->where('pendaftaran_id', $request->pendaftaran_id)
    ->whereDate('created_at', now()->toDateString()) // Cek berdasarkan tanggal
    ->exists();

if ($existingAbsensi) {
    return redirect()->back()->withErrors(['error' => 'Siswa sudah absen di eskul ini pada tanggal ini']);
}

        $absen = Absensi::create([
            'eskul_id' => $request->eskul_id,
            'pendaftaran_id' => $request->pendaftaran_id,
            'status' => $request->status
        ]);

        return redirect()->route('absensiTable')->with('success','data absensi berhasil di tambah');

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
