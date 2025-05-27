<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CekLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);

// Route::get('/home', function(){
//     return view('beranda', 
//     [
//             'name' => 'Nur Rachmat',
//             'email' => 'nurrachmat@gmail.com',
//             'alamat' => 'Palembang'
//         ]
//     );
// });

// Route::get('/berita/{id}/{judul?}', function($id, $judul = null){
//     return view('berita', ['id' => $id, 'judul' => $judul]);
// });

//membuat route ke halam prodi index melalui controller ProdiController
//Route::get('/prodi/index', [ProdiController::class,'index']);

//Route::resource('prodi', ProdiController::class);

//Authentication
Route::get("/login", [AuthController::class, 'login'])->name('login');
Route::post("/login", [AuthController::class, 'do_login']);
Route::get("/register", [AuthController::class, 'register']);
Route::post("/register", [AuthController::class, 'do_register']);
Route::get("/logout", [AuthController::class, 'logout']);

// Route Grouping with Middleware
Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => [CekLogin::class.':admin']], function(){
        Route::get("/admin", [AdminController::class, 'index']);

    Route::get("/admin", [AdminController::class, 'index'])
        ->middleware(CekLogin::class.':admin');
    Route::get("/user", [UserController::class, 'index'])
        ->middleware(CekLogin::class.':user');

    Route::prefix('admin')->group(function(){
Route::resource('prodi', ProdiController::class);
Route::resource('fakultas', FakultasController::class);
    });
    })->middleware(CekLogin::class.':admin');

    Route::prefix('user')->group(function(){
        Route::resource('prodi', ProdiController::class);
    })->middleware(CekLogin::class.':user');

    Route::group(['middleware' => [CekLogin::class.':user']], function(){
        Route::get("/user", [UserController::class, 'index']);
    });
});