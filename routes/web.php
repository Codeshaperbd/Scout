<?php

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
Route::get('/', 'Controller@welcome');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'Controller@about')->name('about');
Route::get('/contact', 'ContactMailController@index')->name('contact');
Route::post('/send', 'ContactMailController@send')->name('contact.send');

//pricing
Route::get('/pricing', 'PricingController@pricing')->name('pricing');
Route::get('/subscribe', 'PricingController@store')->name('subscribe');
Route::post('/subscribe', 'PricingController@store')->name('subscribe');


//full service requiring
Route::get('/full_service_recruiting', 'Controller@services')->name('services');


/*-- front end route --*/
Route::get('/console', 'HomeController@dashboard')->name('console');
Route::get('/console-update/{slug}', 'HomeController@update')->name('console_update');
Route::put('/console-update/{slug}', 'HomeController@update')->name('console_update');
Route::get('/how-works-agent', 'Controller@how_works_agent')->name('how-works-agent');
Route::get('/how-works-broker', 'Controller@how_works_broker')->name('how-works-broker');
Route::get('/register-agent', 'Controller@register_agent')->name('register-agent');
Route::get('/register-broker', 'Controller@register_broker')->name('register-broker');


// view single job
Route::get('/jobs', 'Controller@jobs')->name('all_jobs');
Route::get('/job-details/{slug}', 'Controller@job_details')->name('job_details');
Route::put('/job-details/{slug}', 'Controller@job_details')->name('job_details');
// view single job
Route::get('/job-by-state/{state}', 'Controller@job_state')->name('job_state');
Route::get('/all-city', 'Controller@all_location')->name('all_location');

// Applied for this job
Route::get('/job/apply/{status}/{job_id}', 'JobApplyController@apply')->name('job.apply');
Route::post('/job/apply/{status}/{job_id}', 'JobApplyController@apply')->name('job.apply');



// Applied for this job
Route::get('/job-application/{job_slug}', 'JobApplyController@allApplications')->name('job.application');
Route::post('/job-application/{job_slug}', 'JobApplyController@allApplications')->name('job.application');



//Candidate Details
Route::get('/candidate/{agent_id}/{job_title}', 'JobApplyController@candidate')->name('job.candidate');
Route::post('/candidate/{agent_id}/{job_title}', 'JobApplyController@candidate')->name('job.candidate');

//Applied job agent view
Route::get('/job-applied', 'JobApplyController@agentApplied')->name('agent.applied');
/*--------------------------
******* Resume route ****** 
---------------------------*/
Route::get('/create-profile','HomeController@profile_create')->name('profile_create');
Route::resource('myresume', 'ResumeController',['names'=>[

	'index' => 'myresume.index',
	'create' => 'myresume.create',
	'store' => 'myresume.store',
	'edit' => 'myresume.edit',

]]);

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

/*--------------------------
******* Blog ****** 
---------------------------*/
Route::get('/prelicensee_blog','AllBlogsController@prelicensee_blog')->name('prelicensee_blog');
Route::get('/industry_news','AllBlogsController@industry_news')->name('industry_news');
Route::get('/blog-single/{slug}','AllBlogsController@blogSingle')->name('blogSingle');
/*--------------------------
******* FAQ ****** 
---------------------------*/
Route::get('/agent-faq','AllFAQController@agentfaq')->name('agent-faq');
Route::get('/broker-faq','AllFAQController@brokerfaq')->name('broker-faq');


/*--------------------------
******* Broker route ****** 
---------------------------*/
Route::resource('/broker', 'BrokerController');

//country city sate route
Route::get('get-state-list','GetUserLocationController@getStateList');
Route::get('get-city-list','GetUserLocationController@getCityList');


Route::resource('job-manage', 'ManageJobController',['names'=>[

	'index' => 'job.listing',
	'create' => 'job.create',
	'store' => 'job.store',
	'edit' => 'job.edit',

]]);

Route::resource('job-post', 'JobPostController',['names'=>[

	'index' => 'jobpost.index',
	'create' => 'jobpost.create',
	'store' => 'jobpost.store',
	'edit' => 'jobpost.edit',
	'show' => 'jobpost.show',
	'destroy' => 'jobpost.destroy'

]]);

