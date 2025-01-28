<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use App\Models\Nisn;
use App\Models\Siswa;
use App\Models\Telepon;
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
        $datahobi = Hobi::all();
        return view('Nama.add',compact('datahobi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|min:3|max:100',
            'nisn' => 'required|unique:nisns,nisn|numeric|max_digits:20',
            'hobis' => 'required|array|min:1', 
            'nomor' => 'required|array|min:1',
            'nomor.*' => 'required|numeric|digits_between:10,15',
        ], [
            'name.required' => 'Nama siswa tidak boleh kosong',
            'name.min' => 'Nama siswa minimal 3 karakter',
            'name.max' => 'Nama siswa maksimal 100 karakter',
            'nisn.required' => 'NISN tidak boleh kosong',
            'nisn.unique' => 'NISN sudah ada',
            'nisn.numeric' => 'NISN harus angka',
            'hobis.required' => 'Hobi tidak boleh kosong',
            'hobis.array' => 'Hobi harus dalam format array',
            'hobis.min' => 'Pilih minimal satu hobi',
            'nomor.required' => 'Nomor telepon tidak boleh kosong',
            'nomor.array' => 'Nomor telepon harus berupa array',
            'nomor.*.numeric' => 'Setiap nomor telepon harus berupa angka',
            'nomor.*.digits_between' => 'Setiap nomor telepon harus antara 10-15 digit',
        ]);
       
        $siswa = Siswa::create([
            'name' => $request->input('name'),
        ]);
 
        Nisn::create([
            'nisn' => $request->input('nisn'),
            'siswa_id' => $siswa->id,
        ]);

        foreach ($request->input('nomor') as $nomor) {
            Telepon::create([
                'telepon' => $nomor,
                'siswa_id' => $siswa->id,
            ]);
        }


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
        $datasiswa = Siswa::with('telepon')->findOrFail($id);
        $datahobi = Hobi::all();
        return view('Nama.edit', compact('datasiswa','datahobi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'nisn' => 'required|max_digits:20|numeric', 
            'hobis' => 'required|array|min:1',
            'nomor' => 'required|array|min:1',
            'nomor.*' => 'required|numeric|digits_between:10,15',
        ],[
            'name.required' => 'Nama hobi tidak boleh kosong',
            'name.min' => 'Nama hobi minimal 3 karakter',
            'name.max' => 'Nama hobi maksimal 100 karakter',
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

        foreach ($request->input('nomor') as $nomor) {
        $data->telepon()->update([
            'telepon' => $nomor,
        ]);
    }

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
