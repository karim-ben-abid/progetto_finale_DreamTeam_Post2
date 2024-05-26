<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\WriterController;

// HOME
Route::get('/', [PublicController::class, 'welcome'])
    ->name('homepage');


// ARTICLE
// Route::post('/article/store', [ArticleController::class, 'store'])
//     ->name('article.store')->middleware('auth');

// Route::get('/article/create', [ArticleController::class, 'create'])
//     ->name('article.create')->middleware('auth');

Route::get('/article/index', [ArticleController::class, 'index'])
    ->name('article.index');

Route::get('/article/show/{article:slug}', [ArticleController::class, 'show'])
    ->name('article.show');

Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])
    ->name('article.edit')->middleware('auth');


//rotta filtro categorie

Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])
    ->name('article.byCategory');

//rotta filtro redattore

Route::get('/article/user/{user}', [ArticleController::class, 'byUser'])
    ->name('article.byUser')->middleware('auth');

//lavora con noi
Route::get('careers', [PublicController::class, 'careers'])
    ->name('careers')->middleware('auth');

Route::post('careers/submit', [PublicController::class, 'careersSubmit'])
    ->name('careers.submit');

//rotta di ricerca
Route::get('article/search', [ArticleController::class, 'articleSearch'])->name('article.search');


//rotta admin//
Route::middleware('admin')->group(function () {

    // attiva ruoli
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');

    Route::get('admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');

    Route::get('admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');

    
    // disattiva ruoli
    Route::get('admin/{user}/delete-admin', [AdminController::class, 'deleteAdmin'])->name('admin.deleteAdmin');

    Route::get('admin/{user}/delete-revisor', [AdminController::class, 'deleteRevisor'])->name('admin.deleteRevisor');

    Route::get('admin/{user}/delete-writer', [AdminController::class, 'deleteWriter'])->name('admin.deleteWriter');


    // rotte tag e categorie
    Route::put('admin/edit/tag/{tag}', [AdminController::class, 'editTag'])->name('admin.editTag');

    Route::delete('admin/delete/tag/{tag}', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');

    Route::put('admin/edit/category/{category}', [AdminController::class, 'editCategory'])->name('admin.editCategory');

    Route::delete('admin/delete/category/{category}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');

    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');

});

// rotta revisor
Route::middleware('revisor')->group(function() {

    Route::get('revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');

    Route::post('revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');

    Route::post('revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');

    Route::post('revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});

// rotta writer
Route::middleware('writer')->group(function () {

    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');

    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');

    Route::get('writer/dashboard', [WriterController::class, 'dashboard'])->name('writer.dashboard');

    Route::put('/article/update/{article}', [ArticleController::class, 'update'])
    ->name('article.update');

    Route::delete('/article/destroy/{article}', [ArticleController::class, 'destroy'])
    ->name('article.destroy');
});

//rotta staff

Route::get('/staff', [PublicController::class, 'staff'])
    ->name('staff');

//rotta lingue//
Route::post('lingua/{lang}', [LanguagesController::class, 'setLanguage'])->name('set_language_locale');