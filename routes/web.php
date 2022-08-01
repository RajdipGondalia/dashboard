<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;


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

// Route::get('register', function () {
//     return view('register');
// })->name('register');

Route::group(['middleware'=>'auth', 'prefix' => 'dashboard'], function () {
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('add-profile',[DashboardController::class, 'store_profile_data'])->name('user_profile_add');
    Route::post('update-profile',[DashboardController::class, 'update_profile_data'])->name('user_profile_update');
    Route::get('employee', [DashboardController::class, 'get_all_employees'])->name('all_employees');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('get-single-employee/{id}',[DashboardController::class, 'get_single_employee'])->name('api_single_employee');
    Route::get('profile_edit/{id}',[DashboardController::class, 'get_single_profile'])->name('single_profile_edit');
    Route::get('profile_delete/{id}',[DashboardController::class, 'delete_single_profile'])->name('single_profile_delete');

    Route::get('time_tracker', [DashboardController::class, 'get_time_tracker'])->name('time_tracker');
    Route::get('single_time_tracker', [DashboardController::class, 'get_time_tracker'])->name('time_tracker');
    Route::get('time_tracker_delete/{id}',[DashboardController::class, 'delete_single_time_tracker'])->name('single_time_tracker_delete');
    
    Route::post('time_start',[DashboardController::class, 'time_start'])->name('time_start');
    Route::post('time_stop',[DashboardController::class, 'time_stop'])->name('time_stop');

    Route::get('task', [DashboardController::class, 'get_tasks'])->name('all_tasks');
    Route::post('add-task',[DashboardController::class, 'store_task_data'])->name('task_add');
    Route::get('task_delete/{id}',[DashboardController::class, 'delete_single_task'])->name('single_task_delete');
    // Route::get('get-single-task/{id}',[DashboardController::class, 'get_single_task'])->name('api_single_task');

    Route::post('task_start',[DashboardController::class, 'task_start'])->name('task_start');
    Route::post('task_stop',[DashboardController::class, 'task_stop'])->name('task_stop');
    Route::post('task_complete',[DashboardController::class, 'task_complete'])->name('task_complete');
    Route::post('task_cancel',[DashboardController::class, 'task_cancel'])->name('task_cancel');

    Route::get('todolist', [DashboardController::class, 'get_todolist'])->name('todolist');
    Route::post('add-todolist',[DashboardController::class, 'store_todolist_data'])->name('todolist_add');

    Route::get('client_master', [DashboardController::class, 'get_clients'])->name('all_client');
    Route::post('add-client-master',[DashboardController::class, 'store_client_master_data'])->name('client_master_add');
    Route::get('client_master_delete/{id}',[DashboardController::class, 'delete_single_client_master'])->name('single_client_master_delete');
    Route::get('client_edit/{id}',[DashboardController::class, 'get_single_client'])->name('single_client_edit');
    Route::post('update-client',[DashboardController::class, 'update_client_data'])->name('client_update');

    Route::get('project', [DashboardController::class, 'get_projects'])->name('all_projects');
    Route::post('add-project',[DashboardController::class, 'store_project_data'])->name('project_add');
    // Route::get('get-single-project/{id}',[DashboardController::class, 'get_single_project'])->name('api_single_project');
    Route::get('project_details/{id}', [DashboardController::class, 'get_project_details'])->name('project_details');
    Route::get('project_delete/{id}',[DashboardController::class, 'delete_single_project'])->name('single_project_delete');
    Route::get('project_edit/{id}',[DashboardController::class, 'get_single_project'])->name('single_project_edit');
    Route::post('update-project',[DashboardController::class, 'update_project_data'])->name('project_update');

    Route::post('project_start',[DashboardController::class, 'project_start'])->name('project_start');
    Route::post('project_hold',[DashboardController::class, 'project_hold'])->name('project_hold');
    Route::post('project_complete',[DashboardController::class, 'project_complete'])->name('project_complete');
    Route::post('project_cancel',[DashboardController::class, 'project_cancel'])->name('project_cancel');
    

    Route::post('add-project-comment',[DashboardController::class, 'store_project_comment_data'])->name('project_comment_add');
    Route::get('project_comment_delete/{id}',[DashboardController::class, 'delete_single_project_comment'])->name('single_project_comment_delete');


    Route::get('user', [DashboardController::class, 'get_users'])->name('all_users');
    Route::post('add-user',[DashboardController::class, 'store_user_data'])->name('user_add');
    Route::post('update-user',[DashboardController::class, 'update_user_data'])->name('user_update');
    Route::get('user_delete/{id}',[DashboardController::class, 'delete_single_user'])->name('single_user_delete');
    Route::get('user_edit/{id}',[DashboardController::class, 'get_single_user'])->name('single_user_edit');
	//Place all Protected nested page Routes
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';