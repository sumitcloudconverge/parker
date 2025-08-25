<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DsaController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanApplicationController;
use App\Http\Controllers\LoanDocumentController;

Route::get('/', function () {
return view('welcome');
});

Route::get('/dashboard', function () {
return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->group(function () {
Route::resource('customers', CustomerController::class);
Route::get('customers', [CustomerController::class, 'index'])->name('admin.customers.index');

Route::get('customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
Route::post('customers/create', [CustomerController::class, 'store'])->name('admin.customers.store');
Route::get('customers/{customer}/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
Route::put('customers/{customer}', [CustomerController::class, 'update'])->name('admin.customers.update');
Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');

Route::resource('dsas', DsaController::class);
Route::get('dsas', [DsaController::class, 'index'])->name('admin.dsas.index');
   // Route::get('dsas/create', [DsaController::class, 'create'])->name('admin.dsas.create');
Route::post('dsas', [DsaController::class, 'store'])->name('admin.dsas.store');
Route::get('dsas/{da}/edit', [DsaController::class, 'edit'])->name('admin.dsas.edit');
Route::put('dsas/{da}', [DsaController::class, 'update'])->name('admin.dsas.update');
Route::delete('dsas/{da}', [DsaController::class, 'destroy'])->name('admin.dsas.destroy');

Route::resource('loans', LoanController::class);

Route::resource('loan-applications', LoanApplicationController::class);
Route::resource('loan-documents', LoanDocumentController::class);
Route::get('loan-documents', [LoanDocumentController::class, 'index'])->name('admin.loan-documents.index');
Route::get('loan-documents/create', [LoanDocumentController::class, 'create'])->name('admin.loan-documents.create');
Route::post('loan-documents', [LoanDocumentController::class, 'store'])->name('admin.loan-documents.store');
Route::get('loan-documents/{loan_document}/edit', [LoanDocumentController::class, 'edit'])->   name('admin.loan-documents.edit');
Route::put('loan-documents/{loan_document}', [LoanDocumentController::class, 'update'])->name('admin.loan-documents.update');
Route::delete('loan-documents/{loan_document}', [LoanDocumentController::class, 'destroy'])->name('admin.loan-documents.destroy');
Route::get('loan-applications', [LoanApplicationController::class, 'index'])->name('admin.loan-applications.index');
Route::get('loan-applications/create', [LoanApplicationController::class, 'create'])->name('admin.loan-applications.create');
Route::post('loan-applications', [LoanApplicationController::class, 'store'])->name('admin.loan-applications.store');
Route::get('loan-applications/{loan_application}/edit', [LoanApplicationController::class, 'edit'])->   name('admin.loan-applications.edit');
Route::put('loan-applications/{loan_application}', [LoanApplicationController::class, 'update'])->name('admin.loan-applications.update');
Route::delete('loan-applications/{loan_application}', [LoanApplicationController::class, 'destroy'])->name('admin.loan-applications.destroy');  

});



require __DIR__.'/auth.php';
