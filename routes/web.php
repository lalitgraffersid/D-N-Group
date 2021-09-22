<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
  //  return view('welcome');
//});

//Auth::routes();

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::get('/admin', array('as'=>'admin.login','uses' => 'Admin\LoginController@index'));
Route::POST('/admin/dologin', 'Admin\LoginController@postLogin');

Route::group(['prefix'=> 'admin','middleware' => ['auth']] , function(){
	Route::get('dashboard', ['as'=>'admin.dashboard', 'uses'=>'Admin\DashboardController@index']);
	Route::get('/logout', ['as'=>'admin.logout', 'uses'=>'Admin\LoginController@getLogout']);
});

Route::group(['prefix'=> 'admin','middleware' => ['auth','UserRole']] , function(){
	Route::get('setting/index', ['as'=>'setting.index', 'uses'=>'Admin\SettingController@index']);
    Route::POST('setting/update', ['as'=>'setting.update', 'uses'=>'Admin\SettingController@update']);

	/*actions Start*/
	Route::get('actions/index',['as'=>'actions.index','uses'=>'Admin\ModulesController@index']);
	Route::get('actions/add',['as'=>'actions.add','uses'=>'Admin\ModulesController@actionsAdd']);
	Route::POST('actions/save',['as'=>'actions.save','uses'=>'Admin\ModulesController@actionsSave']);
	Route::get('actions/edit/{id}',['as'=>'actions.edit','uses'=>'Admin\ModulesController@edit']);
	Route::POST('actions/update',['as'=>'actions.update','uses'=>'Admin\ModulesController@update']);
	Route::get('actions/delete/{id}',['as'=>'actions.delete','uses'=>'Admin\ModulesController@delete']);
	/*actions End*/

	/*Section Start*/
	Route::get('sections/index',['as'=>'sections.index','uses'=>'Admin\ModulesController@sectionsList']);
	Route::get('sections/add',['as'=>'sections.add','uses'=>'Admin\ModulesController@sectionsAdd']);
	Route::POST('sections/save',['as'=>'sections.save','uses'=>'Admin\ModulesController@sectionsSave']);
	Route::get('sections/edit/{id}',['as'=>'sections.edit','uses'=>'Admin\ModulesController@sectionsEdit']);
	Route::POST('sections/update',['as'=>'sections.update','uses'=>'Admin\ModulesController@sectionsUpdate']);
	Route::get('sections/delete/{id}',['as'=>'sections.delete','uses'=>'Admin\ModulesController@sectionsDelete']);
	/*Section End*/

	/*Roles Start*/
	Route::get('roles/index',['as'=>'roles.index','uses'=>'Admin\ModulesController@rolesList']);
	Route::get('roles/add',['as'=>'roles.add','uses'=>'Admin\ModulesController@rolesAdd']);
	Route::POST('roles/save',['as'=>'roles.save','uses'=>'Admin\ModulesController@rolesSave']);
	Route::get('roles/edit/{id}',['as'=>'roles.edit','uses'=>'Admin\ModulesController@rolesEdit']);
	Route::POST('roles/update',['as'=>'roles.update','uses'=>'Admin\ModulesController@rolesUpdate']);
	Route::get('roles/delete/{id}',['as'=>'roles.delete','uses'=>'Admin\ModulesController@rolesDelete']);
	/*Roles End*/

    /// Sub Admin start ////
    Route::get('sub_admin/index', ['as'=>'sub_admin.index',  'uses'=>'Admin\SubAdminController@index']);
	Route::get('sub_admin/add', ['as'=>'sub_admin.add',  'uses'=>'Admin\SubAdminController@add']);
	Route::POST('sub_admin/save', ['as'=>'sub_admin.save',  'uses'=>'Admin\SubAdminController@save']);
	Route::get('sub_admin/edit/{id}', ['as'=>'sub_admin.edit',  'uses'=>'Admin\SubAdminController@edit']);
	Route::POST('sub_admin/update', ['as'=>'sub_admin.update','uses'=>'Admin\SubAdminController@update']);
	Route::get('sub_admin/delete/{id}', ['as'=>'sub_admin.delete', 'uses'=>'Admin\SubAdminController@delete']);
	Route::get('sub_admin/set-status/{id}', ['as'=>'sub_admin.status', 'uses'=>'Admin\SubAdminController@set_status']);
     //end subadmin //

  	/// Admin User ////
    Route::get('users/index', ['as'=>'users.index',  'uses'=>'Admin\UserController@index']);
    Route::get('users/add', ['as'=>'users.add', 'uses'=>'Admin\UserController@add']);
    Route::POST('users/save', ['as'=>'users.save', 'uses'=>'Admin\UserController@save']);
    Route::get('users/edit/{id}', ['as'=>'users.edit', 'uses'=>'Admin\UserController@edit']);
    Route::POST('users/update', ['as'=>'users.update', 'uses'=>'Admin\UserController@update']);
    Route::get('users/delete/{id}', ['as'=>'users.delete', 'uses'=>'Admin\UserController@delete']);
    Route::get('users/view/{id}', ['as'=>'users.view', 'uses'=>'Admin\UserController@view']);
    Route::get('users/password/{id}', ['as'=>'users.password', 'uses'=>'Admin\UserController@reset_password']);
    Route::POST('users/password/save', ['as'=>'users.password.save', 'uses'=>'Admin\UserController@savePassword']);
    Route::get('users/status/{id}', ['as'=>'users.status', 'uses'=>'Admin\UserController@status']);
    Route::get('users/view/{id}', ['as'=>'users.view', 'uses'=>'Admin\UserController@view']);
     //end users //



  

   // home_page ////

     Route::get('home_page/index', ['as'=>'home_page.index',  'uses'=>'Admin\HomePageController@index']);
    Route::get('home_page/add', ['as'=>'home_page.add',  'uses'=>'Admin\HomePageController@add']);
    Route::POST('home_page/save', ['as'=>'home_page.save',  'uses'=>'Admin\HomePageController@save']);
    Route::get('home_page/edit/{id}', ['as'=>'home_page.edit', 'uses'=>'Admin\HomePageController@edit']);
    Route::POST('home_page/update', ['as'=>'home_page.update', 'uses'=>'Admin\HomePageController@update']);
    Route::get('home_page/delete/{id}', ['as'=>'home_page.delete', 'uses'=>'Admin\HomePageController@delete']);
    Route::get('home_page/status/{id}', ['as'=>'home_page.status', 'uses'=>'Admin\HomePageController@status']);


  

    Route::get('sponsorship/index', ['as'=>'sponsorship.index',  'uses'=>'Admin\SponsorshipController@index']);
    Route::get('sponsorship/add/{id}', ['as'=>'sponsorship.add',  'uses'=>'Admin\SponsorshipController@add']);

  

    Route::POST('sponsorship/save', ['as'=>'sponsorship.save',  'uses'=>'Admin\SponsorshipController@save']);
    Route::get('sponsorship/edit/{id}', ['as'=>'sponsorship.edit', 'uses'=>'Admin\SponsorshipController@edit']);
    Route::POST('sponsorship/update', ['as'=>'sponsorship.update', 'uses'=>'Admin\SponsorshipController@update']);
    Route::get('sponsorship/delete/{id}', ['as'=>'sponsorship.delete', 'uses'=>'Admin\SponsorshipController@delete']);
    Route::get('sponsorship/status/{id}', ['as'=>'sponsorship.status', 'uses'=>'Admin\SponsorshipController@status']);

    Route::get('sponsorship/image/delete/{id}', ['as'=>'sponsorship.image.delete', 'uses'=>'Admin\SponsorshipController@imageDelete']);  
    


    // About Us ////
    Route::get('about_us/index', ['as'=>'about_us.index',  'uses'=>'Admin\AboutUsController@index']);
    Route::get('about_us/edit/{id}', ['as'=>'about_us.edit', 'uses'=>'Admin\AboutUsController@edit']);
    Route::POST('about_us/update', ['as'=>'about_us.update', 'uses'=>'Admin\AboutUsController@update']);
    Route::get('about_us/image/delete/{id}', ['as'=>'about_us.image.delete', 'uses'=>'Admin\AboutUsController@imageDelete']);



  
   
   // career ////
    Route::get('career/index', ['as'=>'career.index',  'uses'=>'Admin\CareerController@index']);
    Route::get('career/edit/{id}', ['as'=>'career.edit', 'uses'=>'Admin\CareerController@edit']);
    Route::POST('career/update', ['as'=>'career.update', 'uses'=>'Admin\CareerController@update']);
    

   


    /// team ////
    Route::get('team/index', ['as'=>'team.index',  'uses'=>'Admin\TeamController@index']);
    Route::get('team/add', ['as'=>'team.add',  'uses'=>'Admin\TeamController@add']);
    Route::POST('team/save', ['as'=>'team.save',  'uses'=>'Admin\TeamController@save']);
    Route::get('team/edit/{id}', ['as'=>'team.edit', 'uses'=>'Admin\TeamController@edit']);
    Route::POST('team/update', ['as'=>'team.update', 'uses'=>'Admin\TeamController@update']);
    Route::get('team/delete/{id}', ['as'=>'team.delete', 'uses'=>'Admin\TeamController@delete']);
    Route::get('team/status/{id}', ['as'=>'team.status', 'uses'=>'Admin\TeamController@status']);
    Route::get('team/image/delete/{id}', ['as'=>'team.image.delete', 'uses'=>'Admin\TeamController@imageDelete']);




     //services//

    Route::get('services/index', ['as'=>'services.index',  'uses'=>'Admin\ServiceController@index']);
    Route::get('services/add', ['as'=>'services.add',  'uses'=>'Admin\ServiceController@add']);
    Route::POST('services/save', ['as'=>'services.save',  'uses'=>'Admin\ServiceController@save']);
    Route::get('services/edit/{id}', ['as'=>'services.edit', 'uses'=>'Admin\ServiceController@edit']);
    Route::POST('services/update', ['as'=>'services.update', 'uses'=>'Admin\ServiceController@update']);
    Route::get('services/delete/{id}', ['as'=>'services.delete', 'uses'=>'Admin\ServiceController@delete']);
    Route::get('services/status/{id}', ['as'=>'services.status', 'uses'=>'Admin\ServiceController@status']);
    Route::get('services/image/delete/{id}', ['as'=>'services.image.delete', 'uses'=>'Admin\ServiceController@imageDelete']);


  //projects
  
    Route::get('projects/index', ['as'=>'projects.index',  'uses'=>'Admin\ProjectController@index']);
    Route::get('projects/add', ['as'=>'projects.add',  'uses'=>'Admin\ProjectController@add']);
    Route::POST('projects/save', ['as'=>'projects.save',  'uses'=>'Admin\ProjectController@save']);
    Route::get('projects/edit/{id}', ['as'=>'projects.edit', 'uses'=>'Admin\ProjectController@edit']);
    
     Route::get('projectimage/delete/{id}', ['as'=>'projectsimage.delete', 'uses'=>'Admin\ProjectController@deletemultiimage']);
    

    Route::POST('projects/update', ['as'=>'projects.update', 'uses'=>'Admin\ProjectController@update']);
    Route::get('projects/delete/{id}', ['as'=>'projects.delete', 'uses'=>'Admin\ProjectController@delete']);
    Route::get('projects/status/{id}', ['as'=>'projects.status', 'uses'=>'Admin\ProjectController@status']);
    Route::get('projects/image/delete/{id}', ['as'=>'projectsimage.delete', 'uses'=>'Admin\ProjectController@imageDelete']);

   Route::get('projects/image/delete/{id}', ['as'=>'serviceimage.delete', 'uses'=>'Admin\ServiceController@imageDelete']);
   

    /// Gallery ////
    Route::get('gallery/index', ['as'=>'gallery.index',  'uses'=>'Admin\GalleryController@index']);
    Route::get('gallery/add', ['as'=>'gallery.add',  'uses'=>'Admin\GalleryController@add']);
    Route::POST('gallery/save', ['as'=>'gallery.save',  'uses'=>'Admin\GalleryController@save']);
    Route::get('gallery/edit/{id}', ['as'=>'gallery.edit', 'uses'=>'Admin\GalleryController@edit']);
    Route::POST('gallery/update', ['as'=>'gallery.update', 'uses'=>'Admin\GalleryController@update']);
    Route::get('gallery/delete/{id}', ['as'=>'gallery.delete', 'uses'=>'Admin\GalleryController@delete']);
    Route::get('gallery/status/{id}', ['as'=>'gallery.status', 'uses'=>'Admin\GalleryController@status']);

     //jobs//

    Route::get('jobs/index', ['as'=>'jobs.index',  'uses'=>'Admin\JobController@index']);
    Route::get('jobs/add', ['as'=>'jobs.add',  'uses'=>'Admin\JobController@add']);
    Route::POST('jobs/save', ['as'=>'jobs.save',  'uses'=>'Admin\JobController@save']);
    Route::get('jobs/edit/{id}', ['as'=>'jobs.edit', 'uses'=>'Admin\JobController@edit']);
    Route::POST('jobs/update', ['as'=>'jobs.update', 'uses'=>'Admin\JobController@update']);
    Route::get('jobs/delete/{id}', ['as'=>'jobs.delete', 'uses'=>'Admin\JobController@delete']);
    Route::get('jobs/status/{id}', ['as'=>'jobs.status', 'uses'=>'Admin\JobController@status']);


   
   /// Contacts ////
    Route::get('contacts/index', ['as'=>'contacts.index',  'uses'=>'Admin\ContactController@index']);
    Route::get('contacts/view/{id}', ['as'=>'contacts.view', 'uses'=>'Admin\ContactController@view']);
    Route::get('contacts/delete/{id}', ['as'=>'contacts.delete', 'uses'=>'Admin\ContactController@delete']);
    
     Route::get('career/index', ['as'=>'career.index',  'uses'=>'Admin\CareerController@index']);
    

    Route::get('career/delete/{id}', ['as'=>'career.delete',  'uses'=>'Admin\CareerController@delete']);
    
    Route::get('career/view/{id}', ['as'=>'career.view', 'uses'=>'Admin\CareerController@view']); 
    
    
    
     //category
  
    Route::get('category/index', ['as'=>'category.index',  'uses'=>'Admin\CategoryController@index']);
    Route::get('category/add', ['as'=>'category.add',  'uses'=>'Admin\CategoryController@add']);
    Route::POST('category/save', ['as'=>'category.save',  'uses'=>'Admin\CategoryController@save']);
    Route::get('category/edit/{id}', ['as'=>'category.edit', 'uses'=>'Admin\CategoryController@edit']);
    
     
    

    Route::POST('category/update', ['as'=>'category.update', 'uses'=>'Admin\CategoryController@update']);
    Route::get('category/delete/{id}', ['as'=>'category.delete', 'uses'=>'Admin\CategoryController@delete']);
    Route::get('category/status/{id}', ['as'=>'category.status', 'uses'=>'Admin\CategoryController@status']);
    

   
    
    




});


