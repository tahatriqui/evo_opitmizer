<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\ProductController as aProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\SCategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\CommandController;
use App\Http\Controllers\admin\CategorieController;
use App\Http\Controllers\admin\DeatailController;
use App\Http\Controllers\admin\ParametreController;
use App\Http\Controllers\admin\RegisteredUserController;
use App\Http\Controllers\ContactController;

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

// page about
Route::get('/about',[AboutController::class,'index']);
// page welcome
Route::get('/', [WelcomeController::class,'index']);
//liste de produit pour chaque categorie
Route::get('/product/{id}', [ProductController::class, 'index'])->name('product');
// detail de produit
Route::get('/ProductDetail/{id}',[DetailController::class , 'index'])->name('ProductDetail');
//prendre un ordre pour un produit
Route::get('/form/order/{categoryId}/{productName}',[OrderController::class , 'index'])->name('order');
// liste des category
Route::get('/category', [CategoryController::class, 'liste'])->name('category.liste');
// chercher sur un produit
Route::get('/category/search', [CategoryController::class, 'search'])->name('category.search');
// envoyer les donneés du formulaire d'ordre
Route::post('/form/order', [OrderController::class, 'insert'])->name('order.inser');
// filtrer les produit par category
Route::get('/product/filter/{id}/{cid}/{productname?}', [ProductController::class, 'filter'])->name('product.filter');
// traduction de navbar
Route::get('/translate/change',[ProductController::class,'googleTranslateChange'])->name('translate.change');
// solution page
Route::get('/solution', [SolutionController::class, 'index'])->name('Solution');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);



Route::middleware('auth')->group(function () {

//admin pages
//product
Route::get('/admin/product', [aProductController::class, 'index'])->name('admin.product');
Route::get('/admin/product/ajouter', [aProductController::class, 'ajouter'])->name('admin.ajouter_pro');
Route::post('/product/add', [aProductController::class, 'store'])->name('admin.store');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/product/{id}/edit', [aProductController::class, 'edit'])->name('admin.edit_pro');
Route::delete('/product/{id}', [aProductController::class, 'destroy'])->name('admin.delete_pro');
Route::post('/product/update/{id}', [aProductController::class, 'update'])->name('admin.update_pro');

//commande
Route::get('/admin/command', [CommandController::class, 'index'])->name('admin.cmd');
Route::get('/order/delete/{id}', [CommandController::class, 'destroy'])->name('admin.order.delete');

// categorie
Route::get('/admin/categorie', [CategorieController::class, 'index'])->name('admin.categorie');
Route::get('/admin/categorie/ajouter', [CategorieController::class, 'ajouter'])->name('admin.ajouter_cat');
Route::post('/categorie/add', [CategorieController::class, 'store'])->name('admin.store_cat');
Route::delete('/categorie/{id}', [CategorieController::class, 'destroy'])->name('admin.delete_cat');
Route::get('/categorie/{id}/edit', [CategorieController::class, 'edit'])->name('admin.edit_cat');
Route::post('/categorie/update/{id}', [CategorieController::class, 'update'])->name('admin.update_cat');
Route::get('/admin/scategorie/{id}', [CategorieController::class, 'ajoute_Scategorie'])->name('admin.scategory');
Route::get('/admin/scategorie/delete/{id}', [CategorieController::class, 'delete_scat'])->name('admin.scategory.delete');
Route::get('/admin/scategorie/ajoute/{id}', [CategorieController::class, 'ajoute_scat'])->name('admin.scategory.ajoute_scat');
Route::post('/admin/scategorie/add_scat', [CategorieController::class, 'add_scat'])->name('admin.scategory.add_scat');

//parametre
Route::get('/admin/Parametre', [ParametreController::class, 'index'])->name('admin.Parametre');
Route::get('/admin/Parametre/ajouter', [ParametreController::class, 'ajouter'])->name('admin.ajouter_par');
Route::post('/Parametre/add', [ParametreController::class, 'store'])->name('admin.store_par');
Route::delete('/Parametre/{id}', [ParametreController::class, 'destroy'])->name('admin.delete_par');
Route::get('/Parametre/{id}/edit', [ParametreController::class, 'edit'])->name('admin.edit_par');
Route::post('/Parametre/update/{id}', [ParametreController::class, 'update'])->name('admin.update_par');

//detail
Route::get('/admin/details',[DeatailController::class,"index"])->name('admin.detail');
Route::get('/admin/details/{id}',[DeatailController::class,"delete"])->name('admin.delete');

//profile
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/contact',[ContactController::class, "index"])->name('contact');
Route::post('/contact', [ContactController::class, "send"])->name('contact.send');
require __DIR__.'/auth.php';