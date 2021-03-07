<?php

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login-admin', [App\Http\Controllers\HomeController::class, 'login_admin']);
Route::group(['middleware'=>['auth','role:admin']],function(){
    Route::get('/home/kelola-user', [App\Http\Controllers\HomeController::class, 'kelola_user']);
    Route::get('/home/kelola-user/{id}/hapus_user', [App\Http\Controllers\Homecontroller::class, 'hapus_user']);
    Route::get('/home/kelola-user/{id}/ganti_status', [App\Http\Controllers\Homecontroller::class, 'ganti_status']);
    Route::get('/home/kelola-train-data', [App\Http\Controllers\HomeController::class, 'kelola_train_data']);
    Route::get('/home/kelola-laporan', [App\Http\Controllers\Admincontroller::class, 'kelola_laporan']);
    Route::get('/home/kelola-laporan/{id}/edit_toLaporan', [App\Http\Controllers\Admincontroller::class, 'edit_toLaporan']);
    Route::get('/home/kelola-laporan/{id}/edit_toLaporan/approve_laporan', [App\Http\Controllers\Admincontroller::class, 'approve_laporan']);
    Route::get('/home/kelola-laporan/{id}/edit_toLaporan/approve_all_laporan', [App\Http\Controllers\Admincontroller::class, 'approve_all_laporan']);
    Route::get('/home/kelola-tempat-pi', [App\Http\Controllers\HomeController::class, 'kelola_tempat']);
    Route::get('/home/kelola-fitur', [App\Http\Controllers\HomeController::class, 'kelola_fitur']);
    Route::get('/home/kelola-kota', [App\Http\Controllers\HomeController::class, 'kelola_kota']);
    Route::post('/home/kelola-tempat-pi/tambahSI', [App\Http\Controllers\Admincontroller::class, 'tambahSI']);
    Route::get('/home/kelola-tempat-pi/{id}/hapus_tempat', [App\Http\Controllers\Homecontroller::class, 'hapus_tempat']);
    Route::get('/home/kelola-tempat-pi/{id}/toeditSI', [App\Http\Controllers\Homecontroller::class, 'toeditSI']);
    Route::post('/home/kelola-tempat-pi/{id}/updateSI', [App\Http\Controllers\Admincontroller::class, 'updateSI']);
    Route::post('/home/kelola-tempat-pi/tambahTI', [App\Http\Controllers\Admincontroller::class, 'tambahTI']);
    Route::get('/home/kelola-tempat-pi/{id}/toeditTI', [App\Http\Controllers\Homecontroller::class, 'toeditTI']);
    Route::post('/home/kelola-tempat-pi/{id}/updateTI', [App\Http\Controllers\Admincontroller::class, 'updateTI']);
    Route::post('/home/kelola-tempat-pi/tambahPTI', [App\Http\Controllers\Admincontroller::class, 'tambahPTI']);
    Route::get('/home/kelola-tempat-pi/{id}/toeditPTI', [App\Http\Controllers\Homecontroller::class, 'toeditPTI']);
    Route::post('/home/kelola-tempat-pi/{id}/updatePTI', [App\Http\Controllers\Admincontroller::class, 'updatePTI']);
    Route::post('/home/kelola-tempat-pi/tambahMI', [App\Http\Controllers\Admincontroller::class, 'tambahMI']);
    Route::get('/home/kelola-tempat-pi/{id}/toeditMI', [App\Http\Controllers\Homecontroller::class, 'toeditMI']);
    Route::post('/home/kelola-tempat-pi/{id}/updateMI', [App\Http\Controllers\Admincontroller::class, 'updateMI']);
    Route::post('/home/kelola-kota/tambahKota', [App\Http\Controllers\Admincontroller::class, 'tambahKota'])->name('storekota');
    Route::get('/home/kelola-kota/{id}/toeditKota', [App\Http\Controllers\Homecontroller::class, 'toeditKota']);
    Route::post('/home/kelola-kota/{id}/updateKota', [App\Http\Controllers\Admincontroller::class, 'updateKota']);
    Route::post('/home/kelola-fitur/tambahProStud', [App\Http\Controllers\Admincontroller::class, 'tambahProgramStudi'])->name('storeProgStud');
    Route::get('/home/kelola-fitur/{id}/toeditProStud', [App\Http\Controllers\Homecontroller::class, 'toeditProStud']);
    Route::get('/home/kelola-fitur/{id}/toeditPeminatan', [App\Http\Controllers\Homecontroller::class, 'toeditPeminatan']);
    Route::post('/home/kelola-fitur/{id}/updateProStud', [App\Http\Controllers\Admincontroller::class, 'updateProgramStudi']);
    Route::post('/home/kelola-fitur/tambahPeminatan', [App\Http\Controllers\Admincontroller::class, 'tambahPeminatan'])->name('storePeminatan');
    Route::post('/home/kelola-fitur/{id}/updatePeminatan', [App\Http\Controllers\Admincontroller::class, 'updatePeminatan']);
});
Route::group(['middleware'=>['auth','role:user']],function(){
    Route::get('/home/rekomendasi', [App\Http\Controllers\RekomendasiController::class, 'index']);
    Route::post('/home/rekomendasi/filter', [App\Http\Controllers\RekomendasiController::class, 'index']);
    Route::get('/home/laporan', [App\Http\Controllers\HomeController::class, 'laporan']);
    Route::post('/home/laporan/tambah', [App\Http\Controllers\UserController::class, 'tambahlaporan']);
    Route::get('/home/laporan/{id}/hapus_laporan', [App\Http\Controllers\UserController::class, 'hapus_laporan']);
    Route::get('/home/laporan/cetak', [App\Http\Controllers\UserController::class, 'cetak']);
    Route::get('/home/laporan/download_pdf', [App\Http\Controllers\UserController::class, 'download_pdf']);
    Route::get('/home/magang', [App\Http\Controllers\HomeController::class, 'magang']);
    Route::post('/home/magang/daftarMagang', [App\Http\Controllers\UserController::class, 'daftarMagang']);
    Route::post('/home/magang/list_tempat/{id}/daftar', [App\Http\Controllers\UserController::class, 'daftar']);
    Route::get('/home/magang/list_tempat', [App\Http\Controllers\HomeController::class, 'list_tempat_magang']);
    Route::get('/home/nilai-si', [App\Http\Controllers\HomeController::class, 'nilai_si']);
    Route::post('/home/nilai-si/{id}/tambahNilai_SI', [App\Http\Controllers\UserController::class, 'tambahNilai_SI']);
    Route::get('/home/nilai-ti', [App\Http\Controllers\HomeController::class, 'nilai_si']);
    Route::post('/home/nilai-ti/{id}/tambahNilai_TI', [App\Http\Controllers\UserController::class, 'tambahNilai_TI']);
    Route::get('/home/nilai-mi', [App\Http\Controllers\HomeController::class, 'nilai_si']);
    Route::post('/home/nilai-mi/{id}/tambahNilai_MI', [App\Http\Controllers\UserController::class, 'tambahNilai_MI']);
    Route::get('/home/nilai-pti', [App\Http\Controllers\HomeController::class, 'nilai_si']);
    Route::post('/home/nilai-pti/{id}/tambahNilai_PTI', [App\Http\Controllers\UserController::class, 'tambahNilai_PTI']);
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');