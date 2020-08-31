<?php

use Illuminate\Support\Facades\Input;

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

//react routes

//single route for react application
// Route::view('/{path?}', 'app');

// Route::resource('items', 'ItemController');

// Route::resource('bookform', 'ItemController@display');


//trying different approch
// Route::get('/{path?}', [
//     'uses' => 'ItemController@display',
//     'as' => 'react',
//     'where' => ['path' => '.*']
// ]);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/', function () {
    return view('login');
});



Route::get('/reset_password', function () {
    return view('reset_password');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

Route::get('/about', function () {
    return view('about');
});



//admin routes
Route::get('/index', function () {
    return view('Admin.index');
});

Route::get('/bookform', function () {
    return view('Admin.bookform');
});

Route::get('/showdetails', function () {
    return view('Admin.showdetails');
});

Route::get('/details', function () {
    return view('Admin.details');
});



Route::get('/addticket', function () {
    return view('Admin.addticket');
});


Route::get('/payment', function () {
    return view('Admin.payment');
});


Route::get('/addpayment', function () {
    return view('Admin.addpayment');
});


// Route::get('/imgshow', function () {
//     return view('imgshow');
// });





// Route::get('/about', 'bookController@about')->name('about');

Route::get('contact-us', 'ContactUSController@contactUS');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactSaveData']);



//image show try route
// Route::get('/imgshow','bookController@storeImage');





Route::post('bookt', 'bookController@index');

//show details
Route::get('/showdetails','bookController@bookshow'); //fetching travler info
// Route::get('/','bookController@Ashow');
Route::get('/index','bookController@Ashow');

//Traveler details searchbar
Route::any('/Search1',function(){
    $q = Input::get ( 'q' );
    $user = DB::table('bookt1')->where('fname','LIKE','%'.$q.'%')->orWhere('TicketID','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
        return view('Admin.details')->withDetails($user)->withQuery ( $q );
        else echo "<div class='form'>
        <h3>No Details found. Try to search again !</h3><br/>
        <p class='link'> <a href='/showdetails'>Go back</a></p>
        </div>";
    // else return view ('doctor.manageusers')->withMessage('No Details found. Try to search again !');
 });

//for mail
 Route::any('/Bsearch',function(){
    $q = Input::get ( 'q' );
    // $user = DB::table('appointment')->where('Patient_name','LIKE','%'.$q.'%')->orWhere('PatientId','LIKE','%'.$q.'%')->orWhere('AppointmentId','LIKE','%'.$q.'%')->get();
    $book = DB::table('bookt1')->where('fname','LIKE','%'.$q.'%')->orWhere('TicketID','LIKE','%'.$q.'%')->get();
   
    // $user = DB::table('appointment')->where('PatientId', '$q')->first()->my_field;
    if(count($book) > 0)
        return view('Admin.appclone2')->withDetails2($book)->withQuery ( $q );
    else echo "<div class='form'>
    <h3>No Details found. Try to search again !</h3><br/>
    <p class='link'> <a href='/showdetails'>Go back</a></p>
    </div>";
 });


 //for invoice patient details
 Route::any('/dinvoice',function(){
    $q = Input::get ( 'q' );
    $user = DB::table('bookt1')->where('fname','LIKE','%'.$q.'%')->orWhere('TicketID','LIKE','%'.$q.'%')->get();
   
    // $user = DB::table('appointment')->where('PatientId', '$q')->first()->my_field;
    if(count($user) > 0)
        return view('Admin.addpayment')->withDetails($user)->withQuery ( $q );
    else echo "<div class='form'>
    <h3>No Details found. Try to search again !</h3><br/>
    <p class='link'> <a href='/addpayment'>Go back</a></p>
    </div>";
 });

 //sending mail 
 Route::post('/amail','bookController@mail');


 //controllers routes
Route::get('user-registration', 'UserController@index');

Route::post('user-store', 'UserController@userPostRegistration');

Route::get('user-login', 'UserController@userLoginIndex');

Route::post('login', 'UserController@userPostLogin');

Route::get('dashboard', 'UserController@dashboard');

Route::get('logout', 'UserController@logout');

//password forgot
Route::post('password','PasswordforgotController@pass');
Route::post('password2','PasswordforgotController@pass2');

//addpayement route
Route::post('/invoicedetails', "invoiceController@invoicedetails");  //invoice
Route::get('payment', 'invoiceController@Invoiceshow'); //invoice details