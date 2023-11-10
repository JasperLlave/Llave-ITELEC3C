<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;

use App\Http\Controllers\CategoryController;

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
    $users = User::all();
    return view('users', ['users' => $users]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('users', ['users' => $users]);
    })->name('dashboard');
});

Route::get('/category', [CategoryController::class, 'show']); 

Route::get('/category/{id}', function ($id) {
    $item = App\Models\Category::where('id', '=', $id)->firstOrFail();
    return view('category.category', compact('item'));
});

Route::get('/create-new-category', [CategoryController::class, 'create']);

Route::post('/save-record', [CategoryController::class, 'save']);
Route::post('/submit', [CategoryController::class, 'submit']);


Route::get('/category/edit/{id}', function ($id) {
    $item = App\Models\Category::where('id', '=', $id)->firstOrFail();
    return view('category.edit', compact('item'));
});

Route::put('/update-record/{id}', [CategoryController::class,  'update']);

Route::delete('/delete/{id}', [CategoryController::class, 'destroy']);