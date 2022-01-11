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

Route::get('/', function () {
    return view('login');
});
Route::post('login_auth',[App\Http\Controllers\SignupController::class, 'login_auth'])->name('login_auth');
Route::get('home',[App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('login',[App\Http\Controllers\SignupController::class, 'login'])->name('login');
Route::get('logout',[App\Http\Controllers\SignupController::class, 'logout'])->name('logout');







//Category
Route::post('home/category', [App\Http\Controllers\CategoryController::class, 'ajax_category_description'])->middleware('isLogged');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'category'])->name('category')->middleware('isLogged');
Route::get('home/category/insert', [App\Http\Controllers\CategoryController::class, 'category_insert_btn'])->name('category_insert_btn')->middleware('isLogged');
Route::post('home/category/insert', [App\Http\Controllers\CategoryController::class, 'category_insert_data'])->name('category_insert_data')->middleware('isLogged');
Route::get('home/category/update_page/{id}', [App\Http\Controllers\CategoryController::class, 'category_update_page'])->name('category_update_page')->middleware('isLogged');
Route::post('home/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'category_update_data'])->name('category_update_data')->middleware('isLogged');
Route::get('home/category/view/{id}', [App\Http\Controllers\CategoryController::class, 'category_view_page'])->name('category_view_page')->middleware('isLogged');


// Hall
Route::get('/hall', [App\Http\Controllers\HallController::class, 'report'])->name('hall')->middleware('isLogged');
Route::get('home/hall/insert', [App\Http\Controllers\HallController::class, 'hall_insert_btn'])->name('hall_insert_btn')->middleware('isLogged');
Route::post('home/hall/insert', [App\Http\Controllers\HallController::class, 'hall_insert_data'])->name('hall_insert_data')->middleware('isLogged');
Route::get('home/hall/hall_update_page/{id}', [App\Http\Controllers\HallController::class, 'hall_update_page'])->name('hall_update_page')->middleware('isLogged');
Route::post('home/hall/hall_update_data/{id}', [App\Http\Controllers\HallController::class, 'hall_update_data'])->name('hall_update_data')->middleware('isLogged');
Route::get('home/hall/hall_view_page/{id}', [App\Http\Controllers\HallController::class, 'hall_view_page'])->name('hall_view_page')->middleware('isLogged');

// Function
Route::get('/function', [App\Http\Controllers\FunctionController::class, 'report'])->name('function')->middleware('isLogged');
Route::get('home/function/function_insert_data', [App\Http\Controllers\FunctionController::class, 'function_insert_btn'])->name('function_insert_btn')->middleware('isLogged');
Route::post('home/function/function_insert_data', [App\Http\Controllers\FunctionController::class, 'function_insert_data'])->name('function_insert_data')->middleware('isLogged');
Route::get('home/function/function_update_page/{id}', [App\Http\Controllers\FunctionController::class, 'function_update_page'])->name('function_update_page')->middleware('isLogged');
Route::post('home/function/function_update_data/{id}', [App\Http\Controllers\FunctionController::class, 'function_update_data'])->name('function_update_data')->middleware('isLogged');
Route::get('home/function/function_view_page/{id}', [App\Http\Controllers\FunctionController::class, 'function_view_page'])->name('function_view_page')->middleware('isLogged');
//Item
Route::post('/item', [App\Http\Controllers\ItemController::class, 'ajax_item_description'])->middleware('isLogged');
Route::get('/item', [App\Http\Controllers\ItemController::class, 'report'])->name('item')->middleware('isLogged');
Route::get('home/item/insert', [App\Http\Controllers\ItemController::class, 'item_insert_page'])->name('item_insert_btn')->middleware('isLogged');
Route::post('home/item/insert', [App\Http\Controllers\ItemController::class, 'item_insert_data'])->name('item_insert_data')->middleware('isLogged');
Route::get('home/item/update_page/{id}', [App\Http\Controllers\ItemController::class, 'item_update_page'])->name('item_update_page')->middleware('isLogged');
Route::post('home/item/update_data/{id}', [App\Http\Controllers\ItemController::class, 'item_update_data'])->name('item_update_data')->middleware('isLogged');
Route::get('home/item/view/{id}', [App\Http\Controllers\ItemController::class, 'item_view_page'])->name('item_view_page')->middleware('isLogged');
Route::post('home/item/excel',[App\Http\Controllers\ItemController::class, 'item_excel'])->name('item_excel')->middleware('isLogged');
Route::post('home/item/filter',[App\Http\Controllers\ItemController::class, 'item_filter'])->name('item_filter')->middleware('isLogged');
Route::post('home/item/pdf', [App\Http\Controllers\ItemController::class, 'item_pdf'])->name('item_pdf')->middleware('isLogged');

//Account
Route::post('/account', [App\Http\Controllers\AccountController::class, 'ajax_post'])->middleware('isLogged');

Route::get('/account', [App\Http\Controllers\AccountController::class, 'report'])->name('account')->middleware('isLogged');
Route::get('home/account/insert', [App\Http\Controllers\AccountController::class, 'account_insert_page'])->name('account_insert_btn')->middleware('isLogged');
Route::post('home/account/data', [App\Http\Controllers\AccountController::class, 'account_insert_data'])->name('account_insert_data')->middleware('isLogged');
Route::get('home/account/update_page/{id}', [App\Http\Controllers\AccountController::class, 'account_update_page'])->name('account_update_page')->middleware('isLogged');
Route::post('home/account/update_data/{id}', [App\Http\Controllers\AccountController::class, 'account_update_data'])->name('account_update_data')->middleware('isLogged');
Route::get('home/account/view/{id}', [App\Http\Controllers\AccountController::class, 'account_view_page'])->name('account_view_page')->middleware('isLogged');
Route::post('fetch_acoount_code', [App\Http\Controllers\AccountController::class, 'fetch_acoount_code'])->name('fetch_acoount_code');
Route::get('home/account/email', [App\Http\Controllers\AccountController::class, 'sendEmail'])->name('account-email')->middleware('isLogged');
Route::get('home/account/excel',[App\Http\Controllers\AccountController::class, 'account_excel'])->name('account-excel')->middleware('isLogged');
Route::get('home/account/pdf',[App\Http\Controllers\AccountController::class, 'account_pdf'])->name('account-pdf')->middleware('isLogged');
Route::get('home/account/sms',[App\Http\Controllers\AccountController::class, 'account_sms'])->name('account-sms')->middleware('isLogged');


//customer
Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'report'])->name('customer')->middleware('isLogged');
Route::get('home/customer/insert', [App\Http\Controllers\CustomerController::class, 'customer_insert_btn'])->name('customer_insert_btn')->middleware('isLogged');
Route::post('home/customer/insert', [App\Http\Controllers\CustomerController::class, 'customer_insert_data'])->name('customer_insert_data')->middleware('isLogged');
Route::get('home/customer/customer_update_page/{id}', [App\Http\Controllers\CustomerController::class, 'customer_update_page'])->name('customer_update_page')->middleware('isLogged');
Route::post('home/customer/customer_update_data/{id}', [App\Http\Controllers\CustomerController::class, 'customer_update_data'])->name('customer_update_data')->middleware('isLogged');
Route::get('home/customer/customer_view_page/{id}', [App\Http\Controllers\CustomerController::class, 'customer_view_page'])->name('customer_view_page')->middleware('isLogged');

