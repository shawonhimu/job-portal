<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CandidateEducationController;
use App\Http\Controllers\CandidateExperienceController;
use App\Http\Controllers\CandidateOtherController;
use App\Http\Controllers\CandidateProfileController;
use App\Http\Controllers\CandidateSettingController;
use App\Http\Controllers\CandidateTrainingController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyEmployeeController;
use App\Http\Controllers\CompanyJobController;
use App\Http\Controllers\CompanyPageViewController;
use App\Http\Controllers\WebPageController;
use App\Http\Middleware\CompanyAuthMiddleware;
use App\Http\Middleware\EmployeeAuthMiddleware;
use App\Http\Middleware\JWTTokenAuthenticate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
 */

Route::get('profile-photo', [ WebPageController::class, 'getCandidateOnlyPhoto' ])->middleware([ JWTTokenAuthenticate::class ]);

Route::post('candidate-registration', [ CandidateController::class, 'CandidateRegistration' ]);
Route::post('verification-otp', [ CandidateController::class, 'verifyOTP' ]);
Route::post('candidate-login', [ CandidateController::class, 'CandidateLogin' ]);
Route::get('candidate-logout', [ CandidateController::class, 'CandidateLogout' ]);
Route::post('reset-password-otp', [ CandidateController::class, 'sendOTPcode' ]);
Route::post('reset-password', [ CandidateController::class, 'ResetPassword' ])->middleware([ JWTTokenAuthenticate::class ]);
Route::post('regis-photo', [ CandidateController::class, 'uploadRegisPhoto' ])->middleware([ JWTTokenAuthenticate::class ]);

//=================   settings  ===================//

Route::post('/update-profile-photo', [ CandidateSettingController::class, 'updateProfilePicture' ])->middleware([ JWTTokenAuthenticate::class ]);

Route::get('/setting-details', [ CandidateSettingController::class, 'index' ])->middleware([ JWTTokenAuthenticate::class ]);

Route::post('/update-setting-details', [ CandidateSettingController::class, 'updateProfileDetails' ])->middleware([ JWTTokenAuthenticate::class ]);

//================ Profile Details  =================//

//get all profile data for view profile details
Route::get('profile-details', [ CandidateProfileController::class, 'index' ])->middleware([ JWTTokenAuthenticate::class ]);
//Edit form view
Route::get('edit-profile', [ CandidateProfileController::class, 'create' ])->middleware([ JWTTokenAuthenticate::class ]);
//insert or update action
Route::post('profile-details', [ CandidateProfileController::class, 'store' ])->middleware([ JWTTokenAuthenticate::class ]);
//delete profile details
Route::post('delete-profile-details', [ CandidateProfileController::class, 'destroy' ])->middleware([ JWTTokenAuthenticate::class ]);

//================ Candidate Education  =================//

//get all profile data for view profile details
Route::get('education-details', [ CandidateEducationController::class, 'index' ])->middleware([ JWTTokenAuthenticate::class ]);
//Edit form view
Route::get('education', [ CandidateEducationController::class, 'create' ])->middleware([ JWTTokenAuthenticate::class ]);
//insert or update action
Route::post('add-education', [ CandidateEducationController::class, 'store' ])->middleware([ JWTTokenAuthenticate::class ]);
//Get single education data to edit
Route::get('edit-education', [ CandidateEducationController::class, 'edit' ])->middleware([ JWTTokenAuthenticate::class ]);
//update education data
Route::post('edit-education', [ CandidateEducationController::class, 'update' ])->middleware([ JWTTokenAuthenticate::class ]);
//delete profile details
Route::post('delete-education/{id}', [ CandidateEducationController::class, 'destroy' ])->middleware([ JWTTokenAuthenticate::class ]);

//================ Candidate Training  =================//

