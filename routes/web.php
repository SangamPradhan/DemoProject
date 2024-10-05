<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Define the default route
Route::get('/', function () {
    return view('user.home');
});

// Route for dashboard after authentication
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes with authentication middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Redirect route to handle usertype-based redirection
Route::get('/redirect', [HomeController::class,'redirect'])->middleware('auth');

// Routes for the HomeController methods
Route::get('/home', [HomeController::class, 'home']);
Route::get('/index', [HomeController::class, 'index']);

Route::get('/createuser', [HomeController::class, 'createuser']);
Route::post('/create_user', [HomeController::class, 'create_user']);

//Route::get('/user', [HomeController::class, 'user']);  // Changed to match the controller method
Route::get('/manageuser', [HomeController::class, 'manageuser']);

Route::get('/edituser/{id}', [HomeController::class, 'edituser']);
Route::put('/updateuser/{id}', [HomeController::class, 'updateuser'])->name('updateuser');

Route::get('/deleteuser/{id}', [HomeController::class, 'deleteuser']);

Route::get('/jobs', [HomeController::class, 'jobs']);
Route::get('/createjobs', [HomeController::class, 'createjobs']);

Route::get('/jobs', [JobController::class, 'showJobs']);
Route::get('/job', [JobController::class, 'job']);

Route::post('/add_job', [JobController::class, 'add_job']);
Route::get('/job_details/{id}', [JobController::class, 'job_details']);
Route::get('/job_details', [JobController::class, 'job_details']);

Route::middleware(['auth'])->group(function ()
    {
        Route::get('/job/{id}', [JobController::class, 'show'])->name('user.job_details');
        Route::get('/job/{id}/editjob', [JobController::class, 'edit'])->name('user.editjob');

    });



Route::get('/job/edit/{id}', [JobController::class, 'editjob']);


Route::post('/updatejob/{id}', [JobController::class, 'updateJob']);

require __DIR__.'/auth.php';


