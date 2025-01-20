<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datahobi = Hobi::all();
        return view('Hobi.app', compact('datahobi'));
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
        ],[
            'name.required' => 'Nama hobi tidak boleh kosong',
            'name.min' => 'Nama hobi minimal 3 karakter',
            'name.max' => 'Nama hobi maksimal 20 karakter',
        ]);

        $data = [
            'name' => $request->input('name'),
        ];

        Hobi::create($data);

        return redirect()->route('hobi.index')->with('success','Data berhasil ditambahkan');
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
        $datahobi = Hobi::findOrFail($id);
        return view('Hobi.edit', compact('datahobi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
        ],[
            'name.required' => 'Nama hobi tidak boleh kosong',
            'name.min' => 'Nama hobi minimal 3 karakter',
            'name.max' => 'Nama hobi maksimal 20 karakter',
        ]);

        $data = [
            'name' => $request->input('name'),
        ];

        Hobi::where('id',$id)->update($data);

        return redirect()->route('hobi.index')->with('success','data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Hobi::where('id',$id)->delete();

        return redirect()->route('hobi.index')->with('success','Data berhasil di hapus');
    }
}
