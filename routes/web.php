<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDepartementController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Departemen;
use App\Models\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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



Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view("home", [
        "title" => "Home",
        "active" => "home",
        "events" => Event::all(),
    ]);
});

Route::get('/about', function () {
    $data = [
        "title" => "About",
        "active" => "about",
        "departements" => Departemen::all(),
    ];
    return view("events", $data);
});

Route::get('/events', function () {
    $data = [
        "title" => "Events",
        "active" => "events",
        "events" => Event::all(),
    ];
    return view("events", $data);
});


Route::get('/blog', [PostController::class, 'index']);

// Halaman single post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', function (Category $category) {
    return view(
        'categories',
        [
            'title' => $category->name,
            "active" => "categories",
            'categories' => Category::all()
        ]
    );
});


Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// Pemberitahuan verifikasi email
Route::get('/email/verify', function () {
    return view('auth.verify-notice', [
        'title' => "Verify email",
        'active' => "Verify email"
    ]);
})->middleware('auth')->name('verification.notice');

// penanganga verifikasi email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/user/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

// mengirim ulang email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('dashboard', function () {
    return view('dashboard.index');
})->middleware('auth', 'verified', 'admin');

// cek slug
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/departements', AdminDepartementController::class)->middleware('admin');
Route::resource('/dashboard/events', AdminEventController::class)->middleware('admin');


Route::middleware(['auth', 'verified', 'complite'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'profile']);
    Route::get('/mahasiswa', [StudentController::class, 'index']);
});

Route::put('/mahasiswa/{student:nim}', [RegisterController::class, 'storePersonalData'])->middleware('auth', 'verified');
Route::get('/melengkapi-data', [RegisterController::class, 'complitePersonalData'])->middleware('auth', 'verified');
