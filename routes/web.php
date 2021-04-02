<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestController;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('tasks', [TaskController::class, 'index'])->middleware(['auth', 'verified'])->name('tasks');
Route::get('tasks/create', [TaskController::class, 'create'])->middleware(['auth', 'verified'])->name('tasks.create');
Route::post('tasks/store', [TaskController::class, 'store'])->middleware(['auth', 'verified'])->name('tasks.store');
Route::get('tasks/edit/{task}', [TaskController::class, 'edit'])->middleware(['auth', 'verified'])->name('tasks.edit');
Route::put('tasks/{task}', [TaskController::class, 'update'])->middleware('auth')->name('tasks.update');

Route::get('projects', [ProjectController::class, 'index'])->middleware(['auth', 'verified'])->name('projects');
Route::get('projects/create', [ProjectController::class, 'create'])->middleware(['auth', 'verified'])->name('projects.create');
Route::post('projects/store', [ProjectController::class, 'store'])->middleware(['auth', 'verified'])->name('projects.store');
Route::get('projects/edit/{project}', [ProjectController::class, 'edit'])->middleware(['auth', 'verified'])->name('projects.edit');

Route::get('solutions', [SolutionController::class, 'index'])->middleware(['auth', 'verified'])->name('solutions');
Route::get('solutions/create', [SolutionController::class, 'create'])->middleware(['auth', 'verified'])->name('solutions.create');
Route::post('solutions/store', [SolutionController::class, 'store'])->middleware(['auth', 'verified'])->name('solutions.store');
Route::get('solutions/edit/{project}', [SolutionController::class, 'edit'])->middleware(['auth', 'verified'])->name('solutions.edit');

Route::get('tests', [TestController::class, 'index'])->middleware(['auth', 'verified'])->name('tests');
Route::get('tests/create', [TestController::class, 'create'])->middleware(['auth', 'verified'])->name('tests.create');
Route::post('tests/store', [TestController::class, 'store'])->middleware(['auth', 'verified'])->name('tests.store');
Route::get('tests/edit/{test}', [TestController::class, 'edit'])->middleware(['auth', 'verified'])->name('tests.edit');

require __DIR__.'/auth.php';
