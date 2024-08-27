<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\BiodataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::group(['prefix' => 'search'], function () {
    Route::get('/', [UserController::class, 'searchUser']);
    Route::get('/{id}', [UserController::class, 'findUser']);
});

// Route::group(['prefix'=>'chat'], function () {
Route::resource('chat', ChatController::class);
// });
Route::resource('biodata', BiodataController::class);

Route::get('/admin', function () {
    $kategori = [
        [
            'nama_kategori' => 'handphone',
            'unique_id' => "050501",
            'produk' => [
                ['nama_produk' => 'samsung s24 ultra', 'harga' => 5000000, 'diskon' => 0.1],
                ['nama_produk' => 'poco x6 pro', 'harga' => 2000000, 'diskon' => 0.1],
                ['nama_produk' => 'iphone 15 pro max', 'harga' => 3500000, 'diskon' => 0.1],
                ['nama_produk' => 'poco f6', 'harga' => 1200000, 'diskon' => 0.1]
            ]
        ],
        [
            'nama_kategori' => 'makanan',
            'unique_id' => "050502",
            'produk' => [
                ['nama_produk' => 'pizza', 'harga' => 150000, 'diskon' => 0.1],
                ['nama_produk' => 'burger', 'harga' => 200000, 'diskon' => 0.1],
                ['nama_produk' => 'mendoan', 'harga' => 1050000, 'diskon' => 0.1],
                ['nama_produk' => 'puding keju', 'harga' => 70000, 'diskon' => 0.1]
            ]
        ]
    ];
    // return view('admin.formkategori',compact('kategori'));
    return view('admin.formkategori', [
        'kategori' => $kategori
    ]);
});

// Route::get('/admin-form', function () {
//     return view('admin.formkategori');
// });
