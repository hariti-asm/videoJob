<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployerRegisterController;



Route::get('/register', function () {
    return view("auth.register");
})->name('register');
Route::post('register', [RegisterController::class, 'create'])->name('register');

Route::get('/', [JobController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create');
Route::post('/jobs/create', [JobController::class, 'store'])->name('job.store');
Route::get('/job/{id}/edit', [JobController::class, 'edit'])->name('job.edit');
Route::post('/job/{id}/edit', [JobController::class, 'update'])->name('job.update');
Route::post('/job/{id}/delete', [JobController::class, 'deleteJob'])->name('job.delete');
Route::get('/jobs/myjobs', [JobController::class, 'myjob'])->name('myjobs');
Route::get('/jobs/alljobs', [JobController::class, 'allJobs'])->name('alljobs');
Route::get('/jobs/applications', [JobController::class, 'applicant'])->name('applicant');
Route::get('/job/{id}/{job}', [JobController::class, 'show'])->name('job.show');
Route::get('/jobs/toggle/{id}', [JobController::class, 'jobToggle'])->name('job.toggle');
Route::get('/company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');
Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');
Route::post('/company/logo', [CompanyController::class, 'logo'])->name('logo');
Route::post('/company/banner', [CompanyController::class, 'banner'])->name('banner');
Route::view('employer/register', 'auth.employer-register')->name('employer.register');
Route::post('employer/register', [EmployerRegisterController::class, 'employerRegister'])->name('empl.register');
Route::get('/post/{id}/{slug}', [DashboardController::class, 'readPost'])->name('adminPostRead');
// Applicant
Route::post('/applications/{id}', [JobController::class, 'apply'])->name('apply');

//Company Routes
Route::get('/company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');
Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');
Route::post('/company/logo', [CompanyController::class, 'logo'])->name('logo');
Route::post('/company/banner', [CompanyController::class, 'banner'])->name('banner');
Route::get('/category/{id}/{slug}', [CategoryController::class, 'index'])->name('category.index');
Route::get('/companies', [CompanyController::class, 'company'])->name('company');
//search Route
Route::get('/jobs/search', [JobController::class, 'searchJobs']);
// Email Route 
Route::post('/job/mail', [EmailController::class, 'send'])->name('mail');










//admin 
// Route::get('/register', function () {
//     return view("auth.register");
// })->name('register');

Route::middleware('admin')->prefix('dashboard')->group(function () { 
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); 
    Route::get('/admins', [DashboardController::class, 'adminlist'])->name('dashboard.admin'); 
    Route::get('/job/show/{id}', [DashboardController::class, 'show'])->name('adminShow');
    Route::get('/jobs', [DashboardController::class, 'getAllJobs'])->name('adminJobs');
    Route::get('/job/create', [DashboardController::class, 'create'])->name('adminCreate');
    Route::post('/job/create', [DashboardController::class, 'jobStore'])->name('adminJobStore');
    Route::get('/job/edit/{id}', [DashboardController::class, 'edit'])->name('adminEdit');
    Route::post('/job/edit/{id}', [DashboardController::class, 'update'])->name('adminUpdate');
    Route::get('/job/featured/{id}', [DashboardController::class, 'jobFetureToggle'])->name('adminJobFeatureToggle');
    Route::get('/job/toggle/{id}', [DashboardController::class, 'jobToggle'])->name('adminJobToggle');

    Route::get('/job/trash', [DashboardController::class, 'jobTrash'])->name('adminJobTrash');
    Route::get('/job/trash/{id}', [DashboardController::class, 'jobRestore'])->name('adminJobRestore');
    Route::post('/job/delete', [DashboardController::class, 'destroy'])->name('adminDelete');
    
    Route::post('/job/trash/permanant', [DashboardController::class, 'jobDeletePermanantly'])->name('adminJobDelPermanent');
    // All Candidates
    Route::get('/candidates', [DashboardController::class, 'getAllCatedidates'])->name('adminCandidates');
    Route::get('/candidate/toggle/{id}', [DashboardController::class, 'candidateToggle'])->name('adminCanToggle');
    
    Route::get('/candidate/edit/{id}', [DashboardController::class, 'editCandidate'])->name('adminEditCan');
    Route::post('/candidate/edit/{id}', [DashboardController::class, 'updateCandidate'])->name('adminCanUpdate');
    
    Route::post('/candidate/delete/{id}', [DashboardController::class, 'destroyCandidate'])->name('adminCanDelete');

    // All Employer
    Route::get('/employers', [DashboardController::class, 'getEmployers'])->name('adminEmployers');
    Route::get('/employer/toggle/{id}', [DashboardController::class, 'employerToggle'])->name('employerToggle');
    
    Route::get('/employer/edit/{id}', [DashboardController::class, 'editEmployer'])->name('adminEditEmp');
    Route::post('/employer/edit/{id}', [DashboardController::class, 'updateEmployer'])->name('adminEmpUpdate');
    
    Route::post('/employer/delete', [DashboardController::class, 'destroyEmployer'])->name('adminEmpDelete');
    // All Categroy
    Route::get('/category', [DashboardController::class, 'getAllCategory'])->name('adminCategory');
    Route::get('/category/create', [DashboardController::class, 'categoryCreate'])->name('adminCatCreate');
    Route::post('/category/create', [DashboardController::class, 'categoryStore'])->name('adminCatStore');
    Route::get('/category/toggle/{id}', [DashboardController::class, 'categoryToggle'])->name('adminCatToggle');
    Route::get('/category/edit/{id}', [DashboardController::class, 'editCategory'])->name('adminEditCat');
    Route::post('/category/edit/{id}', [DashboardController::class, 'updateCategory'])->name('adminCatUpdate');
    Route::post('/category/delete/{id}', [DashboardController::class, 'destroyCategory'])->name('adminCatDelete');

    // All Categroy
    Route::get('/category', [DashboardController::class, 'getAllCategory'])->name('adminCategory');
    Route::get('/category/create', [DashboardController::class, 'categoryCreate'])->name('adminCatCreate');
    Route::post('/category/create', [DashboardController::class, 'categoryStore'])->name('adminCatStore');
    Route::get('/category/toggle/{id}', [DashboardController::class, 'categoryToggle'])->name('adminCatToggle');
    Route::get('/category/edit/{id}', [DashboardController::class, 'editCategory'])->name('adminEditCat');
    Route::post('/category/edit/{id}', [DashboardController::class, 'updateCategory'])->name('adminCatUpdate');
    Route::post('/category/delete/{id}', [DashboardController::class, 'destroyCategory'])->name('adminCatDelete');
    // Posts Route 
    Route::get('/posts', [DashboardController::class, 'getAllPosts'])->name('adminPosts');
    Route::get('/post/create', [DashboardController::class, 'postCreate'])->name('adminPostCreate');
    Route::post('/post/create', [DashboardController::class, 'postStore'])->name('adminPostStore');
    Route::post('/post/destroy', [DashboardController::class, 'postDestroy'])->name('adminPostDestroy');
    Route::get('/post/edit/{id}', [DashboardController::class, 'editPost'])->name('adminPostEdit');
    Route::post('/post/edit/{id}', [DashboardController::class, 'updatePost'])->name('adminPostUpdate');
    Route::get('/post/show/{id}', [DashboardController::class, 'showPost'])->name('adminPostShow');
    
    Route::get('/post/trash', [DashboardController::class, 'postTrash'])->name('adminPostTrash');
    Route::get('/post/trash/{id}', [DashboardController::class, 'postRestore'])->name('adminPostRestore');
    
    Route::post('/post/trash/permanant', [DashboardController::class, 'postDeletePermanantly'])->name('adminPostDelPermanent');
    
    Route::get('/post/toggle/{id}', [DashboardController::class, 'postToggle'])->name('adminPostToggle');
    
    
    // Testimonial Route 
    Route::get('/testimonials', [DashboardController::class, 'testimonials'])->name('adminTestimonials');
    Route::get('/testimonial/create', [DashboardController::class, 'testimonialCreate'])->name('adminTestimonial');
    Route::post('/testimonial/create', [DashboardController::class, 'testimoniStore'])->name('adminTestimoniStore');
    
    Route::get('/testimonial/toggle/{id}', [DashboardController::class, 'testimoniToggle'])->name('adminTestiToggle');
    Route::get('/testimonial/edit/{id}', [DashboardController::class, 'editTestimoni'])->name('adminTestiEdit');
    Route::post('/testimonial/edit/{id}', [DashboardController::class, 'updateTestimoni'])->name('adminTestiUpdate');
    Route::post('/testimonial/delete/{id}', [DashboardController::class, 'destroyTestimoni'])->name('adminTestiDelete');
    
    // Setting route 
    Route::get('/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');



});


// Single post route
Route::get('/post/{id}/{slug}', [DashboardController::class, 'readPost'])->name('adminPostRead');