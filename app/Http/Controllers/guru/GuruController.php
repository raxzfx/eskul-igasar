<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class guruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil input search dari request
        $search = $request->input('search');
    
        // Query pencarian jika ada input search
        $guru = Guru::when($search, function ($query) use ($search) {
            return $query->where('nama_guru', 'like', "%$search%");
        })->paginate(10)->withQueryString(); // Tambahkan withQueryString agar parameter search tetap ada saat berpindah halaman
    
        return view('guru.guruTable', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pilihanrole = ['pembina','kesiswaan'];
        return view('guru.guruAdd',compact('pilihanrole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_guru' => 'required|string',
            'no_telp' => 'required|string|regex:/^[0-9]{10,13}$/',
            'password' => 'nullable|string|min:6',
            'username' => 'required|string',
            'role' => 'required'
        ]);

        $konflik = Guru::where('nama_guru', $request->nama_guru)
                   ->orWhere('no_telp', $request->no_telp)
                   ->first();
        if($konflik){
           if($konflik->nama_guru === $request->nama_guru){
               return redirect()->back()->withErrors(['errors'=>'nama guru sudah terdaftar, masukan yang lain!']);
           }if($konflik->no_telp === $request->no_telp){
               return redirect()->back()->withErrors(['errors'=>'nomor telepon sudah terdaftar, masukan yang lain!']);
           }
        }

        $password = $request->input('password') ? Hash::make($request->input('password')) : Hash::make('guruanjing');

        $guru = Guru::create([
            'nama_guru' => $request->nama_guru,
            'no_telp' => $request->no_telp,
            'password' => $password, 
            'username' => $request->username,
            'role' => $request->role
        ]);

        return redirect()->route('guru.homepage')->with('success','data guru berhasil di tambah');
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
        $guru = Guru::findOrFail($id);
        return view('guru.guruEdit',compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_guru' => 'required',
            'no_telp' => 'required',
            'password' => 'nullable|string|min:6',
            'username' => 'required',
            'role' => 'required'
        ]);


        $guru = Guru::findOrFail($id);
        $guru->update([
            'nama_guru' => $request->nama_guru,
            'no_telp' => $request->no_telp,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'role' => $request->role
        ]);

        return redirect()->route('guru.homepage')->with('success','data berhasil di updata');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.homepage')->with('success','data berhasil di hapus');
    }
}