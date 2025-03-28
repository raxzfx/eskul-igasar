<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class jurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil input search dari request
        $search = $request->input('search');
    
        // Query pencarian jika ada input search
        $jurusan = Jurusan::when($search, function ($query) use ($search) {
            return $query->where('nama_jurusan', 'like', "%$search%");
        })->paginate(10)->withQueryString(); // Tambahkan withQueryString agar parameter search tetap ada saat berpindah halaman
    
        return view('admin.page.jurusanTable', compact('jurusan'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form.jurusanAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jurusan = $request->validate([
        'nama_jurusan' => 'required',
        ]);

        $konflik = Jurusan::where('nama_jurusan', $request->nama_jurusan)->exists();
        if($konflik){
          return redirect()->back()->withErrors(['error' => 'jurusan sudah terdaftar, masukan jurusan yang lain!']);
        }
        
        Jurusan::create($jurusan);
        return redirect()->route('admin.jurusan.index')->with('success','data berhasil di tambah');

    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.form.jurusanEdit',compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'nama_jurusan' => 'required' 
        ]);

        $konflik = Jurusan::where('nama_jurusan', $request->nama_jurusan)->exists();
        if($konflik){
          return redirect()->back()->withErrors(['error' => 'jurusan sudah terdaftar, masukan jurusan yang lain!']);
        }

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());
        return redirect()->route('admin.jurusan.index')->with('success','data berhasil ter update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')->with('success','data berhasil di hapus');
    }
}
