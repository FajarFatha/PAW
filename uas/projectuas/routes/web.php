<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiadminController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ZakatController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', function () {
    return view('home',[
        "title" => "Home"
    ]);
});
Route::get('/afterregister', function () {
    return view('afterregister',[
        "title" => "afterregister"
    ]);
});
// Route::get('/datauser', function () {
//     return view('datauser',[
//         "title" => "datauser"
//     ]);
// });

Route::group(['middleware'=>['auth','ceklevel:admin,panitia']],function(){
    route::get('/transaksi',[TransaksiController::class,'index'])->name('datatransaksi');
});

Route::group(['middleware'=>['auth','ceklevel:admin']],function(){
    route::get('/datauser',[UserController::class,'datauser'])->name('datauser');
    route::get('/transaksiadmin',[TransaksiadminController::class,'index'])->name('datatransaksiadmin');
    route::get('/inventory',[InventoryController::class,'index'])->name('datainventory');
});

Route::group(['middleware'=>['auth','ceklevel:public']],function(){
    Route::get('/zakatonline', function () {
        return view('zakatonline',[
            "title" => "zakat online"
        ]);
    });

    Route::get('/afterzakat', function () {
        return view('afterzakat',[
            "title" => "zakat online"
        ]);
    });
});


// Route::get('/login', function () {
//     return view('login',[
//         "title" => "login"
//     ]);
// });

// Route::get('/register', function () {
//     return view('register',[
//         "title" => "register"
//     ]);
// });

route::get('/register',[LoginController::class,'halamanregister'])->name('register');
route::post('/simpanregister',[LoginController::class,'simpanregister'])->name('simpanregister');
route::get('/login',[LoginController::class,'halamanLogin'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/simpandatauser', [UserController::class,'store'])->name('simpandatauser');
Route::post('/updateuser', [UserController::class,'update'])->name('updateauser');
Route::post('/hapususer', [UserController::class,'hapususer'])->name('hapususer');

Route::post('/simpandatatransaksi', [TransaksiController::class,'store'])->name('simpandatatransaksi');
Route::post('/editdatatransaksi', [TransaksiController::class,'update'])->name('editdatatransaksi');
Route::post('/hapusdatatransaksi', [TransaksiController::class,'destroy'])->name('hapusdatatransaksi');

Route::post('/simpandatatransaksiadmin', [TransaksiadminController::class,'store'])->name('simpandatatransaksiadmin');
Route::post('/editdatatransaksiadmin', [TransaksiadminController::class,'update'])->name('editdatatransaksiadmin');
Route::post('/hapusdatatransaksiadmin', [TransaksiadminController::class,'destroy'])->name('hapusdatatransaksiadmin');

Route::post('/simpandatabarang', [InventoryController::class,'store'])->name('simpandatabarang');
Route::post('/editdatabarang', [InventoryController::class,'update'])->name('editdatabarang');
Route::post('/hapusdatabarang', [InventoryController::class,'destroy'])->name('hapusdatabarang');

Route::post('/zakatonline', [ZakatController::class,'store'])->name('zakatonline');