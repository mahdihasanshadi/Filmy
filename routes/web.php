<?php

use Illuminate\Support\Facades\Route;
use App\Notifications\ResetPasswordMail;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Filmy\FilmyAuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RecommendationController;

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
    return view('welcome');
});

// Authentication Routes (only for guests)
Route::middleware('guest')->group(function () {
    Route::get('login', [FilmyAuthController::class, 'login'])->name('login');
    Route::post('login/post', [FilmyAuthController::class, 'loginPost'])->name('login.post');
    Route::get('register', [FilmyAuthController::class, 'register'])->name('register');
    Route::post('register', [FilmyAuthController::class, 'shadiPost'])->name('register.post');
});
Route::post('logout', [FilmyAuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Home Route
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Test Mail Route
    Route::get('/send-mail', function () {
        Notification::route('mail', 'mahdi.hasan.shadi@g.bracu.ac.bd')->notify(new ResetPasswordMail());
    });

    // Movie Routes
    Route::prefix('movies')->group(function () {
        Route::get('/', [MovieController::class, 'index'])->name('movies.index');
        Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
        Route::post('/', [MovieController::class, 'store'])->name('movies.store');
        Route::get('/{movie}', [MovieController::class, 'show'])->name('movies.show');
        Route::get('/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
        Route::put('/{movie}', [MovieController::class, 'update'])->name('movies.update');
        Route::delete('/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
    });

    // Series Routes
    Route::prefix('series')->group(function () {
        Route::get('/', [SeriesController::class, 'index'])->name('series.index');
        Route::get('/create', [SeriesController::class, 'create'])->name('series.create');
        Route::post('/', [SeriesController::class, 'store'])->name('series.store');
        Route::get('/{series}', [SeriesController::class, 'show'])->name('series.show');
        Route::get('/{series}/edit', [SeriesController::class, 'edit'])->name('series.edit');
        Route::put('/{series}', [SeriesController::class, 'update'])->name('series.update');
        Route::delete('/{series}', [SeriesController::class, 'destroy'])->name('series.destroy');
    });

    // Genre Routes
    Route::prefix('genres')->group(function () {
        Route::get('/', [GenreController::class, 'index'])->name('genres.index');
        Route::get('/create', [GenreController::class, 'create'])->name('genres.create');
        Route::post('/', [GenreController::class, 'store'])->name('genres.store');
        Route::get('/{genre}', [GenreController::class, 'show'])->name('genres.show');
        Route::get('/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
        Route::put('/{genre}', [GenreController::class, 'update'])->name('genres.update');
        Route::delete('/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');
    });

    // Favorite Routes
    Route::prefix('favorites')->group(function () {
        Route::get('/', [FavoriteController::class, 'index'])->name('favorites.index');
        Route::get('/movies', [FavoriteController::class, 'movies'])->name('favorites.movies');
        Route::get('/series', [FavoriteController::class, 'series'])->name('favorites.series');
        Route::post('/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    });

    // Friend Routes
    Route::get('/friends', [FriendController::class, 'index'])->name('friends.index');
    Route::post('/friends/send/{user}', [FriendController::class, 'sendRequest'])->name('friends.send');
    Route::post('/friends/accept/{request}', [FriendController::class, 'acceptRequest'])->name('friends.accept');
    Route::post('/friends/reject/{request}', [FriendController::class, 'rejectRequest'])->name('friends.reject');
    Route::post('/friends/cancel/{request}', [FriendController::class, 'cancelRequest'])->name('friends.cancel');
    Route::post('/friends/remove/{user}', [FriendController::class, 'removeFriend'])->name('friends.remove');

    // Actor Routes
    Route::prefix('actors')->group(function () {
        Route::get('/', [ActorController::class, 'index'])->name('actors.index');
        Route::get('/create', [ActorController::class, 'create'])->name('actors.create');
        Route::post('/', [ActorController::class, 'store'])->name('actors.store');
        Route::get('/{actor}', [ActorController::class, 'show'])->name('actors.show');
        Route::get('/{actor}/edit', [ActorController::class, 'edit'])->name('actors.edit');
        Route::put('/{actor}', [ActorController::class, 'update'])->name('actors.update');
        Route::delete('/{actor}', [ActorController::class, 'destroy'])->name('actors.destroy');
    });

    // Director Routes
    Route::prefix('directors')->group(function () {
        Route::get('/', [DirectorController::class, 'index'])->name('directors.index');
        Route::get('/create', [DirectorController::class, 'create'])->name('directors.create');
        Route::post('/', [DirectorController::class, 'store'])->name('directors.store');
        Route::get('/{director}', [DirectorController::class, 'show'])->name('directors.show');
        Route::get('/{director}/edit', [DirectorController::class, 'edit'])->name('directors.edit');
        Route::put('/{director}', [DirectorController::class, 'update'])->name('directors.update');
        Route::delete('/{director}', [DirectorController::class, 'destroy'])->name('directors.destroy');
    });

    // User Routes
    Route::resource('users', UserController::class);

    // Review Routes
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    // Recommendation Routes
    Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations.index');
    Route::get('/recommendations/create', [RecommendationController::class, 'create'])->name('recommendations.create');
    Route::post('/recommendations', [RecommendationController::class, 'store'])->name('recommendations.store');
    Route::patch('/recommendations/{recommendation}/read', [RecommendationController::class, 'markAsRead'])->name('recommendations.markAsRead');
    Route::delete('/recommendations/{recommendation}', [RecommendationController::class, 'destroy'])->name('recommendations.destroy');
});
