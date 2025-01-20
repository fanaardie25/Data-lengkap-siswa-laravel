<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use App\Models\Nisn;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datasiswa = Siswa::with('hobi')->get();
        $datahobi = Hobi::all();
        return view('Nama.app', compact('datasiswa','datahobi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|min:3|max:20',
            'nisn' => 'required|unique:nisns,nisn|numeric|max_digits:20',
            'hobis' => 'required|array|min:1', 
        ], [
            'name.required' => 'Nama siswa tidak boleh kosong',
            'name.min' => 'Nama siswa minimal 3 karakter',
            'name.max' => 'Nama siswa maksimal 20 karakter',
            'nisn.required' => 'NISN tidak boleh kosong',
            'nisn.unique' => 'NISN sudah ada',
            'nisn.numeric' => 'NISN harus angka',
            'hobis.required' => 'Hobi tidak boleh kosong',
            'hobis.array' => 'Hobi harus dalam format array',
            'hobis.min' => 'Pilih minimal satu hobi',
        ]);
       
        $siswa = Siswa::create([
            'name' => $request->input('name'),
        ]);
 
        Nisn::create([
            'nisn' => $request->input('nisn'),
            'siswa_id' => $siswa->id,
        ]);


    

        $siswa->hobi()->sync($request->hobis);
    
    

        return redirect()->route('siswa.index')->with('success', 'Data berhasil ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datasiswa = Siswa::with('telepon')->findOrFail($id);
        return view('Telepon.app', compact('datasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datasiswa = Siswa::findOrFail($id);
        $datahobi = Hobi::all();
        return view('Nama.edit', compact('datasiswa','datahobi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'nisn' => 'required|max_digits:20|numeric', 
            'hobis' => 'required|array|min:1', 
        ],[
            'name.required' => 'Nama hobi tidak boleh kosong',
            'name.min' => 'Nama hobi minimal 3 karakter',
            'name.max' => 'Nama hobi maksimal 20 karakter',
            'nisn.required' => 'Nisn tidak boleh kosong',
            'nisn.max' => 'Nisn maksimal 20 karakter',
            'nisn.numeric' => 'Nisn harus berupa angka',
            // 'nisn.unique' => 'Nisn sudah ada',
            'hobis.required' => 'Hobi tidak boleh kosong',
            'hobis.array' => 'Hobi harus dalam format array',
            'hobis.min' => 'Pilih minimal satu hobi',
        ]);

        $data = Siswa::findOrFail($id);


        $data->update([
            'name' => $request->input('name'),
        ]);

        $data->nisn()->update([
            'nisn' => $request->input('nisn'),
        ]);

        $data->hobi()->sync($request->input('hobis'));

        return redirect()->route('siswa.index')->with('success','data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::where('id',$id)->delete();

        return redirect()->route('siswa.index')->with('success','Data berhasil di hapus');
    }
}
