<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;


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
//     return view('welcome');
// });

// Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
// Route::get('profile', function () {
//     return view('profile');
// });
Route::get('employee_details', function () {
    return view('employee_details');
})->name('employee_details');
Route::get('register', function () {
    return view('register');
})->name('register');



Route::group(['middleware'=>'auth', 'prefix' => 'dashboard'], function () {
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('update-profile',[DashboardController::class, 'store_profile_data'])->name('user_profile_update');
    Route::get('employee', [DashboardController::class, 'get_all_employees'])->name('all_employees');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('get-single-employee/{id}',[DashboardController::class, 'get_single_employee'])->name('api_single_employee');

    Route::get('time_tracker', [DashboardController::class, 'get_time_tracker'])->name('time_tracker');
    Route::get('single_time_tracker', [DashboardController::class, 'get_time_tracker'])->name('time_tracker');

    Route::post('time_start',[DashboardController::class, 'time_start'])->name('time_start');
    Route::post('time_stop',[DashboardController::class, 'time_stop'])->name('time_stop');

    Route::get('task', [DashboardController::class, 'get_tasks'])->name('all_tasks');
    Route::post('add-task',[DashboardController::class, 'store_task_data'])->name('task_add');
    // Route::get('get-single-task/{id}',[DashboardController::class, 'get_single_task'])->name('api_single_task');

    Route::post('task_start',[DashboardController::class, 'task_start'])->name('task_start');
    Route::post('task_stop',[DashboardController::class, 'task_stop'])->name('task_stop');
    Route::post('task_complete',[DashboardController::class, 'task_complete'])->name('task_complete');
    Route::post('task_cancel',[DashboardController::class, 'task_cancel'])->name('task_cancel');

    Route::get('todolist', [DashboardController::class, 'get_todolist'])->name('todolist');
    Route::post('add-todolist',[DashboardController::class, 'store_todolist_data'])->name('todolist_add');
	//Place all Protected nested page Routes
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


