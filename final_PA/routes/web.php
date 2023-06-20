<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserBeritaController;
use App\Http\Controllers\SaranController;



Route::get('/', function () {
    return view('index');
});


Route::get('/kontenDetail', function () {
    return view('kontenDetail');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

//berita dan konten guess
Route::get('/user/berita', [UserBeritaController::class, 'index'])->name('berita.index');
Route::get('/allkonten/wisatawan', [KategoriController::class, 'indexWisatawan'])->name('all.konten.wisatwan');
Route::get('/allkonten/wisatawan/{konten}', [KategoriController::class, 'indexDetail'])->name('konten.detail');
Route::get('/user/berita{id}', [UserBeritaController::class, 'show'])->name('berita.show');


// Rute admin
Route::group(['middleware' => 'admin'], function () {

    Route::get('/homeAdmin', function () {
        return view('admin.dashboard');
    });

    //kategori
    Route::get('/categories', [KategoriController::class, 'index'])->name('kategori.index.admin');
    Route::post('/categories', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/categories/{kategori}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/categories/{kategori}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/categories/{kategori}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

    //konten
    Route::get('/konten/create', [KontenController::class, 'create'])->name('konten.create');
    Route::post('/konten', [KontenController::class, 'store'])->name('konten.store');
    Route::get('/konten/{konten}/edit', [KontenController::class, 'edit'])->name('konten.edit');
    Route::put('/konten/{konten}', [KontenController::class, 'update'])->name('konten.update');
    Route::delete('/konten/{konten}', [KontenController::class, 'destroy'])->name('konten.destroy');
    Route::get('/konten/admin/{konten}', [KontenController::class, 'indexDetail'])->name('admin.konten.detail');

    //Ticket
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/ticketstore', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

    //Pesanan
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/{id}/approve', [OrderController::class, 'approve'])->name('orders.approve');
    Route::post('/orders/{id}/reject', [OrderController::class, 'reject'])->name('orders.reject');
    Route::delete('/orders/{id}', [OrderController::class, 'delete'])->name('orders.delete');

    //Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita.index');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('admin.berita.show');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/berita/edit/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/berita/destroy/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    //saran
    Route::get('/admin/saran', [SaranController::class, 'index'])->name('admin.saran.index');
    Route::delete('/admin/saran/{saran}', [SaranController::class, 'adminDestroy'])->name('admin.saran.destroy');
    Route::get('/saran/{id}/admin', [SaranController::class, 'showAdmin'])->name('saran.showAdmin');
});

// Rute wisatawan
Route::group(['middleware' => 'wisatawan'], function () {
    //Ticket
    Route::get('/ticketsPelanggan',  [TicketController::class, 'showWisatawan'])->name('tickets.showAll');

    // Order
    Route::get('/create/{ticketId}', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orderstore', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/myorderAll', [OrderController::class, 'show'])->name('orders.show');

    //Saran
    Route::get('/saran', [SaranController::class, 'create'])->name('saran.create');
    Route::post('/saran', [SaranController::class, 'store'])->name('saran.store');
    Route::get('/saran/{id}/wisatawan', [SaranController::class, 'showWisatawan'])->name('saran.showWisatawan');
});
