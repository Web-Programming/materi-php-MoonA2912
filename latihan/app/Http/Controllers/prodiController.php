<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $listprodi = Prodi::get();
        return view("prodi.index", 
        ['listprodi' => $listprodi]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("prodi.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData= $request->validate(
            ['nama' => 'required|min:5|max:20',
            'kode_prodi'=>'|min:2|max:2']
        );

        $prodi=new Prodi();
        $prodi->nama=$validateData['nama']; //$request-> nama(bisa tapi belom aman)
        $prodi->kodeprodi=$validateData['kode_prodi'];
        $prodi->save();

        return redirect('prodi')->with("status","Data Program Studi berhasil disimpan");
        }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //select prodi by id
        $prodi=Prodi::find($id);

        //buat view detail di view/prodi
        return view("prodi.detail",['detailprodi'=> $prodi]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $prodi=Prodi::find($id);
          return view("prodi.edit",['editprodi'=> $prodi]);
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