//employee
Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'report'])->name('employee')->middleware('isLogged');
Route::get('home/employee/insert', [App\Http\Controllers\EmployeeController::class, 'employee_insert_btn'])->name('employee_insert_btn')->middleware('isLogged');
Route::post('home/employee/insert', [App\Http\Controllers\EmployeeController::class, 'employee_insert_data'])->name('employee_insert_data')->middleware('isLogged');
Route::get('home/employee/employee_update_page/{id}', [App\Http\Controllers\EmployeeController::class, 'employee_update_page'])->name('employee_update_page')->middleware('isLogged');
Route::post('home/employee/employee_update_data/{id}', [App\Http\Controllers\EmployeeController::class, 'employee_update_data'])->name('employee_update_data')->middleware('isLogged');
Route::get('home/employee/employee_view_page/{id}', [App\Http\Controllers\EmployeeController::class, 'employee_view_page'])->name('employee_view_page')->middleware('isLogged');

//Booking
Route::get('/customerBooking', [App\Http\Controllers\CustomerBookingController::class, 'report'])->name('customerBooking')->middleware('isLogged');
Route::get('transaction/customerBooking_insert_btn', [App\Http\Controllers\CustomerBookingController::class, 'customerBooking_insert_btn'])->name('customerBooking_insert_btn')->middleware('isLogged');
Route::post('transaction/customerBooking_insert_data', [App\Http\Controllers\CustomerBookingController::class, 'customerBooking_insert_data'])->name('customerBooking_insert_data')->middleware('isLogged');
Route::get('home/customer/customerBooking_update_page/{id}', [App\Http\Controllers\CustomerBookingController::class, 'customerBooking_update_page'])->name('customerBooking_update_page')->middleware('isLogged');
Route::post('home/customer/customerBooking_update_data/{id}', [App\Http\Controllers\CustomerBookingController::class, 'customerBooking_update_data'])->name('customerBooking_update_data')->middleware('isLogged');
Route::get('home/customer/customerBooking_view_page/{id}', [App\Http\Controllers\CustomerBookingController::class, 'customerBooking_view_page'])->name('customerBooking_view_page')->middleware('isLogged');
Route::get('home/customer/customerBooking_print_page/{id}', [App\Http\Controllers\CustomerBookingController::class, 'customerBooking_print_page'])->name('customerBooking_print_page')->middleware('isLogged');



Route::get('/bookingList', [App\Http\Controllers\BookingListController::class, 'report'])->name('bookingList')->middleware('isLogged');
