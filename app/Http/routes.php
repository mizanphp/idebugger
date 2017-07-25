<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Dashboard Routes

Route::get('/admin','DashboardsController@admin_index');
Route::post('/admin/login/action','DashboardsController@admin_login_action');
Route::get('/admin/dashboard','DashboardsController@admin_dashboard');



/*Route::get('/', function () {
    return view('index');
});*/
Route::get('/','PagesController@index');

//Route::get('/','PagesController@country');



// Organizations Routes

Route::get('/admin/organizations','OrganizationsController@admin_index');
Route::get('/admin/organizations/details/{id}','OrganizationsController@admin_details');
Route::get('/organizations','OrganizationsController@index');
Route::get('/organizations/create','OrganizationsController@create');
Route::post('/organizations/store','OrganizationsController@store');
Route::get('/organizations/show/{id}','OrganizationsController@show');
Route::get('organizations/email','OrganizationsController@is_user_available');

//Route::resource('/organizations','OrganizationsController');


// Employee Routes
Route::get('/admin/employees/details/{id}','EmployeesController@admin_details');
Route::get('/employees/organization_employees/{id}','EmployeesController@organization_employees');
Route::get('/employees/create/{id}','EmployeesController@create'); // organization id
Route::get('/admin/employees', 'EmployeesController@admin_index');
Route::resource('/employees','EmployeesController');

/*
 * Designations Routes
 */

Route::get('/admin/designations','DesignationsController@admin_index');
Route::get('/admin/designations/create','DesignationsController@admin_create');
Route::post('/admin/designations/store','DesignationsController@admin_store');
Route::get('/admin/designations/edit/{id}','DesignationsController@admin_edit');
Route::post('/admin/designations/update/{id}','DesignationsController@admin_update');
Route::get('/admin/designations/delete/{id}','DesignationsController@admin_delete');


/*
 * JobsCategories Routes
 */

//Route::get('/','jobscategoriesController@index');
Route::get('/admin/jobscategories','jobscategoriesController@admin_index');
Route::get('/admin/jobscategories/create','jobscategoriesController@admin_create');
Route::post('/admin/jobscategories/store','jobscategoriesController@admin_store');
Route::get('/admin/jobscategories/edit/{id}','jobscategoriesController@admin_edit');
Route::post('/admin/jobscategories/update/{id}','jobscategoriesController@admin_update');
Route::get('/admin/jobscategories/delete/{id}','jobscategoriesController@admin_delete');



// Feedback routes

Route::get('/feedbacks/feedback_create','FeedbacksController@feedback_create');
Route::post('/feedbacks/store','FeedbacksController@store');

Route::get('/feedbacks/feedbackorg','FeedbacksController@feedbackOrg');
Route::post('/feedbacks/feedbackorg','FeedbacksController@storeOrg');


// Extra routes
Route::get('/photos','PhotosController@create');
Route::get('/uploadFile','PhotosController@uploadFile');


Route::get('model',function(){
    $orgs = App\employees::all();
    foreach($orgs as $org){
      echo $org->salary . "User First name". $org->Organizations."<br>" ;
    }
});

Route::get('test/{id}/organization/{org_id}',function($id,$org_id){
    return $id.'Organizations ID :'.$org_id;

});


Route::get('/ok',function(){
    return view('welcome');
});


Route::get('employ_details',function(){
    return view('employ_details');
});




//Contact us Route

Route::get('contact',
    ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact',
    ['as' => 'contact_store', 'uses' => 'AboutController@store']);




// Auth Route customizations


/*Route::get('/home', function () {
    if(Auth::guest()){
        return Redirect::to('auth/login');
    }else{
        echo 'Welcome to our user '. Auth::user()->email . '.';
    }

});*/

// Test auth routes

Route::get('auth/email', 'Auth\AuthController@is_user_available');
Route::get('auth/register', 'Auth\AuthController@country');

// Admin routes

Route::get('/admin/auth/','Auth\AuthController@admin_index');
Route::get('/admin/auth/details/{id}','Auth\AuthController@admin_details');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');









