<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\CentreCoutController;
use App\Http\Controllers\PointageController;
use App\Http\Controllers\RubriqueController;
use App\Http\Controllers\PeriodePaieController;
use App\Http\Controllers\BulletinController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('entreprises.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('entreprises', EntrepriseController::class);

Route::resource('employes', EmployeController::class);

Route::resource('categories', CategorieController::class);

Route::resource('postes', PosteController::class);

Route::resource('contrats', ContratController::class);


Route::resource('centres-cout',CentreCoutController::class);

Route::resource('pointages',PointageController::class);

Route::resource(
    'rubriques',
    RubriqueController::class
);

Route::resource(
    'periodes-paie',
    PeriodePaieController::class
);

Route::resource(
    'bulletins',
    BulletinController::class
);

Route::get(

    '/bulletins/{bulletin}/pdf',

    [BulletinController::class, 'pdf']

)->name('bulletins.pdf');

require __DIR__.'/auth.php';
