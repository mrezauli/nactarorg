<?php

use App\Http\Livewire\EmployeeRegistration;
use App\Http\Livewire\ViewIntake;
use App\Http\Livewire\ListIntakes;
use App\Http\Livewire\ListIntakesOfUser;
use App\Http\Livewire\Modal;
use Illuminate\Support\Facades\Route;

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
    //return view('laravel-welcome');
    return view('welcome');
});
Route::get('/employee/register', EmployeeRegistration::class)->name('employee.register');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isTrainee'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/list-intakes', ListIntakes::class)->name('list-intakes');
    Route::get('/list-intakes-of-user', ListIntakesOfUser::class)->name('list-intakes-of-user');
    Route::get('/view-intake/{intake}', ViewIntake::class)->name('view-intake');
});
