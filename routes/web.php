<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//============================[本番]=====================================


Route::get('/',function (){
    return view("kikukawa");
});
Route::get('/', [\App\Http\Controllers\kikukawaController::class,"giveInfo"])->name('giveInfo');

Route::get('/dashboard-main', [\App\Http\Controllers\kikukawaController::class,"dashboardMain"])->name('dashboardMain');

Route::get('/dashboard-user', [\App\Http\Controllers\kikukawaController::class,"dashboardUser"])->name('dashboardUser');

//Event
Route::post("/dashboard/add-event",[\App\Http\Controllers\kikukawaController::class,"addEvent"])->name("add-event");
Route::post("/dashboard/add-category",[\App\Http\Controllers\kikukawaController::class,"addCategory"])->name("add-category");
Route::get("/dashboard/show-event",[\App\Http\Controllers\kikukawaController::class,"showEvent"])->name("show-event");
Route::get("/dashboard/show-event",[\App\Http\Controllers\kikukawaController::class,"getAllData"])->name("show-event");
Route::patch('/dashboard/show-event{event}', [\App\Http\Controllers\kikukawaController::class,"updateEvent"])->name('updateEvent');

//Product
Route::get("/dashboard/show-product",[\App\Http\Controllers\dashProduct::class,"showProductPage"])->name("show-product");
Route::post("/dashboard/add-product",[\App\Http\Controllers\dashProduct::class,"addProduct"])->name("add-product");
Route::patch('/dashboard/show-product{product}', [\App\Http\Controllers\dashProduct::class,"updateProduct"])->name('update-product');

//Message
Route::get("/dashboard/show-message",[\App\Http\Controllers\dashMessage::class,"showMessagePage"])->name("show-message");
Route::post("/dashboard/add-message",[\App\Http\Controllers\dashMessage::class,"addMessage"])->name("add-message");
Route::patch('/dashboard/show-message{message}', [\App\Http\Controllers\dashMessage::class,"updateMessage"])->name('update-message');

//Interview
Route::get("/dashboard/show-interview",[\App\Http\Controllers\dashInterview::class,"showInterviewPage"])->name("show-interview");
Route::post("/dashboard/add-interview",[\App\Http\Controllers\dashInterview::class,"addInterview"])->name("add-interview");
Route::patch('/dashboard/show-interview{interview}', [\App\Http\Controllers\dashInterview::class,"updateInterview"])->name('update-interview');

//Job Opening
Route::get("/dashboard/show-job_opening",[\App\Http\Controllers\dashJobOpening::class,"showJobOpeningPage"])->name("show-job_opening");
Route::post("/dashboard/add-add-job_opening",[\App\Http\Controllers\dashJobOpening::class,"addJobOpening"])->name("add-job_opening");
Route::patch('/dashboard/show-interview{interview}', [\App\Http\Controllers\dashInterview::class,"updateInterview"])->name('update-interview');

//Question
Route::get("/dashboard/show-question",[\App\Http\Controllers\dashQuestion::class,"showQuestionPage"])->name("show-question");
Route::post("/dashboard/add-question",[\App\Http\Controllers\dashQuestion::class,"addQuestion"])->name("add-question");
Route::patch('/dashboard/show-question{question}', [\App\Http\Controllers\dashQuestion::class,"updateQuestion"])->name('update-question');

//=====================================================================================================

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';