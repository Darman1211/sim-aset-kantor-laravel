<?php

use App\Models\Room;
use App\Models\Asset;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\BorrowAssetController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\DamagedAssetController;

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

// Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

// Route Logout
Route::post('/logout', [LoginController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard
Route::get('/dashboard', function() {
    return view('dashboard.index', [
        'title' => 'Meetup Asset | Dashboard',
        'totalaset' => Asset::count(),
        'totalkategori' => Category::count(),
        'totalruangan' => Room::count()
    ]);
})->middleware('auth');

Route::get('assets/checkSlug', [AssetController::class, 'checkSlug'])->middleware('auth');

// Route Resource Kelola CRUD Asset
Route::resource('/assets', AssetController::class)->middleware('auth');
// Route Resource Kelola CRUD Category
Route::resource('/categories', CategoryController::class)->except('show')->middleware('admin'); // except('show') = jika route show tidak diapakai(supaya tidak bisa diakses)
// Route Resource Kelola CRUD Room
Route::resource('/rooms', RoomController::class)->except('show')->middleware('admin');
// Route Resource Kelola CRUD Maintenance
Route::resource('/maintenances', MaintenanceController::class)->except('show')->middleware('admin');
// Route Resource Kelola CRUD Damaged Asset
Route::resource('/damagedassets', DamagedAssetController::class)->except('show')->middleware('admin');
// Route Resource Kelola CRUD Borrow Asset
Route::resource('/borrowassets', BorrowAssetController::class)->except('show')->middleware('admin');
// Return Aset
Route::post('borrowassets/return/{id}', [BorrowAssetController::class, 'return'])->middleware('admin');
// Route Resource Kelola CRUD Reminder
Route::resource('/reminder', ReminderController::class)->except('show')->middleware('admin');

// Route 
Route::get('/reportaset', [AssetController::class, 'reportaset'])->middleware('admin');
Route::get('/reportmaintenance', [MaintenanceController::class, 'reportmaintenance'])->middleware('admin');
Route::get('/reportqr', [AssetController::class, 'reportqr'])->middleware('admin');
Route::get('/reportqr/print', [AssetController::class, 'printqr'])->middleware('admin');