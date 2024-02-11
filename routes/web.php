<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
use App\Models\Todo;
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

Route::get('/', [TodoController::class, "getAllTodos"])->name('accueil')->middleware('auth');
Route::get('/done', [TodoController::class, "todosDone"])->name('todos.done');
Route::get('/undone', [TodoController::class, "todosUndone"])->name('todos.undone');
Route::get('/create-todo', [TodoController::class, 'create'])->name('todo.create');
Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
Route::patch('/setDone', [TodoController::class, 'setDone'])->name('todo.setDone');
Route::patch('/SetUndone', [TodoController::class, 'SetUndone'])->name('todo.SetUndone');

Route::get('/deleteTodoConfirm/{id}', [TodoController::class, 'confirmDelete'])->name('todo.confirm-delete');
Route::delete('/delete', [TodoController::class, 'deleteTodo'])->name('todo.delete');

Route::get('/editTodo/{idTodo}', [TodoController::class, 'editGetTodo'])->name('todo.getEdit');

Route::patch('/updateTodo', [TodoController::class, 'updateTodo'])->name('todo.update');

Route::get('/todo/{todo}/affectedTo/{user}', [TodoController::class, 'affectedTo'])->name('todo.affectedTo');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
