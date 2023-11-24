<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RoleAndPermission;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DivisionsController;
use App\Http\Controllers\ParticipantsEventController;
use App\Http\Controllers\Export\ParticipantEventExportController;
use App\Http\Controllers\PaymentAccountController;
use App\Http\Controllers\WelcomePageController;

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

Route::get('/', WelcomePageController::class)->middleware('auth')->name('welcome');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'penggunaRestrict'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    // detail alumni
    Route::get('/detail', function () {
        return view('dashboard.detail-alumni.detail-alumni');
    })->name('detail');
    // manage users
    Route::middleware(['role_or_permission:super-admin|show-user'])->name('manage-')->group(function () {
        Route::get('/manage-users',[UserController::class, 'indexDashboard'])->name('users');
    });
     // manage role and permissions
    Route::middleware(['role_or_permission:super-admin|show-permission'])->name('manage-')->group(function () {
        Route::get('/manage-permission', [RoleAndPermission::class, 'indexPermission'])->name('permission');
    });
    Route::middleware(['role_or_permission:super-admin|show-role'])->name('manage-')->group(function () {
        Route::get('/manage-role', [RoleAndPermission::class, 'indexRole'])->name('role');
    });
});
