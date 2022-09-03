<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListFormController;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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

// Route::get('/', function () {
//   return view('welcome');
// });

Route::get('/', [TodoListFormController::class, 'index'])->name('index');
Route::get('/create-page', [TodoListFormController::class, 'createPage'])->middleware('auth');
Route::post('/create', [TodoListFormController::class, 'create'])->middleware('auth');
Route::get('/edit-page/{id}', [TodoListFormController::class, 'editPage'])->middleware('auth');
Route::post('/edit', [TodoListFormController::class, 'edit'])->middleware('auth');
Route::get('delete-page/{id}', [TodoListFormController::class, 'deletePage'])->middleware('auth');
Route::post('delete/{id}', [TodoListFormController::class, 'delete'])->middleware('auth');
Route::get('/update-column', function () {
  Schema::table('users', function (Blueprint $table) {
    // $table->string('task_name')->nullable()->change();
    // $table->text('task_description')->nullable()->change();
    // $table->string('assign_person_name')->nullable()->change();
    // $table->string('estimate_hour')->nullable()->change();
    $table->string('role')->after('password')->default('customer');
  });
})->middleware('auth');
Route::get('recovery-page/{id}', [TodoListFormController::class, 'recoverypageview'])->middleware('auth');
Route::post('recovery/{id}', [TodoListFormController::class, 'recoverypage'])->middleware('auth');
Route::get('/test', [TodoListFormController::class, 'garbage'])->middleware('auth');
Route::get('destroy-page/{id}', [TodoListFormController::class, 'destroypageview'])->middleware('auth');
Route::post('destroy/{id}', [TodoListFormController::class, 'destroypage'])->middleware('auth');
Route::get('logout', function () {
  Auth::logout();
  return redirect()->route('index');
});
Route::get('destory-all', function () {
  return view('destory-all');
})->middleware('auth');
Route::get('destory-all-done', [TodoListFormController::class, 'destoryalldone'])->middleware('auth');

Route::get('model_history', function () {

  // ログイン
  dd(auth()->loginUsingId(auth()->id()));

  // データ追加

});



Route::get('/registeruser', function () {
  return view('crud_register');
})->middleware('owner_auth');

Route::post('/registerauth', [TodoListFormController::class, 'newregister'])->middleware('owner_auth');

Route::get('/contact', [TodoListFormController::class, 'mailform'])->name('contact.index');
Route::post('/contact/confirm', [TodoListFormController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/thanks', [TodoListFormController::class, 'send'])->name('contact.send');


require __DIR__ . '/auth.php';
