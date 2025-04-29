<?php

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