// Applied for this job
Route::get('/allApplied', 'JobApplyController@allApplied')->name('allApplied');
Route::post('/allApplied', 'JobApplyController@allApplied')->name('allApplied');

Route::get('/applications/{status}/{user_id}/{job_title}', 'JobApplyController@applications')->name('applications');
Route::post('/applications/{status}/{user_id}/{job_title}', 'JobApplyController@applications')->name('applications');

//Message Route
Route::resource('inbox', 'MessageController',['names'=>[

	'index' => 'inbox.index',
	'create' => 'inbox.create',
	'show' => 'inbox.show',
	'store' => 'inbox.store',
	'edit' => 'inbox.edit',

]]);

Route::get('messages/{id}','MessageController@messages')->name('messages');
Route::get('unreadMessages','MessageController@unreadMessages')->name('unreadMessages');

/*--------------------------
******* Admin Route ****** 
---------------------------*/



Route::get('admin/dashboard','AdminController@index')->name('admin.dashboard');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@login');
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
Route::get('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::get('/admin-logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::post('/admin-logout', 'Admin\LoginController@logout')->name('admin.logout');



// Manage Job
Route::prefix('admin')->group(function(){ 

	//admin manage jobs Route
	Route::resource('manage-jobs', 'Admin\AdminJobPostingController',['names'=>[

		'index' => 'manage-jobs.index',
		'create' => 'manage-jobs.create',
		'store' => 'manage-jobs.store',
		'show' => 'manage-jobs.show',
		'edit' => 'manage-jobs.edit',
		'destroy' => 'manage-jobs.destroy',

	]]);
	Route::get('/published-job/{id}/{status}', 'Admin\AdminJobPostingController@jobStatus')->name('published-job');
	Route::post('/published-job/{id}/{status}', 'Admin\AdminJobPostingController@jobStatus')->name('published-job');

	Route::get('/company-job-post/{id}', 'Admin\AdminJobPostingController@companyJob')->name('company-job-post');
	Route::post('/company-job-post/{id}', 'Admin\AdminJobPostingController@companyJob')->name('company-job-post');

	//admin manage employe Route

	Route::resource('manage-employe', 'Admin\AdminEmployerController',['names'=>[

		'index' => 'manage-employe.index',
		'create' => 'manage-employe.create',
		'show' => 'manage-employe.show',
		'store' => 'manage-employe.store',
		'edit' => 'manage-employe.edit',
		'destroy' => 'manage-employe.destroy',

	]]);


	//admin manage resume Route
	Route::resource('manage-resumes', 'Admin\AdminResumeController',['names'=>[

		'index' => 'manage-resumes.index',
		'create' => 'manage-resumes.create',
		'show' => 'manage-resumes.show',
		'store' => 'manage-resumes.store',
		'edit' => 'manage-resumes.edit',

	]]);

	//admin manage resume Route
	Route::resource('manage-users', 'Admin\AdminManageUserController',['names'=>[

		'index' => 'manage-users.index',
		'create' => 'manage-users.create',
		'show' => 'manage-users.show',
		'store' => 'manage-users.store',
		'edit' => 'manage-users.edit',

	]]);

	//admin manage resume Route
	Route::get('manage-ecommerch/order/', 'Admin\AdminPricingController@order')->name('ecommerch.order');
	Route::post('manage-ecommerch/order/', 'Admin\AdminPricingController@order')->name('ecommerch.order');
	Route::resource('manage-ecommerch', 'Admin\AdminPricingController',['names'=>[

		'index' => 'manage-ecommerch.index',
		'create' => 'manage-ecommerch.create',
		'show' => 'manage-ecommerch.show',
		'store' => 'manage-ecommerch.store',
		'edit' => 'manage-ecommerch.edit',

	]]);



	Route::get('manage-users/userAccess/{id}', 'Admin\AdminManageUserController@userAccess')->name('userAccess');
	Route::post('manage-users/userAccess/{id}', 'Admin\AdminManageUserController@userAccess')->name('userAccess');


	Route::get('guest-alerts', 'Admin\AdminResumeController@alerts')->name('alerts');




	//admin manage resume Route
	Route::resource('category', 'Admin\AdminCreateCategory');
	Route::resource('blog', 'Admin\AdminCreateBlog');
	Route::resource('faq', 'Admin\AdminFAQController');
});

