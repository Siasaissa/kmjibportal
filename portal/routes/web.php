<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InsuranceQuotationController;
use App\Http\Controllers\Shared\AutocompleteController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\TiraController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

//getQuotationWithRelations

Route::get('/test/tiramis', [TiraController::class, 'submitCoverNoteRefReq']);
Route::get('/tiramis/test/non-motor/{id}', [TiraController::class, 'requestNonMotorCover']);
Route::get('/tiramis/test/save/{id}', [TiraController::class, 'requestNonMotorCovertest']);
// web.php 
Route::get('/quotation/{id}', [TiraController::class, 'getQuotationWithRelations']);


// Registration (guest only)
Route::prefix('Authentication')->group(function () {
    Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [UserController::class, 'register'])->name('register');

    // Login with throttle
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [UserController::class, 'login'])
         ->middleware('throttle:5,1')
         ->name('login');
});

// Logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes (Auth Required)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard Static Pages
    |--------------------------------------------------------------------------
    */
    Route::prefix('dash')->name('dash.')->group(function () {
        Route::view('/index', 'dash.index')->name('index');
        Route::view('/Branches', 'dash.branches')->name('branches');
        Route::view('/Agents', 'dash.Agents')->name('agents');
        Route::view('/Cancellation', 'dash.Cancellation')->name('cancellation');
        Route::view('/Claims', 'dash.Claims')->name('claims');
        Route::view('/Commission', 'dash.Commission')->name('commission');
        Route::view('/Customer', 'dash.Customer')->name('customer');
        Route::view('/Download', 'dash.Download')->name('download');
        Route::view('/input-html', 'dash.input-html')->name('input-html');
        Route::view('/Messages', 'dash.Messages')->name('messages');
        Route::view('/Notification', 'dash.Notification')->name('notification');
        Route::view('/Products', 'dash.Products')->name('products');
        Route::view('/Profoma', 'dash.Profoma')->name('profoma');
        Route::get('/Quotation', [InsuranceQuotationController::class, 'index'])->name('Quotation');
        Route::view('/Quotation1', 'dash.Quotation1')->name('quotation1');
        Route::view('/Quotation2', 'dash.Quotation2')->name('quotation2');
        Route::view('/renewals', 'dash.renewals')->name('renewals');
        Route::view('/Report', 'dash.Report')->name('report');
        Route::view('/reportFormat', 'dash.reportFormat')->name('reportFormat');
        Route::view('/risknote', 'dash.risknote')->name('risknote');
        Route::view('/Setting', 'dash.Setting')->name('setting');
        Route::view('/testpage', 'dash.testpage')->name('testpage');
        Route::view('/textDownload', 'dash.textDownload')->name('textDownload');
        Route::view('/Transaction', 'dash.Transaction')->name('transaction');
    });

    /*
    |--------------------------------------------------------------------------
    | Customers
    |--------------------------------------------------------------------------
    */
    Route::prefix('customers')->name('customers.')->group(function () {
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::post('/', [CustomerController::class, 'store'])->name('store');
        Route::get('/{id}', [CustomerController::class, 'show'])->name('show');
    });

    /*
    |--------------------------------------------------------------------------
    | Receipts
    |--------------------------------------------------------------------------
    */
Route::post('/receipts/store', [ReceiptController::class, 'store'])->name('receipts.store');

    /*
    |--------------------------------------------------------------------------
    | Quotations
    |--------------------------------------------------------------------------
    */
    Route::prefix('Quotation1')->name('Quotation1.')->group(function () {
        Route::get('/create', [InsuranceQuotationController::class, 'create'])->name('create');
        Route::get('/{quotation}', [InsuranceQuotationController::class, 'show'])->name('show');
        Route::get('/{quotation}/documents/{document}/download',
            [InsuranceQuotationController::class, 'downloadDocument'])->name('documents.download');
    });


     Route::post('quotations/store', [InsuranceQuotationController::class, 'store'])->name('quotations.store');

    /*
    |--------------------------------------------------------------------------
    | Autocomplete
    |--------------------------------------------------------------------------
    */
Route::get('/clients/autocomplete', [CustomerController::class, 'autocomplete'])
    ->name('clients.autocomplete');



});





// my route for testing all of this to TIRA to make sure they work as expected

// Cover Note Verification
Route::get('/tiramis/test', [TiraController::class, 'motorVerificationRequest']);

Route::get('/tiramis/verify', [TiraController::class, 'verifyCoverNote']);

// Non-Life Other Cover Note Submission
Route::get('/tiramis/submit/cover-note-ref', [TiraController::class, 'submitCoverNoteRefReq']);

// Non-Life Motor Cover Note Submission
Route::get('/tiramis/submit/motor-cover-note-ref', [TiraController::class, 'submitMotorCoverNoteRefReq']);

// Motor Fleet Submission
Route::get('/tiramis/submit/motor-fleet', [TiraController::class, 'submitMotorCoverNoteRefReqWithFleet']);

// Reinsurance Submission
Route::get('/tiramis/submit/reinsurance', [TiraController::class, 'submitReinsuranceReq']);

// Policy Submission
Route::get('/tiramis/submit/policy', [TiraController::class, 'submitPolicyReq']);

// Claim Notification
Route::get('/tiramis/submit/claim-notification', [TiraController::class, 'submitClaimNotificationRefReq']);

// Claim Intimation
Route::get('/tiramis/submit/claim-intimation', [TiraController::class, 'submitClaimIntimationReq']);

// Claim Assessment
Route::get('/tiramis/submit/claim-assessment', [TiraController::class, 'submitClaimAssessmentReq']);

// Claim Discharge Voucher
Route::get('/tiramis/submit/discharge-voucher', [TiraController::class, 'submitDischargeVoucherReq']);

// Claim Payment
Route::get('/tiramis/submit/claim-payment', [TiraController::class, 'submitClaimPaymentReq']);

// Claim Rejection
Route::get('/tiramis/submit/claim-rejection', [TiraController::class, 'submitClaimRejectionReq']);

Route::get('/tiramis/post', [TiraController::class, 'requestNonMotorCovertes']);
Route::get('/save',[TiraController::class, 'save']);
