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
use App\Http\Controllers\WebJobController;
use App\Http\Controllers\WebPageController;
use App\Http\Middleware\CompanyAuthMiddleware;
use App\Http\Middleware\EmployeeAuthMiddleware;
use App\Http\Middleware\JWTTokenAuthenticate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|                       Web Routes For Candidate
|--------------------------------------------------------------------------
|
 */

//=============   Pages view route    ================//

Route::get('/', [ WebPageController::class, 'homePage' ])->name('Index');
Route::get('/about', [ WebPageController::class, 'aboutPage' ])->name('AboutPage');
Route::get('/blog', [ WebPageController::class, 'blogPage' ])->name('BlogPage');
Route::get('/contact', [ WebPageController::class, 'contactPage' ])->name('ContactPage');
Route::get('/job', [ WebPageController::class, 'jobPage' ])->name('JobPage');
Route::get('/candidate-login', [ WebPageController::class, 'loginPage' ])->name('LoginPage');
Route::get('/candidate-registration', [ WebPageController::class, 'registrationPage' ])->name('RegistrationPage');
Route::get('/verification-otp', [ WebPageController::class, 'otpVerifyPage' ])->name('RegisOTPVerifyPage');
Route::get('/regis-photo', [ WebPageController::class, 'registPhotoPage' ])->name('RegisPhotoPage');
Route::get('profile-photo', [ WebPageController::class, 'getCandidateOnlyPhoto' ])->middleware([ JWTTokenAuthenticate::class ]);

//===========       After login pages   ==============//

Route::get('/activity', [ WebPageController::class, 'activityPage' ])->name('LoginPage');
Route::get('/profile', [ WebPageController::class, 'profilePage' ])->name('ProfilePage');
Route::get('/edit-profile', [ WebPageController::class, 'editProfilePage' ])->name('EditProfilePage');

//=============   Login, Registration, Authentication  ===========//

Route::post('candidate-registration', [ CandidateController::class, 'CandidateRegistration' ]);
Route::post('verification-otp', [ CandidateController::class, 'verifyOTP' ]);
Route::post('candidate-login', [ CandidateController::class, 'CandidateLogin' ]);
Route::get('candidate-logout', [ CandidateController::class, 'CandidateLogout' ]);
Route::post('reset-password-otp', [ CandidateController::class, 'sendOTPcode' ]);
Route::post('reset-password', [ CandidateController::class, 'ResetPassword' ])->middleware([ JWTTokenAuthenticate::class ]);
Route::post('regis-photo', [ CandidateController::class, 'uploadRegisPhoto' ])->middleware([ JWTTokenAuthenticate::class ]);

//================   Settings =======================//

Route::get('/setting', [ WebPageController::class, 'settingPage' ])->name('SettingPage')->middleware([ JWTTokenAuthenticate::class ]);
Route::post('/update-profile-photo', [ CandidateSettingController::class, 'updateProfilePicture' ])->middleware([ JWTTokenAuthenticate::class ]);
Route::post('/setting-details', [ CandidateSettingController::class, 'index' ])->middleware([ JWTTokenAuthenticate::class ]);
Route::post('/update-setting-details', [ CandidateSettingController::class, 'updateProfileDetails' ])->middleware([ JWTTokenAuthenticate::class ]);
Route::post('/update-candidate-password', [ CandidateSettingController::class, 'updateProfilePassword' ])->middleware([ JWTTokenAuthenticate::class ]);

//================ Profile Details  =================//

//get all profile data for view profile details
Route::get('profile-details', [ CandidateProfileController::class, 'index' ])->middleware([ JWTTokenAuthenticate::class ]);
//Edit form view
Route::get('edit-details', [ CandidateProfileController::class, 'show' ])->middleware([ JWTTokenAuthenticate::class ]);
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
Route::get('edit-education/{id}', [ CandidateEducationController::class, 'edit' ])->middleware([ JWTTokenAuthenticate::class ]);
//update education data
Route::post('edit-education', [ CandidateEducationController::class, 'update' ])->middleware([ JWTTokenAuthenticate::class ]);
//delete profile details
Route::get('delete-education/{id}', [ CandidateEducationController::class, 'destroy' ])->middleware([ JWTTokenAuthenticate::class ]);

