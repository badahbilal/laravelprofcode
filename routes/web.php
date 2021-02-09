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

Route::get('/', function () {
    return view('welcome');
})->name('home');


//========================================================================
//========================================================================
//========================================================================
//========================================================================
//========================================================================

//**** Test Name Space
//Route::get("/testNameSpace", "UserController@showAdmin");
Route::namespace("TestNameSpace")->prefix("TestNameSpace")->group(function (){

    Route::get("/testNameSpace", "UserController@showAdmin");

});

Route::group(["namespace" =>"Front","prefix"=>"Front"],function (){

    Route::get("/testNameSpaceFront", "UserController@showAdmin");

});

//========================================================================
//========================================================================
//========================================================================
//========================================================================
//========================================================================




Route::get('/test1', function () {
    return "Welcome";
})->name("test1");


//route parameters


// require parameter
Route::get('/show-number/{id}', function ($id) {
    return $id;
})->name('number');


// optional parameter
Route::get('/show-string/{id?}', function ($id) {
    return "welcome";
})->name("string");


// Route namespace

Route::namespace("Front")->group(function () {

    // All route  can access controller or methods in folder names Front

    Route::get("userAdmin", "UserController@showAdmin");
});


//Route Prefix

/*Route::prefix("users")->group( function(){

    Route::get("/",function (){

        return 'user prefix';
    });
    Route::get("show","Front\UserController@showAdmin");
    Route::delete("show","UserController@showAdmin");
    Route::get("show","UserController@showAdmin");
    Route::put("show","UserController@showAdmin");

});*/


//Route Prefix second method to write it and middleware ==> This is the professional way
/*
Route::group(["prefix" => "users" , 'middleware'=>'auth'], function () {

    Route::get("/", function () {

        return 'user prefix';
    });
    Route::get("show", "UserController@showAdmin");
    Route::delete("show", "UserController@showAdmin");
    Route::get("show", "UserController@showAdmin");
    Route::put("show", "UserController@showAdmin");

});*/

// Route with middleware
Route::get("check", function () {

    return "middleware";

})->middleware("auth");


// Route with controller has namespace
//Route::get("second","Admin\SecondController@showString");

// other way
Route::group(["namespace" => "admin"], function () {

    Route::get("second0", "SecondController@showString0")->middleware("auth");
    Route::get("second1", "SecondController@showString1");
    Route::get("second2", "SecondController@showString2");
    Route::get("second3", "SecondController@showString3");
});

Route::get("login", function () {
    return "you should be login to access to this route";
})->name("login");

// laravel controller and route resource
// php artisan make:controller NameController --resource
Route::resource("news", "NewsController");


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware("verified");


Route::get('offersFilable', 'CrudController@getOffers');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    Route::group(['prefix' => 'offers'], function () {
    //    Route::get('store','CrudController@store');


        Route::get('create', 'CrudController@create');
        Route::post('store', 'CrudController@store')->name("offers.store")->middleware('checkAge');

        Route::get('all','CrudController@getAllOfers')->name('offers.all');

        Route::get('edit/{id}','CrudController@editOffer')->name('offers.edit');
        Route::post('update','CrudController@updateOffer')->name('offers.update');

        Route::get('delete/{id}','CrudController@deleteOffer')->name('offers.delete');


    });


Route::get("youtube",'CrudController@getVideo');

});



//===================================================================================== Begin ajax route

Route::group(['prefix' => 'ajax-offers'], function () {
    //    Route::get('store','CrudController@store');


    Route::get('create', 'OfferAjaxController@create')->name("ajax.offers.create");
    Route::post('store', 'OfferAjaxController@store')->name("ajax.offers.store");

    Route::get('all','OfferAjaxController@index')->name('ajax.offers.all');

    Route::get('edit/{id}','OfferAjaxController@edit')->name('ajax.offers.edit');
    Route::post('update','OfferAjaxController@update')->name('ajax.offers.update');

    Route::post('delete','OfferAjaxController@destroy')->name('ajax.offers.delete');


});

#########################################################################################################


Route::get('adult','Auth\CustomAuthController@adult')->middleware("checkAge",'auth');

Route::get('site','Auth\CustomAuthController@site')->name("site");
Route::get('admine','Auth\CustomAuthController@admine')->name("admine");


#########################################################################################################



######################################### One To One BeginRelations ################################################

Route::get('has_one','Relations\RelationsController@hasOne');

Route::get('has_one_reverse','Relations\RelationsController@hasOneReverse');

Route::get('get_user_has_phone','Relations\RelationsController@getUserHasPhone');

Route::get('get_user_doesnt_have_phone','Relations\RelationsController@getUserDoesntHavePhone');

######################################### One To One EndRelations ################################################

######################################### Start One To Many Relations ################################################

Route::get('all_Hospital','Relations\RelationsController@getAllHospitals');

Route::get('all_doctors_Of_Hospital/{id}','Relations\RelationsController@getAllDoctorsOfHospital');

Route::get('deleteHospital/{id}','Relations\RelationsController@deleteHospital');

Route::get('hospital_has_many/{id?}','Relations\RelationsController@getHospitalDoctors');

Route::get('hospital_has_many_reverse/{id?}','Relations\RelationsController@getHospitalDoctorsReverse');



######################################### End One To Many Relations ################################################



######################################### Start Many To Many Relations ################################################

Route::get('many_to_many_doctors_services','Relations\RelationsController@mtmgetDoctorsServices');
Route::get('many_to_many_services_doctors','Relations\RelationsController@mtmgetServicesDoctors');

Route::get('doctor/services/{doctor_id}','Relations\RelationsController@getDoctorServices')->name('doctor.services');
Route::post('saveServicesToDoctor','Relations\RelationsController@saveServicesToDoctor')->name('saveServicesToDoctor');

######################################### End Many To Many Relations ################################################










