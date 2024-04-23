
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\EmployerRegisterController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


require __DIR__.'/auth.php';


Route::view('demo', 'demo');
Route::post('/video/{video}/transcribe', [VideoController::class, 'transcribe'])->name('video.transcribe');
 Route::post('/store', [VideoController::class, 'store'])->name('video.store');

Route::post('/save', function (Request $request) {
    $path =  \Storage::disk('public')->put('videos',$request->video);
    $url = \Storage::disk('public')->url($path);
    return $url;
});

Route::get('/records/{job}', [JobController::class, 'record'])->name('apply.automatic');

Route::get('/videos',function(){
    return view('videos');
});
Route::get('/videos', [VideoController::class, 'index']);


// Home Routes
Route::get('/', [JobController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/appliedJobs', [HomeController::class, 'appliedJobs'])->name('appliedJobs');


Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create');
Route::post('/jobs/create', [JobController::class, 'store'])->name('job.store');
Route::get('/job/{id}/edit', [JobController::class, 'edit'])->name('job.edit');
Route::post('/job/{id}/edit', [JobController::class, 'update'])->name('job.update');
Route::post('/job/{id}/delete', [JobController::class, 'deleteJob'])->name('job.delete');
Route::get('/jobs/myjobs', [JobController::class, 'myjob'])->name('myjobs');
Route::get('/jobs/alljobs', [JobController::class, 'allJobs'])->name('alljobs');
Route::get('/jobs/applications/{job}', [JobController::class, 'applicants'])->name('applicant');
Route::get('/applicants/application_data/{user}', [JobController::class, 'applicant_data'])->name('applicant_data');

Route::get('/job/{id}/{job}', [JobController::class, 'show'])->name('job.show');
Route::get('/jobs/toggle/{id}', [JobController::class, 'jobToggle'])->name('job.toggle');


// user profile ->middleware('seeker')
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('seeker')->group(function () {
    Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::post('/user/profile/create', [UserProfileController::class, 'store'])->name('profile.create');
    Route::post('/user/coverletter', [UserProfileController::class, 'coverletter'])->name('cover.letter');
    Route::post('/user/resume', [UserProfileController::class, 'resume'])->name('resume');
    Route::post('/user/avatar', [UserProfileController::class, 'avatar'])->name('avatar');
});

// Company 
Route::get('/company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');
Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');
Route::post('/company/logo', [CompanyController::class, 'logo'])->name('logo');
Route::post('/company/banner', [CompanyController::class, 'banner'])->name('banner');
// Employer 
Route::view('employer/', 'auth.employer-register')->name('employer.register');

Route::post('employer/register', [EmployerRegisterController::class, 'employerRegister'])->name('empl.register');

Route::get('/pdf', [EmployerRegisterController::class, 'pdf'])->name('pdf');

Route::get('employer/users',[RecruiterController::class,'index'])->name('recruiter.index');
// Applicant
Route::post('jobfinder/applications/{id}', [JobController::class, 'apply'])->name('apply');

// Save job or unsave job
Route::post('/save/{id}', [FavoriteController::class, 'saveJob']);
Route::post('/unsave/{id}', [FavoriteController::class, 'unSaveJob']);

// Search route 
Route::get('/jobs/search', [JobController::class, 'searchJobs']);

// Category route 
Route::get('/category/{id}/{slug}', [CategoryController::class, 'index'])->name('category.index');

// Company route



Route::get('/companies', [CompanyController::class, 'company'])->name('company');

// Email Route 
Route::post('/job/mail', [EmailController::class, 'send'])->name('mail');
Route::post('/job/confirm', [EmailController::class, 'confirm'])->name('sendConfirmation');
Route::post('/job/reject', [EmailController::class, 'reject'])->name('reject');

Route::get('/post/{id}/{slug}', [DashboardController::class, 'readPost'])->name('adminPostRead');
