<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['namespace' => 'User'],function(){

	Route::get('/','HomeController@index');

});


	Route::get('/sevice-details/{id}','HomeController@serviceDetails')->name('user.service_details');
	Route::get('/project-details/{id}','HomeController@featureDetails')->name('user.project_details');
	Route::get('/Projects-details/{id}','HomeController@blogDetails')->name('user.blog_details');
	Route::get('/recent-Projects/','HomeController@recentPr')->name('user.recent');
	Route::get('/menu-details/{id}','HomeController@menuDetails')->name('user.single_menu');
	Route::get('/submenu-details/{id}','HomeController@submenuDetails')->name('user.single_submenu');
	Route::get('/Projects/','HomeController@blogSingle')->name('user.single_blog');
	Route::get('/features/','HomeController@featureSingle')->name('user.single_feature');
	Route::get('/contacts/','HomeController@contactsDetails')->name('user.contacts');
	Route::get('/about/','HomeController@aboutDetails')->name('user.about');
	Route::get('/privacy-policy/','HomeController@privacypolicyDetails')->name('user.privacy_policy');
	Route::post('/subscriber','Admin\SubscriberController@store')->name('sub-store');
	Route::post('/contacts-email', 'Admin\SubscriberController@contactEmail')->name('user.contactEmail');
	Route::get('/search', 'SearchController@search')->name('search.title');
	Route::get('/advance-search', 'SearchController@adSearch')->name('advance.search');

	Route::get('/category/{id}','HomeController@getCategory')->name('user.blog.categorywise');



//Admin Route

Route::group(['namespace' => 'Admin'],function(){

 	Route::group(['middleware' => 'auth:admin'],function(){

	 	Route::get('admin/home', 'HomeController@index')->name('admin.home');
	 	Route::post('admin/logout', 'HomeController@adminLogout')->name('admin.logout');

	 	//Profile Password Route
	 	Route::get('admin/password', 'ProfileController@index')->name('profile.index');
	 	Route::put('admin/password-update', 'ProfileController@passwordUpdate')->name('profile.passwordUpdate');

	 	//Profile Route
	 	Route::get('admin/profile', 'ProfileController@profileIndex')->name('profile.profileIndex');
	 	Route::put('admin/profile-update', 'ProfileController@profileUpdate')->name('profile.profileUpdate');

	 	//Route Logo
	 	Route::get('admin/logo', 'GeneralController@indexLogo')->name('logo.index');
	 	Route::put('admin/logo', 'GeneralController@updateLogo')->name('logo.updateLogo');
	 	Route::put('admin/icon', 'GeneralController@updateIcon')->name('logo.updateIcon');

	 	//Route Breadcrums
	 	Route::get('admin/breadcrumbs', 'GeneralController@indexBreadcrumbs')->name('breadcrumbs.index');
	 	Route::put('admin/menu-image', 'GeneralController@updateMenuimage')->name('breadcrumbs.updateMenuimage');
	 	Route::put('admin/about-bg-image', 'GeneralController@updateAboutimage')->name('breadcrumbs.updateAboutimage');
	 	Route::put('admin/contact-image', 'GeneralController@updateContactimage')->name('breadcrumbs.updateContactimage');

	 	//Route About
	 	Route::get('admin/about', 'GeneralController@indexAbout')->name('about.index');
	 	Route::put('admin/about-image', 'GeneralController@updateAbout')->name('about.updateAbout');

	 	//Route Contact
	 	Route::get('admin/contact', 'GeneralController@indexContact')->name('contact.index');


	 	//Route Send Email
	 	Route::get('admin/send-email', 'SubscriberController@indexSendemail')->name('send_email.index');
	 	Route::post('admin/email', 'SubscriberController@sendEmail')->name('send_email.sendEmail');

	 	//Route Privacy Policy
	 	Route::get('admin/Privacy-Policy', 'GeneralController@indexPrivacypolicy')->name('privacy_policy.index');

		//Menu Route
	 	Route::resource('admin/menu','MenuController');

	 	//Sub Menu Route
		Route::resource('admin/sub_menu','SubMenuController');

		//Slider Route
		Route::resource('admin/slider','SliderController');

		//Permission Route
		Route::resource('admin/work','WorkController');

		//Post Route
		Route::resource('admin/service','ServiceController');

		//Tag Route
		Route::resource('admin/company','CompanyController');

		//Category Route
		Route::resource('admin/testimonial','TestimonialController');

		//Feature Route
		Route::resource('admin/feature','FeatureController');

		//Partner Route
		Route::resource('admin/partner','PartnerController');

		//Blog Route
		Route::resource('admin/blog','BlogController');
		Route::post('admin/student/batchwise','BlogController@ajaxGetstudent')->name('get.batchwise.student');
		Route::get('admin/fileDelete/{id}','BlogController@fileDel')->name('get.fileDelete');

		//Category Route
		Route::resource('admin/category','CategoryController');
		Route::get('/categorys/{id}','CategoryController@getCat')->name('use.cat.category');

		//Social Route
		Route::resource('admin/social','SocialController');

		//General Route
		Route::resource('admin/general','GeneralController');

		//Counter Route
		Route::resource('admin/counter','CounterController');

		//Subscriber Route
		Route::resource('admin/subscriber','SubscriberController');

		//Batch Route
		Route::resource('admin/batch','BatchController');

		//Student Route
		Route::resource('admin/student','StudentController');

		//Search
		Route::get('admin/search-project', 'SearchProjectController@searchPro')->name('search.project');


	});

	//Auth Route

	Route::get('admin/', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin/', 'Auth\LoginController@login');

});
	Auth::routes();

