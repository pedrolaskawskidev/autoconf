<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\VehicleController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Fabricante
    Route::resource('brand', BrandController::class)->except(['show', 'edit', 'update']);
    Route::post('brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('brand/{id}/update', [BrandController::class, 'update'])->name('brand.update');
    Route::get('brand/{id}/destroy', [BrandController::class, 'destroy'])->name('brand.destroy');
    
    //Modelo
    Route::resource('model', VehicleModelController::class)->except(['show', 'edit', 'update']);
    Route::post('model/store', [VehicleModelController::class, 'store'])->name('vehicle_model.store');
    Route::get('model/{id}/edit', [VehicleModelController::class, 'edit'])->name('vehicle_model.edit');
    Route::put('model/{id}/update', [VehicleModelController::class, 'update'])->name('vehicle_model.update');
    Route::get('model/{id}/destroy', [VehicleModelController::class, 'destroy'])->name('vehicle_model.destroy');

   
   //Veiculo
   Route::resource('vehicle', VehicleController::class)->except(['show', 'edit', 'update']);
    Route::post('vehicle/store', [VehicleController::class, 'store'])->name('vehicle.store');
    Route::get('vehicle/{id}/edit', [VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::put('vehicle/{id}/update', [VehicleController::class, 'update'])->name('vehicle.update');
    Route::get('vehicle/{id}/destroy', [VehicleController::class, 'destroy'])->name('vehicle.destroy');

});

require __DIR__.'/auth.php';
