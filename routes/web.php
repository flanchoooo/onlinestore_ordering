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


Route::get('/', function (){
    return view('welcome');
});


Route::get('/wild', function (){
    $shopping_items = \App\ShoppingItem::whereStatus('Active')
        ->get();

    return view('wild', compact('shopping_items', $shopping_items));
});
Route::get('/about-us', function (){
    return view('about');
});
Route::get('/contact-us', function (){
    return view('contact');
});
Route::get('/locate-us', function (){
    return view('locate');
});
/*
 * AUTHENTICATION ROUTES
 * */
Auth::routes();
Route::get('/register/confirm/{token}', 'Auth\RegisterController@confirmEmail');
Route::get('/login/{network}', 'Auth\SocialAccountController@redirectToProvider');
Route::get('/callback/{network}/', 'Auth\SocialAccountController@callback');
Route::any('/transactions/check', 'PaymentController@checkPayments');


Route::any('/cart/add/{id}', 'ShoppingCartController@addToCart');
Route::any('/cart/item/{id}', 'ShoppingCartController@viewItem');
Route::any('/cart/remove/{id}', 'ShoppingCartController@removeItem');
Route::any('/cart/update/{id}', 'ShoppingCartController@updateItem');
Route::any('/my-cart', 'ShoppingCartController@cartIndex');
Route::any('/checkout', 'ShoppingCartController@checkoutIndex');
Route::any('/cart/order', 'ShoppingCartController@createOrder');
Route::get('/shopping/payments', 'ShoppingCartController@paymentsIndex');


/*
 * Categories Routes
 * */
Route::get('/category/cough', 'CategoriesController@getCough');
Route::get('/category/pain-management', 'CategoriesController@getPainManagement');
Route::get('/category/wound-management', 'CategoriesController@getWoundManagement');
Route::get('/category/skin-conditions', 'CategoriesController@getSkinConditions');
Route::get('/category/oral-care', 'CategoriesController@getOralCare');
Route::get('/category/medical-consumables', 'CategoriesController@getMedicalConsumables');


Route::get('/category/nutritional', 'CategoriesController@getNutritional');
Route::get('/category/baby', 'CategoriesController@getBaby');
Route::get('/category/sports-nutrition', 'CategoriesController@getSportsNutrition');
Route::get('/category/vitamins', 'CategoriesController@getVitamins');
Route::get('/category/herbal', 'CategoriesController@getHerbal');
Route::get('/category/pregnancy', 'CategoriesController@getPregnancy');


Route::get('/category/body-skin-care', 'CategoriesController@getBodySkinCare');
Route::get('/category/deodorant', 'CategoriesController@getDeodorant');
Route::get('/category/hair-care', 'CategoriesController@getHairCare');
Route::get('/category/make-up', 'CategoriesController@getMakeUp');
Route::get('/category/sun-protection', 'CategoriesController@getSunProtection');


Route::get('/category/nappies', 'CategoriesController@getNappies');
Route::get('/category/baby-feeding', 'CategoriesController@getBabyFeeding');

Route::get('/payments/shopping/{id}', 'ShoppingCartController@returnUrl');
Route::get('/paynow/result/shopping/{id}', 'PaynowController@resultUrl');
Route::get('/paynow/check', 'ShoppingCartController@checkPayments');

Route::any('/paypal/express', 'PayPalController@expressCheckout');
Route::any('/paypal/payment/success', 'PayPalController@expressCheckoutSuccess');


/*
 * VIEW ROUTES
 * */
Route::group(['middleware' => 'auth'], function (){
    Route::post('/register/mobile', 'DetailsController@updateMobile');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/privacy', 'HomeController@index')->name('home');
    Route::get('/payments', 'PaymentController@index')->name('payments');
    Route::get('/delivery-notes', 'DeliveryNoteController@index')->name('delivery-notes');
    Route::get('/quotes', 'QuotationController@index')->name('quotes');
    Route::get('/profile', 'PaymentController@index')->name('profile');

    Route::any('/menu/data', 'MenuController@getMenuData');
    Route::any('/menu/template', 'MenuController@getTemplate');


    /*
     * Enquiries
     * */
    Route::post('/enquiry/create', 'EnquiryController@create')->name('create_enquiry');
    Route::any('/enquiries/get', 'EnquiryController@getEnquiries')->name('get_enquiries');
    Route::get('/enquiry/add', 'EnquiryController@viewAdd')->name('add_enquiry');
    Route::post('/enquiry/update', 'EnquiryController@update')->name('update_enquiry');
    Route::any('/enquiry/delete/media', 'EnquiryController@deleteMedia')->name('delete_enquiry_media');
    Route::get('/enquiry/{id}', 'EnquiryController@viewEnquiry')->name('view_enquiry');

    /*
     * Quotations
     * */
    Route::any('/quotation/file', 'QuotationController@saveDocument');
    Route::any('/quotation/{id}', 'QuotationController@viewQuotation');
    Route::any('/quotation', 'QuotationController@generateQuotation');
    Route::any('/quotations/get', 'QuotationController@getQuotations');


    /*
     * Orders
     * */
    Route::get('/orders', 'OrderController@index')->name('orders');
    Route::post('/order/create', 'OrderController@create');
    Route::any('/order/{id}', 'OrderController@viewOrder');


    /*
     * Invoices
     * */
    Route::get('/invoices', 'InvoiceController@index')->name('invoices');
    Route::any('/invoice/{id}', 'InvoiceController@viewInvoice');
    Route::any('/invoice', 'InvoiceController@generateInvoice');
    Route::any('/invoices/get', 'InvoiceController@getInvoices');


    /*
     * Paynow,PayPal & Payments
     * */
    Route::get('/payments/{id}', 'PaynowController@returnUrl');
    Route::get('/paynow/result/{id}', 'PaynowController@resultUrl');
    Route::any('/paynow/initiate', 'PaynowController@initiate');





    Route::any('/payment/{id}', 'PaymentController@viewPayment');
    Route::get('/accept/cash', 'PaymentController@acceptPayment');
    Route::get('/accept/medical-aid', 'PaymentController@acceptMedicalAidPayment');

    /*
     * Delivery Notes
     * */
    Route::any('/delivery-note/sent', 'DeliveryNoteController@generateSentDeliveryNote');
    Route::any('/delivery-note/{id}', 'DeliveryNoteController@viewDeliveryNote');
    Route::any('/confirm-delivery', 'DeliveryNoteController@updateDelivery');


});
