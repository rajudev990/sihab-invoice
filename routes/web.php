<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;



Route::get('/cmd', function () {
    Artisan::call('storage:link');
    Artisan::call('optimize:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'Done';
});



Route::get('/', [WebsiteController::class, 'home'])->name('index');




Auth::routes(['verify' => true]);


Route::middleware(['auth', 'no.admin', 'verified'])->group(function () {
    Route::get('/home',[HomeController::class,'index'])->name('home');

     Route::post('/set-locale', function (\Illuminate\Http\Request $request) {
        $request->validate([
            'locale' => 'required|in:en,ar'
        ]);

        session(['locale' => $request->locale]);
        return redirect()->back();
    })->name('setLocale');

    
    Route::get('/profile/settings', [HomeController::class, 'settings'])->name('profile.settings');
    Route::put('/profile/settings', [HomeController::class, 'updateSettings'])->name('profile.settings.update');

    Route::get('/change-password', [HomeController::class, 'changePassword'])->name('change.password');
    Route::put('/change-password', [HomeController::class, 'updatePassword'])->name('change.password.update');


});


// Admin Auth
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')
    // ->middleware(['auth:admin', 'admin.only', 'role:super-admin'])
    ->middleware(['auth:admin', 'admin.only', 'admin.has.role'])
    ->name('admin.')
    ->group(function () {


        // Route::get('/dashboard', function () {
        //     return view('admin.dashboard');
        // })->name('dashboard');


        Route::get('/dashboard',[AdminProfileController::class, 'dashboard'])->name('dashboard');
        Route::get('/salary-report/pdf', [AdminProfileController::class, 'salaryReportPdf'])->name('salary.report.pdf');
        
        Route::post('/set-locale', function (\Illuminate\Http\Request $request) {
            $request->validate([
                'locale' => 'required|in:en,ar'
            ]);

            session(['locale' => $request->locale]);
            return redirect()->back();
        })->name('setLocale');



        Route::get('/profile/settings', [AdminProfileController::class, 'settings'])->name('profile.settings');
        Route::put('/profile/settings', [AdminProfileController::class, 'updateSettings'])->name('profile.settings.update');

        Route::get('/change-password', [AdminProfileController::class, 'changePassword'])->name('change.password');
        Route::put('/change-password', [AdminProfileController::class, 'updatePassword'])->name('change.password.update');


        Route::resource('settings', SettingController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
      

        Route::resource('staff', StaffController::class);
        Route::resource('department', DepartmentController::class);
        Route::resource('position', PositionController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('salary', SalaryController::class);
        


    });


// php artisan migrate:refresh --path=database/migrations/2025_11_23_140337_create_salaries_table.php
