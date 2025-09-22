<?php

use App\Http\Controllers\PostController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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



Route::get('/test-email', function () {
    
    try {
        Mail::to('user@example.com')->send(new TestMail());
        Log::info('Testing email sent.');
        return 'Email sent successfully.';
    } catch (\Throwable $th) {
        throw $th;
    }

});

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('/', function () {
    return redirect('posts');
    // return view('welcome');
});

Route::resource('posts', PostController::class);