//get all profile data for view profile details
Route::get('training-details', [ CandidateTrainingController::class, 'index' ])->middleware([ JWTTokenAuthenticate::class ]);
//Edit form view
Route::get('training', [ CandidateTrainingController::class, 'create' ])->middleware([ JWTTokenAuthenticate::class ]);
//insert or update action
Route::post('add-training', [ CandidateTrainingController::class, 'store' ])->middleware([ JWTTokenAuthenticate::class ]);
//Get single training data to edit
Route::get('edit-training', [ CandidateTrainingController::class, 'edit' ])->middleware([ JWTTokenAuthenticate::class ]);
//update training data
Route::get('edit-training', [ CandidateTrainingController::class, 'update' ])->middleware([ JWTTokenAuthenticate::class ]);
//delete profile details
Route::post('delete-training', [ CandidateTrainingController::class, 'destroy' ])->middleware([ JWTTokenAuthenticate::class ]);

//================ Candidate Experience  =================//

//get all profile data for view profile details
Route::get('experience-details', [ CandidateExperienceController::class, 'index' ])->middleware([ JWTTokenAuthenticate::class ]);
//Edit form view
Route::get('experience', [ CandidateExperienceController::class, 'create' ])->middleware([ JWTTokenAuthenticate::class ]);
//insert or update action
Route::post('add-experience', [ CandidateExperienceController::class, 'store' ])->middleware([ JWTTokenAuthenticate::class ]);
//Get single training data to edit
Route::get('edit-experience', [ CandidateExperienceController::class, 'edit' ])->middleware([ JWTTokenAuthenticate::class ]);
//update training data
Route::get('edit-experience', [ CandidateExperienceController::class, 'update' ])->middleware([ JWTTokenAuthenticate::class ]);
//delete profile details
Route::post('delete-experience', [ CandidateExperienceController::class, 'destroy' ])->middleware([ JWTTokenAuthenticate::class ]);

//================ Candidate Skills or Others  =================//

//get all profile data for view profile details
Route::get('skill-details', [ CandidateOtherController::class, 'index' ])->middleware([ JWTTokenAuthenticate::class ]);
//Edit form view
Route::get('skill', [ CandidateOtherController::class, 'create' ])->middleware([ JWTTokenAuthenticate::class ]);
//insert or update action
Route::post('skill', [ CandidateOtherController::class, 'store' ])->middleware([ JWTTokenAuthenticate::class ]);
//delete profile details
Route::post('delete-skill', [ CandidateOtherController::class, 'destroy' ])->middleware([ JWTTokenAuthenticate::class ]);

/*
|--------------------------------------------------------------------------
| API Routes // Company Routes
|--------------------------------------------------------------------------
|
 */

//=================  Company page views   ===============//

Route::get('/company-home', [ CompanyPageViewController::class, 'homePage' ])->name('HomePage')->middleware([ JWTTokenAuthenticate::class ]);
Route::post('/company-registration', [ CompanyController::class, 'CompanyRegistration' ]);
Route::post('/company-login', [ CompanyController::class, 'CompanyLogin' ]);
Route::post('/company-logout', [ CompanyController::class, 'CompanyLogout' ]);
Route::post('/company-verify-otp', [ CompanyController::class, 'verifyOTP' ]);
Route::post('/company-reset-password', [ CompanyController::class, 'ResetPassword' ])->middleware([ CompanyAuthMiddleware::class ]);

//=================  Company page views   ===============//

/*
|----------------------------------------------------------------------------------------------------
|                    Employee Dashboard Routes For Job Post, Edit, Delete
|----------------------------------------------------------------------------------------------------
|
 */

Route::get('/employee-login', [ CompanyEmployeeController::class, 'employeeLoginPage' ])->name('EmployeeLogin');
Route::post('/employee-login', [ CompanyEmployeeController::class, 'employeeLogin' ]);
Route::get('/employee-logout', [ CompanyEmployeeController::class, 'employeeLogout' ])->middleware([ EmployeeAuthMiddleware::class ]);
Route::get('/employee-home', [ CompanyJobController::class, 'employeeHome' ])->name('EmployeeHomePage')->middleware([ EmployeeAuthMiddleware::class ]);
//==================== Company Job All route  for dashboard  ========================//

Route::get('/new-job', [ CompanyJobController::class, 'create' ])->name('AddJobPage')->middleware([ EmployeeAuthMiddleware::class ]);
Route::post('/new-job', [ CompanyJobController::class, 'store' ])->middleware([ EmployeeAuthMiddleware::class ]);