//================ Candidate Training  =================//

//get all profile data for view profile details
Route::get('training-details', [ CandidateTrainingController::class, 'index' ])->middleware([ JWTTokenAuthenticate::class ]);
//Edit form view
Route::get('training', [ CandidateTrainingController::class, 'create' ])->middleware([ JWTTokenAuthenticate::class ]);
//insert or update action
Route::post('add-training', [ CandidateTrainingController::class, 'store' ])->middleware([ JWTTokenAuthenticate::class ]);
//Get single training data to edit
Route::get('edit-training/{id}', [ CandidateTrainingController::class, 'edit' ])->middleware([ JWTTokenAuthenticate::class ]);
//update training data
Route::post('edit-training', [ CandidateTrainingController::class, 'update' ])->middleware([ JWTTokenAuthenticate::class ]);
//delete profile details
Route::get('delete-training/{id}', [ CandidateTrainingController::class, 'destroy' ])->middleware([ JWTTokenAuthenticate::class ]);

//================ Candidate Experience  =================//

//get all profile data for view profile details
Route::get('experience-details', [ CandidateExperienceController::class, 'index' ])->middleware([ JWTTokenAuthenticate::class ]);
//Edit form view
Route::get('experience', [ CandidateExperienceController::class, 'create' ])->middleware([ JWTTokenAuthenticate::class ]);
//insert or update action
Route::post('add-experience', [ CandidateExperienceController::class, 'store' ])->middleware([ JWTTokenAuthenticate::class ]);
//Get single training data to edit
Route::get('edit-experience/{id}', [ CandidateExperienceController::class, 'edit' ])->middleware([ JWTTokenAuthenticate::class ]);
//update training data
Route::post('edit-experience', [ CandidateExperienceController::class, 'update' ])->middleware([ JWTTokenAuthenticate::class ]);
//delete profile details
Route::get('delete-experience/{id}', [ CandidateExperienceController::class, 'destroy' ])->middleware([ JWTTokenAuthenticate::class ]);

//================ Candidate Skills or Others  =================//

//get all profile data for view profile details
Route::get('skill-details', [ CandidateOtherController::class, 'index' ])->middleware([ JWTTokenAuthenticate::class ]);
//Edit form view
// Route::get('skill', [ CandidateOtherController::class, 'create' ])->middleware([ JWTTokenAuthenticate::class ]);
//insert or update action
Route::post('skill', [ CandidateOtherController::class, 'store' ])->middleware([ JWTTokenAuthenticate::class ]);
//delete profile details
Route::post('delete-skill', [ CandidateOtherController::class, 'destroy' ])->middleware([ JWTTokenAuthenticate::class ]);

/*
|--------------------------------------------------------------------------
|                       Web Routes For Jobs
|--------------------------------------------------------------------------
|
 */
Route::get('web-job', [ WebJobController::class, 'getJobList' ]);
Route::get('job-category-list', [ WebJobController::class, 'getCategoryList' ]);
Route::get('joblist-all-category', [ WebJobController::class, 'getAllCategoryJob' ]);
Route::get('joblist-by-category/{id}', [ WebJobController::class, 'getJobByCategoryID' ]);

// For page and with paginate

Route::get('joblist-all', [ WebJobController::class, 'getAllCategoryJobForPage' ]);
Route::get('job-list-by-category/{id}', [ WebJobController::class, 'getJobByCategoryIDForPage' ]);

/*
|--------------------------------------------------------------------------
|                          Web Routes For Company
|--------------------------------------------------------------------------
|
 */

//=================  Company page views   ===============//

