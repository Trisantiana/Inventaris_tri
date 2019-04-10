<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pages', 'HomeController@admin')->name('master');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::resource('/jenis', 'JenisController');
Route::resource('/ruang', 'RuangController');
Route::resource('/pegawai', 'PegawaiController');
Route::resource('petugas', 'PetugasController');
Route::resource('/inventaris', 'InventarisController');
Route::resource('/peminjaman', 'PeminjamanController');
Route::put('peminjaman/updateBooking/{id}', 'PeminjamanController@updateBooking')->name('peminjaman.updateBooking');

// laporan
Route::get('/laporan', 'LaporanController@index')->name('laporan.index');
Route::get('/laporan/stok', 'LaporanController@getStok')->name('laporan.stok');
Route::get('/laporan/stok/print', 'LaporanController@getStokPrint')->name('laporan.stok.print');
Route::get('/laporan/peminjaman', 'LaporanController@getLaporanPeminjaman')->name('laporan.peminjaman');
Route::get('/laporan/semua-peminjaman', 'LaporanController@getLaporanSemuaPeminjaman')->name('laporan.semuaPeminjaman');
Route::get('/laporan/peminjaman/kondisi', 'LaporanController@getLaporanPeminjamanWhereKondisi')->name('laporan.peminjaman.kondisi');
Route::get('/laporan/peminjaman/print', 'LaporanController@getLaporanPeminjamanPrint')->name('laporan.peminjaman.print');
Route::get('/laporan/peminjaman/tanggal', 'LaporanController@getLaporanTanggal')->name('laporan.tanggal');
Route::get('/laporan/peminjaman/tanggal-kembali', 'LaporanController@getLaporanTanggalKembali')->name('laporan.tanggalKembali');
Route::get('/laporan/barangSeringDipinjam', 'LaporanController@getLaporanBarangSeringDipinjam')->name('laporan.barangSeringDipinjam');
Route::get('/peminjaman/print', 'PeminjamanController@getPeminjamanPrint')->name('peminjaman.print');


//operator
Route::get('operator/peminjaman', 'OperatorController@index')->name('operator.index');
Route::get('operator/tambahPeminjam', 'OperatorController@create')->name('operator.create');
Route::post('operator/savePeminjam', 'OperatorController@store')->name('operator.store');
Route::put('operator/update/{id}', 'OperatorController@update')->name('operator.update');
Route::put('operator/updateBooking/{id}', 'OperatorController@updateBooking')->name('operator.updateBooking');


// peminjaman
Route::get('peminjam/dataInventaris', 'BorrowController@index')->name('peminjam.dataInven');
Route::get('peminjam/dataPinjam', 'BorrowController@dataPinjam')->name('peminjam.dataPinjam');
Route::get('peminjam/tambahPinjam/{id}', 'BorrowController@tambahPinjam')->name('peminjam.create');
Route::post('peminjam/savePinjam', 'BorrowController@savePinjam')->name('peminjam.store');

// peminjam dengan cart
Route::get('/add-to-borrow/{id}', 'BorrowController@addBorrow')->name('peminjam.addBorrow');
Route::get('/add-to-borrow-from-peminjam/{id}', 'BorrowController@addBorrowPeminjam')->name('peminjam.addBorrowPeminjam');
Route::get('/borrow', 'BorrowController@getBorrow')->name('peminjam.borrow');
Route::get('/proses-pinjam', 'BorrowController@getProsesPinjam')->name('proses-pinjam');
Route::post('/proses-pinjam', 'BorrowController@postPinjam')->name('proses-pinjam');