//=============================================================================================
/*Front Routes*/





Route::get('/', ['as'=>'home',  'uses'=>'Front\HomeController@index']);



Route::get('job/all', ['as'=>'job.all',  'uses'=>'Front\HomeController@alljob']);

Route::get('careerapply/{id}', ['as'=>'careerapply', 'uses'=>'Front\HomeController@careerapply']);

Route::get('career', ['as'=>'career',  'uses'=>'Front\ContactController@career']
);

Route::POST('career/save', ['as'=>'career.save',  'uses'=>'Front\ContactController@careerSave']);




Route::get('service/all', ['as'=>'services.all',  'uses'=>'Front\HomeController@allservices']);

Route::get('project/all', ['as'=>'project.all',  'uses'=>'Front\HomeController@allproject']);

Route::get('about', ['as'=>'about',  'uses'=>'Front\HomeController@about']);

Route::get('sponsorship', ['as'=>'sponsorship',  'uses'=>'Front\HomeController@sponsorship']);

Route::get('team', ['as'=>'team',  'uses'=>'Front\HomeController@team']);

 Route::get('projectdetail/{id}', ['as'=>'projectdetail', 'uses'=>'Front\HomeController@projectdetail']);

 Route::get('servicedetail/{id}', ['as'=>'servicedetail', 'uses'=>'Front\HomeController@servicedetail']);
 

Route::get('gallery', ['as'=>'gallery',  'uses'=>'Front\HomeController@gallery']);


 Route::get('contactus', ['as'=>'contactus',  'uses'=>'Front\ContactController@contact_us']
 );


Route::POST('contact/save', ['as'=>'contact.save',  'uses'=>'Front\ContactController@contactSave']
);


 
 Route::get('refresh_captcha', 'Front\ContactController@refreshCaptcha')->name('refresh_captcha');
 
Route::get('privacy', ['as'=>'privacy',  'uses'=>'Front\ContactController@privacy']
);
