<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Eskul;
use App\Models\Guru;
use Illuminate\Http\Request;

class eskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $eskul = Eskul::with('guru')->when($search, function ($query) use ($search) {
     return $query->where('nama_eskul', 'like', "%$search%");
 })->paginate(10);
 
 
         return view('admin.page.eskulTable',compact('eskul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = Guru::all();
        return view('admin.form.eskulAdd',compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_eskul' => 'required|string',
            'deskripsi' => 'required|string',
            'hari' => 'required',
            'pembina' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'tempat' => 'required|array|min:1',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validate['tempat'] = implode(',', $request->tempat);


          // Simpan gambar ke public/uploads jika ada
    $gambarPath = null;
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        $gambarPath = 'uploads/' . $filename;
    }

    $validate['gambar'] = $gambarPath;

    $jamMulai = $request->jam_mulai;
    $jamSelesai = $request->jam_selesai;
    $hari = $request->hari;

    //pemeriksaan 
    $konflik = Eskul::where('hari', $hari)
    ->where(function ($query) use ($jamMulai, $jamSelesai) {
        $query->whereBetween('jam_mulai', [$jamMulai, $jamSelesai])
            ->orWhereBetween('jam_selesai', [$jamMulai, $jamSelesai])
            ->orWhere(function ($query) use ($jamMulai, $jamSelesai) {
                $query->where('jam_mulai', '<=', $jamMulai)
                    ->where('jam_selesai', '>=', $jamSelesai);
            });
    })->exists();

    //jika konflik di temukan
    if($konflik){
        return redirect()->back()->withErrors(['error', 'jadwal bentrok di hari yang sama dan jam yang sama']);
    }

    //pemeriksaan nama eskul yang sama
    $eskulName = Eskul::where('nama_eskul',$request->nama_eskul)->exists();

    //jika ada konflik nama eskul
    if($eskulName){
       return redirect()->back()->withErrors(['error' => 'nama eskul sudah tersedia, anda bisa menginput nama eskul yang berbeda,
        dan anda tidak bisa menambahkan data dengan nama eskul yang sama']);
    }

    // Simpan ke database
    Eskul::create($validate);

    return redirect()->route('eskulTable')->with('success', 'Data kegiatan eskul berhasil ditambahkan');
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
        $eskul = Eskul::findOrFail($id);
        $guru = Guru::all();
        return view('admin.form.eskulEdit',compact('eskul','guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           // Validasi input
    $request->validate([
        'nama_eskul' => 'required',
        'pembina' => 'required',
        'hari' => 'required',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Cari data eskul yang akan diupdate berdasarkan id
    $eskul = Eskul::findOrFail($id);

     // Cek apakah ada gambar baru yang diunggah
     if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($eskul->gambar && file_exists(public_path($eskul->gambar))) {
            unlink(public_path($eskul->gambar));
        }

        // Simpan gambar baru ke folder uploads
        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);

        // Simpan path baru ke database
        $eskul->gambar = 'uploads/' . $filename;
    }

    // Update data eskul
    $eskul->nama_eskul = $request->nama_eskul;
    $eskul->pembina = $request->pembina;
    $eskul->hari = $request->hari;
    $eskul->jam_mulai = $request->jam_mulai;
    $eskul->jam_selesai = $request->jam_selesai;

    // Handle perubahan tempat
    if($request->has('tempat')) {
        // Gabungkan tempat yang dipilih menjadi string yang dipisahkan koma
        $eskul->tempat = implode(',', $request->tempat);
    } else {
        // Jika tidak ada tempat yang dipilih, set tempat menjadi kosong
        $eskul->tempat = '';
    }

    // Simpan perubahan
    $eskul->save();

    // Redirect dengan pesan sukses
    return redirect()->route('eskulTable')->with('success', 'Data Eskul berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eskul = Eskul::findOrFail($id);
        $eskul->delete();
        return redirect()->route('eskulTable')->with('success','data berhasil terhapus');
    }
}