Route::get('/company-login', [ CompanyPageViewController::class, 'loginPage' ])->name('CompanyLoginPage');
Route::get('/company-registration', [ CompanyPageViewController::class, 'registrationPage' ])->name('CompanyRegistrationPage');
Route::get('/company-otp', [ CompanyPageViewController::class, 'verifyOtpPage' ])->name('CompanyOtpPage');
Route::get('/company-logo', [ CompanyPageViewController::class, 'logoPage' ])->name('CompanyLogoPage')->middleware([ CompanyAuthMiddleware::class ]);

//=================  Company authentication routes   ===============//

Route::post('/company-registration', [ CompanyController::class, 'CompanyRegistration' ]);
Route::post('/company-login', [ CompanyController::class, 'CompanyLogin' ]);
Route::get('/company-logout', [ CompanyController::class, 'CompanyLogout' ]);
Route::post('/company-verify-otp', [ CompanyController::class, 'verifyOTP' ]);
Route::post('/company-reset-password', [ CompanyController::class, 'ResetPassword' ])->middleware([ CompanyAuthMiddleware::class ]);
Route::post('/company-logo', [ CompanyController::class, 'uploadCompanyRegisPhoto' ])->middleware([ CompanyAuthMiddleware::class ]);

//=================  Company page views   ===============//

/*
|--------------------------------------------------------------------------
|                    Company Dashboard Routes For Views
|--------------------------------------------------------------------------
|
 */

Route::get('/company-home', [ CompanyPageViewController::class, 'homePage' ])->name('HomePage')->middleware([ CompanyAuthMiddleware::class ]);
//==================== Company Job All route  for dashboard  ========================//
Route::get('/company-job', [ CompanyJobController::class, 'index' ])->name('JobListPage')->middleware([ CompanyAuthMiddleware::class ]);
Route::get('/edit-company-job/{id}', [ CompanyJobController::class, 'edit' ])->middleware([ CompanyAuthMiddleware::class ]);
Route::post('/edit-company-job', [ CompanyJobController::class, 'update' ])->middleware([ CompanyAuthMiddleware::class ]);
Route::get('/delete-company-job', [ CompanyJobController::class, 'update' ])->middleware([ CompanyAuthMiddleware::class ]);
//====================  Company Employee All routes =======================//

Route::get('/company-employee', [ CompanyEmployeeController::class, 'index' ])->name('EmployeeListPage')->middleware([ CompanyAuthMiddleware::class ]);
Route::get('/new-employee', [ CompanyEmployeeController::class, 'create' ])->name('AddEmployeebPage')->middleware([ CompanyAuthMiddleware::class ]);
Route::post('/new-employee', [ CompanyEmployeeController::class, 'store' ])->middleware([ CompanyAuthMiddleware::class ]);
Route::get('/edit-company-employee/{id}', [ CompanyEmployeeController::class, 'edit' ])->middleware([ CompanyAuthMiddleware::class ]);
Route::post('/edit-company-employee', [ CompanyEmployeeController::class, 'update' ])->middleware([ CompanyAuthMiddleware::class ]);
Route::get('/delete-company-employee', [ CompanyEmployeeController::class, 'update' ])->middleware([ CompanyAuthMiddleware::class ]);

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

Route::get('/employee-job', [ CompanyJobController::class, 'index' ])->name('JobListPage')->middleware([ EmployeeAuthMiddleware::class ]);
Route::get('/new-job', [ CompanyJobController::class, 'create' ])->name('AddJobPage')->middleware([ EmployeeAuthMiddleware::class ]);
Route::post('/new-job', [ CompanyJobController::class, 'store' ])->middleware([ EmployeeAuthMiddleware::class ]);
Route::get('/edit-job/{id}', [ CompanyJobController::class, 'edit' ])->middleware([ EmployeeAuthMiddleware::class ]);
Route::post('/edit-job', [ CompanyJobController::class, 'update' ])->middleware([ EmployeeAuthMiddleware::class ]);
