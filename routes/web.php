<?php

use App\Http\Controllers\Docs\DocsController;
use App\Http\Controllers\front\About\AboutController;
use App\Http\Controllers\front\Blog\BlogController;
use App\Http\Controllers\front\Home\ContactController;
use App\Http\Controllers\front\Home\HomeController;
use App\Http\Controllers\front\OpenSource\OpenSourceController;
use App\Http\Controllers\front\Product\ProductController;
use App\Http\Controllers\front\Profile\BillingsController;
use App\Http\Controllers\front\Profile\NotificationsController;
use App\Http\Controllers\front\Profile\ProfileController;
use App\Http\Controllers\front\Vacancy\VacanciesController;
use App\Http\Controllers\front\WebDevelopment\WebDevelopmentController;
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

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/web-development', WebDevelopmentController::class)->name('web-development');
Route::get('/open-source', OpenSourceController::class)->name('open-source');
Route::get('/vacancies', VacanciesController::class)->name('vacancies');
Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::resource('blog', BlogController::class)->only([
    'index', 'show'
])->names([
    'index' => 'blog.index',
    'show' => 'blog.show'
]);
Route::get('/contact', ContactController::class)->name('contact');
Route::get('/about-us', AboutController::class)->name('about-us');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'docs'], function () {
    Route::get('/', [DocsController::class, 'index'])->name('docs.index');
    Route::get('/{repository}/{alias?}', [DocsController::class, 'repository']);
    Route::get('/{repository}/{alias}/{slug}', [DocsController::class, 'show'])->where('slug', '.*')->name('docs.show');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/notification', NotificationsController::class)->name('notification');
    Route::get('/billing', BillingsController::class)->name('billing');
});



require __DIR__.'/auth.php';
