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
});

Route::get('/test', function () {
    return view('test');
});


// Form 1
Route::post('/emp_insert1','SecondController@insertEmployeeDetails');

Route::get('/form1',function() { 
	return view('forms.form1');
});
Route::get('/empView','SecondController@empView');

Route::get('/edit/{id}','SecondController@editEmployee');
Route::post('/emp_update','SecondController@update');

Route::get('/emp/view',[
	'uses' => 'SecondController@view',
	'as'=>'view.emp'
]);

Route::get('/delete/{id}','SecondController@delete');






// Form 2
Route::post('/emp_insert2','ThirdController@insertEmployeeDetails');

Route::get('/form2',function() { 
	return view('forms.form2');
});
Route::get('/empView1','ThirdController@empView1');

Route::get('/edit2/{id}','ThirdController@editEmployee');
Route::post('/emp_update','ThirdController@update');

Route::get('/emp/view',[
	'uses' => 'ThirdController@view',
	'as'=>'view.emp'
]);

Route::get('/delete/{id}','ThirdController@delete');




// Form3
Route::post('/emp_insert3','FourthController@insertEmployeeDetails');
Route::get('/form3', function(){
	return view('forms.form3');
});
Route::get('/empView2','FourthController@empView2');

Route::get('/edit3/{id}','FourthController@editEmployee');
Route::post('/emp_update','FourthController@update');

Route::get('/emp/view',[
	'uses' => 'FourthController@view',
	'as'=>'view.emp'
]);

Route::get('/delete/{id}','FourthController@delete');




// Form4
Route::post('/emp_insert4','FifthController@insertEmployeeDetails');
Route::get('/form4', function(){
	return view('forms.form4');
});
Route::get('/empView3','FifthController@empView3');

Route::get('/edit4/{id}','FifthController@editEmployee');
Route::post('/emp_update','FifthController@update');

Route::get('/emp/view',[
	'uses' => 'FifthController@view',
	'as'=>'view.emp'
]);

Route::get('/delete/{id}','FifthController@delete');






// Form5
Route::post('/emp_insert5','SixController@insertEmployeeDetails');
Route::get('/form5', function(){
	return view('forms.form5');
});
Route::get('/empView4','SixController@empView4');

Route::get('/edit5/{id}','SixController@editEmployee');
Route::post('/emp_update','SixController@update');

Route::get('/emp/view',[
	'uses' => 'SixController@view',
	'as'=>'view.emp'
]);

Route::get('/delete/{id}','SixController@delete');
Route::get('/empSearch','SixController@search');

Route::get('/contact',function(){
	return view('mail.contact');
});
Route::post('contact_us','MailController@basic_mail');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// pdf generation
Route::get('/downloadPDF/{id}','SixController@downloadPDF');

Route::get('/downloadAllPDF/','SixController@downloadAllPDF');