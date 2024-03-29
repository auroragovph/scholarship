<?php

use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DevController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MySqlController;
use App\Http\Controllers\ScholarController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '/'], function(){

    Route::view('/', 'welcome')->name('homepage');
    Route::view('/privacy-policy', 'privacy-policy')->name('pripol');

    Route::group(['prefix' => 'apply', 'as' => 'apply.'], function(){
        Route::get('/', [FormController::class, 'index'])->name('form');
        Route::post('/', [FormController::class, 'submit'])->name('submit');
        Route::get('/form/{uuid}', [FormController::class, 'form'])->name('download');
    });

    Route::get('track', TrackingController::class)->name('track');

});

Route::get('dev', DevController::class);



// Protected routes
Route::group(['middleware' => 'auth:web'], function(){

    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::group(['prefix' => 'applicants', 'as' => 'applicant.'], function(){
        Route::get('/', [ApplicantsController::class, 'index'])->name('index');
        Route::get('/{id}/show', [ApplicantsController::class, 'show'])->name('show');
        Route::post('/{id}/show', [ApplicantsController::class, 'update'])->name('update');
        Route::post('/{id}/assess', [ApplicantsController::class, 'assess'])->name('assess');
        Route::get('/{id}/print', [ApplicantsController::class, 'print'])->name('print');
    });

    Route::get('/screening/{type}', ScreeningController::class)->name('screen');

    Route::group(['prefix' => 'scholars', 'as' => 'scholar.'], function(){
        Route::get('/', [ScholarController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'users', 'as' => 'user.'], function(){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/', [UserController::class, 'store'])->name('store');
    });




    // if(config('app.env') === 'local') {


    //     // Route::group(['prefix' => 'dev', 'as' => 'dev.'], function() {

    //     //     Route::get('disapproved', [DevController::class, 'disapproved'])->name('disapproved');


    //     //     Route::get('excel', [DevController::class, 'excel'])->name('excel');


    //     //     Route::get('reds', [DevController::class, 'reds'])->name('reds');

    //     //     Route::get('pdf', [DevController::class, 'pdf'])->name('pdf');
    //     //     Route::get('school', [DevController::class, 'school'])->name('school');
    //     //     Route::get('app', [DevController::class, 'app'])->name('app');

    //     //     Route::group(['prefix' => 'email', 'as' => 'email.'], function() {
    //     //         Route::get('/', [DevController::class, 'email'])->name('email');
    //     //         // Route::get('approved', [DevController::class, 'send_email_to_approved'])->name('approved');
    //     //         // Route::get('disapproved', [DevController::class, 'send_email_to_disapproved'])->name('disapproved');
    //     //     });
    //     // });

    // }
});





require __DIR__.'/auth.php';
