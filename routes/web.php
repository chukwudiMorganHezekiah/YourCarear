<?php
use Illuminate\Support\Facades\Cache;


Route::get('/', function () {
    $user=auth()->user()->id;
    $userInterest=\App\User::find($user)->profile->industryInterest;
    $companies=\App\Company::where('company_Industry','LIKE','%'.$userInterest.'%')->paginate(5);
    $user=auth()->user()->id;
   /* $company_image_cache=Cache::remember('company_logo', now()->addSecond(), function () use($user) {
        return auth()->user()->company->logo;

    }); */
    $jobs=\App\Job::where('job_Industry','LIKE','%'.$userInterest.'%')->paginate(1);;


    return view('home',compact(['companies','jobs',]));
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/email', function(){
    $user=auth()->user();
    return new \App\Mail\newCompanyCreatedEvent($user);
})->name('home');

Route::post('/profile/save', 'ProfileController@store')->name('saveAboutUser');

Route::get('/create/company', 'CompanyController@create')->middleware('auth');


Route::post('/company/store', 'CompanyController@store')->middleware('auth');

Route::get('/create/job', 'JobController@create')->middleware('auth');


Route::post('/job/store', 'JobController@store')->middleware('auth');

Route::get('/job', 'JobController@index')->middleware('auth');



Route::get('/company/{company}-{slug}/edit', 'CompanyController@edit')->middleware('auth');

Route::post('/company/{company}-{slug}/update', 'CompanyController@update')->middleware('auth');

Route::get('/edit/{job}-{slug}/job', 'jobController@edit')->middleware('auth');
