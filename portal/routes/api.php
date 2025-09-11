<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiraController;

// Cover Note Verification (GET)
Route::get('/tiramis/verify', [TiraController::class, 'verifyCoverNote']);

// Non-Life Other Cover Note Submission (POST)
Route::post('/tiramis/submit/cover-note-ref', [TiraController::class, 'submitCoverNoteRefReq']);

// Non-Life Motor Cover Note Submission (POST)
Route::post('/tiramis/submit/motor-cover-note-ref', [TiraController::class, 'submitMotorCoverNoteRefReq']);

// Motor Fleet Submission (POST)
Route::post('/tiramis/submit/motor-fleet', [TiraController::class, 'submitMotorCoverNoteRefReqWithFleet']);

// Reinsurance Submission (POST)
Route::post('/tiramis/submit/reinsurance', [TiraController::class, 'submitReinsuranceReq']);

// Policy Submission (POST)
Route::post('/tiramis/submit/policy', [TiraController::class, 'submitPolicyReq']);

// Claim Notification (POST)
Route::post('/tiramis/submit/claim-notification', [TiraController::class, 'submitClaimNotificationRefReq']);

// Claim Intimation (POST)
Route::post('/tiramis/submit/claim-intimation', [TiraController::class, 'submitClaimIntimationReq']);

// Claim Assessment (POST)
Route::post('/tiramis/submit/claim-assessment', [TiraController::class, 'submitClaimAssessmentReq']);

// Claim Discharge Voucher (POST)
Route::post('/tiramis/submit/discharge-voucher', [TiraController::class, 'submitDischargeVoucherReq']);

// Claim Payment (POST)
Route::post('/tiramis/submit/claim-payment', [TiraController::class, 'submitClaimPaymentReq']);

// Claim Rejection (POST)
Route::post('/tiramis/submit/claim-rejection', [TiraController::class, 'submitClaimRejectionReq']);
