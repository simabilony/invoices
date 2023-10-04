<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Customers_Report;
use App\Http\Controllers\InvoiceAttachmentsController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoicesController;

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

Route::view('/' , 'auth.login');

Auth::routes();

Route::resource('/invoices' , InvoicesController::class);

Route::resource('/sections' , SectionController::class);

Route::resource('/products' , ProductController::class);

Route::resource('/InvocieAttachments' , InvoiceAttachmentsController::class);

Route::group(['middleware' => ['auth']], function() {

    Route::resource('/roles', RoleController::class);

    Route::resource('/users', UserController::class);

});

Route::get('/InvoicesDetails/{id}' , [InvoicesDetailsController::class , "edit"]);

Route::get('/download/{invoice_number}/{file_name}' , [InvoicesDetailsController::class , "open_file"]);

Route::get('/delete_file' , [InvoicesDetailsController::class , "destroy"])->name('delete_file');

Route::get('/InvoicesDetails/{id}' , [InvoicesDetailsController::class , "edit"]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

///******//////
Route::get('Status_show/{id}' , [InvoicesController::class , 'show'])->name('Status_show');

Route::post('Status_Update/{id}' , [InvoicesController::class , 'Status_Update'])->name('Status_Update');

Route::get('/Invoice_Paid' , [InvoicesController::class , 'invoice_Paid']);

Route::get('/Invoice_UnPaid' , [InvoicesController::class , 'invoice_UnPaid']);

Route::get('/Invoice_Partial' , [InvoicesController::class , 'invoice_Partial']);

Route::get('/Print_invoice/{id}' , [InvoicesController::class , 'print_index']);

Route::get('/sections/{id}' , [InvoicesController::class , "getproducts"]);

/////*****//////
Route::get('/customer_report' , [Customers_Report::class , 'index'])->name('customer_report');

Route::get('/Search_customer' , [Customers_Report::class , 'Search_customers']);

Route::get('/{page}', [AdminController::class , "index"]);
