<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/doc-list', [DocumentController::class, 'getDocuments'])->name('documents.doc-list');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/general', [DashboardController::class, 'general'])->name('dashboard.general');

    Route::resource('units', UnitController::class);
    Route::resource('users', UserController::class);
    Route::resource('document-types', DocumentTypeController::class);
    Route::resource('documents', DocumentController::class);

    Route::get('/unit-list', [UnitController::class, 'getUnits'])->name('units.unit-list');
    Route::get('/user-type', [UserController::class, 'getUserType'])->name('user.user-type');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
