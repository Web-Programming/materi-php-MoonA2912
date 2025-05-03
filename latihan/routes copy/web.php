<?php

use App\Http\Controllers\prodiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('beranda', [
        'name' => 'Monalisa',
        'email'=>'monalisaeff@gmail.com',
        'alamat'=> 'Kenten'
    ]);
});

Route::get('/berita/{id}/{judul?}', function($id,$judul=null){
    return view('berita', ['id' => $id,
'judul' => $judul]);
});

//membuat rute ke halaman prodi index melalui controller prodicontroller
Route::get('/prodi/index',[prodiController::class,'index']);