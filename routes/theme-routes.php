<?php

use App\Http\Controllers\defectController;

//use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome', ['title' => 'This is Title']);
});



$prefixRouters = [
    'light-menu', 'dark-menu'
];

foreach ($prefixRouters as $prefixRouter) {
    Route::prefix($prefixRouter)->group(function () {
        Route::get('/sss', function () {
            return view('welcome', ['title' => 'Welcome']);
        });

        /**
         * ==============================
         *       @Router -  Dashboard
         * ==============================
         */

        Route::prefix('dashboard')->group(function () {
            Route::get('/analytics', function () {
                return view('pages.dashboard.analytics', ['title' => 'CRM Admin']);
            })->name('analytics');
            Route::get('/sales', function () {
                return view('pages.dashboard.sales', ['title' => 'CRM Admin']);
            })->name('sales');
        });

        /**
         * ==============================
         *        @Router -  Apps
         * ==============================
         */

        Route::prefix('app')->group(function () {
            Route::get('/product-defects', [defectController::class, 'defectlist']);
            Route::get('delete/{id}', [defectController::class, 'delete']);
            // routes/web.php
            Route::get('/product-defects', [DefectController::class, 'index'])->name('defects.index');
            Route::post('/product-defects', [DefectController::class, 'store'])->name('defects.store');
            Route::post('/product-defects/{id}', [DefectController::class, 'update'])->name('defects.update');
            Route
            Route::get('/feedbacks', function () {
                return view('pages.app.feedbacks', ['title' => 'Feedbacks']);
            })->name('feedbacks');
            Route::get('/resolutions', function () {
                return view('pages.app.resolutions', ['title' => 'Resolutions']);
            })->name('resolutions');
        });
    });
}
