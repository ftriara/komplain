<?php

use App\Http\Controller\administrator\BarangController as AdministratorBarangController;
use App\Models\Merk;
use App\Models\Barang;
use App\Http\Controllers\admin\DataPengajuanGaransiController;
use App\Http\Controllers\admin\DataRiwayatTindakanController;
use App\Http\Controllers\admin\PetugasController;
use App\Http\Controllers\administrator\MerkController;
use App\Http\Controllers\administrator\BarangController;
use App\Http\Controllers\pembeli\ComplainController;
use App\Http\Controllers\pembeli\StatusAjuanController;
use App\Http\Controllers\pembeli\AjukanComplainController;
use App\Http\Controllers\manager\ComplainByPetugasController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\manager\ComplainByBarangController;
use App\Http\Controllers\manager\ComplainByMerkController;
use App\Http\Controllers\manager\ComplainByMonthController;
use App\Http\Middleware\PembeliMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Home'
    ]);
});

Route::middleware(['auth', 'pembeli'])->group(function () {
    Route::get('/pembeli', function () {
        return view('pages.pembeli.index');
    })->name('pembeli.index');
    
    Route::get('/pembeli/status_ajuan', [StatusAjuanController::class, 'index'])->name('pembeli.status_ajuan.index');
    Route::get('/pembeli/ajukan_komplain', [AjukanComplainController::class, 'index'])->name('pembeli.ajukan_komplain.index');

    Route::post('/pembeli/ajukan_komplain', [AjukanComplainController::class, 'store'])->name('pembeli.ajukan_komplain.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function() {
        return view('pages.admin.index');
    })->name('admin.index');
    
    Route::get('/admin/dataPengajuanGaransi', [DataPengajuanGaransiController::class, 'index'])->name('admin.dataPengajuanGaransi.index');
    Route::post('/admin/update-complain-status', [DataPengajuanGaransiController::class, 'updateStatus'])->name('admin.complain.updateStatus');
    Route::get('/admin/dataPengajuanGaransi/{id}/dataTindakan', [DataPengajuanGaransiController::class, 'tindakan'])->name('admin.dataPengajuanGaransi.tindakan');
    
    Route::get('/admin/dataRiwayatTindakan', [DataRiwayatTindakanController::class, 'index'])->name('admin.dataRiwayatTindakan.index');
    Route::post('/admin/dataRiwayatTindakan', [DataRiwayatTindakanController::class, 'store'])->name('admin.dataRiwayatTindakan.store');
    Route::get('/admin/dataRiwayatTindakan/{id}/edit', [DataRiwayatTindakanController::class, 'edit']) -> name('admin.dataRiwayatTindakan.edit');
    Route::put('/admin/dataRiwayatTindakan/{id}', [DataRiwayatTindakanController::class, 'update']) -> name('admin.dataRiwayatTindakan.update');

    Route::put('');
    
    Route::get('/petugas', [PetugasController::class, 'index'])->name('admin.petugas.petugas');
    Route::get('/addPetugas', [PetugasController::class, 'addPetugas'])->name('admin.petugas.addPetugas');
    Route::post('/petugas', [PetugasController::class, 'store'])->name('admin.petugas.store');
    Route::get('/editPetugas{id}', [PetugasController::class, 'editPetugas'])->name('admin.petugas.edit');
    Route::post('/updatePetugas{id}', [PetugasController::class, 'updatePetugas'])->name('admin.petugas.update');
    Route::get('/deletePetugas{id}', [PetugasController::class, 'deletePetugas'])->name('admin.petugas.destroy');
});

Route::middleware(['auth', 'manager'])->group(function () {
    Route::get('/manager', function () {
        return view('pages.manager.index');
    })->name('manager.index');
    Route::get('/manager/complain_by_barang', [ComplainByBarangController::class, 'index'])->name('manager.ComplainByBarang.index');
    Route::get('/manager/complain_by_merk', [ComplainByMerkController::class, 'index'])->name('manager.ComplainByMerk.index');
    Route::get('/manager/complain_by_month', [ComplainByMonthController::class, 'index'])->name('manager.ComplainByMonth.index');
    Route::get('/manager/complain-by_petugas', [ComplainByPetugasController::class, 'index'])->name('manager.ComplainByPetugas.index');
});

Route::middleware(['auth', 'administrator'])->group(function () {
    Route::get('/administrator', function () {
        return view('pages.administrator.index');
    })->name('administrator.index');

    // Rute untuk MerkController
    Route::get('/administrator/merk', [MerkController::class, 'index'])->name('administrator.merk.index');
    Route::post('/administrator/merk', [MerkController::class, 'store'])->name('administrator.merk.store');
    Route::get('/administrator/merk/{id}/edit', [MerkController::class, 'edit']) -> name('administrator.merk.edit');
    Route::put('/administrator/merk/{id}', [MerkController::class, 'update']) -> name('administrator.merk.update');
    Route::delete('/administrator/merk/{id}', [MerkController::class, 'destroy']) -> name('administrator.merk.destroy');

    // Rute untuk BarangController
    Route::get('/administrator/barang', [BarangController::class, 'index'])->name('administrator.barang.index');
    Route::post('/administrator/barang', [BarangController::class, 'store'])->name('administrator.barang.store');
    Route::get('/administrator/barang/{id}/edit', [BarangController::class, 'edit']) -> name('administrator.barang.edit');
    Route::put('/administrator/barang/{id}', [BarangController::class, 'update']) -> name('administrator.barang.update');
    Route::delete('/administrator/barang/{id}', [BarangController::class, 'destroy']) -> name('administrator.barang.destroy');

});


Auth::routes([
    'reset' => false,
    'verify' => false,
]);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// /*
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
// */

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');