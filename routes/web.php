<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavgetController;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/emp", [NavgetController::class, 'index']);
Route::get("/emp/create", [NavgetController::class, 'create']);
Route::post("/emp/store", [NavgetController::class, 'store']);
Route::get("/emp/store", [NavgetController::class, 'store']);
Route::post('/emp/update/{id}', [NavgetController::class, 'update'])->name('emp.update');

Route::delete('/emp/update/{id}', [NavgetController::class, 'update'])->name('emp.update');
Route::delete('/emp/delete/{id}', [NavgetController::class, 'destroy'])->name('emp.destroy');
Route::get('/emp/edit/{id}', [NavgetController::class, 'edit'])->name('emp.edit');
Route::get('/emp/show/{id}', [NavgetController::class, 'show'])->name('emp.show');