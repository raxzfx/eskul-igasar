<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

       $siswa = Siswa::with('jurusan')->when($search, function ($query) use ($search) {
    return $query->where('nama_siswa', 'like', "%$search%");
})->paginate(10);


        return view('admin.page.siswaTable',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('admin.form.siswaAdd',compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string',
            'no_telp' => 'required|string|regex:/^[0-9]{10,13}$/',
            'nama_jurusan' => 'required',
            'tingkat_kelas' => 'required',
            'password' => 'nullable|string|min:6',
            'username' => 'required|string'
        ]);

        $siswa = Siswa::where('no_telp', $request->no_telp)
        ->orWhere('nama_siswa', $request->nama_siswa)
        ->first();

if ($siswa) {
if ($siswa->no_telp === $request->no_telp) {
  return redirect()->back()->withErrors(['error' => 'Nomor telepon sudah terdaftar']);
}
if ($siswa->nama_siswa === $request->nama_siswa) {
  return redirect()->back()->withErrors(['error' => 'Nama siswa sudah terdaftar']);
}
}

        

        $password = $request->input('password') ? Hash::make($request->input('password')) : Hash::make('12345678');

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'no_telp' => $request->no_telp,
            'nama_jurusan' => $request->nama_jurusan,
            'tingkat_kelas' => $request->tingkat_kelas,
            'password' => $password,
            'username' => $request->username
        ]);

        return redirect()->route('admin.siswa.index')->with('success','data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $siswa = Siswa::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('admin.form.siswaEdit',compact('siswa','jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
         'nama_siswa' => 'required',
         'nama_jurusan' => 'required',
         'no_telp' => 'required',
         'tingkat_kelas' => 'required',
         'password' => 'nullable|string|min:6',
         'username' => 'required'
        ]);

        

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
           'nama_siswa' => $request->nama_siswa,
           'nama_jurusan' => $request->nama_jurusan,
           'no_telp' => $request->no_telp,
           'tingkat_kelas' => $request->tingkat_kelas,
           'password' => bcrypt($request->password),
           'username' => $request->username
        ]);

        return redirect()->route('admin.siswa.index')->with('success','data berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete($id);

        return redirect()->route('admin.siswa.index')->with('success','data berhasil di hapus');
    }
}
