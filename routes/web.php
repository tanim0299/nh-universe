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
// ================User Section============
Route::get('/','HomepageController@index');
Route::get('/About-us','HomepageController@About_us');
Route::get('/Term_Condition','HomepageController@Term_Condition');
Route::get('/Privacy_Policy','HomepageController@Privacy_Policy');
Route::get('/FAQ','HomepageController@FAQ');
Route::get('/Contact_us','HomepageController@Contact_us');

Route::get('/Track_order','HomepageController@Track_order');
Route::get('/Import','HomepageController@Import');
Route::get('/Export','HomepageController@Export');
Route::get('/View_Import/{id}','HomepageController@View_Import');
Route::get('/View_Export/{id}','HomepageController@View_Export');
Route::get('/Wholesale','HomepageController@Wholesale');
Route::get('/View_Wholsale/{id}','HomepageController@View_Wholsale');
Route::post('/export-import-sent','HomepageController@export_import_sent');

Route::get('/AddCarts/{id}','HomepageController@AddCarts');

// DI&9=^Vvm#iW


Route::get('/how-to-buy','HomepageController@howbuy');
Route::get('/COD','HomepageController@COD');
Route::get('/Easy-replacement','HomepageController@replacement');
Route::get('/Career','HomepageController@Career');
Route::post('/customer-message','HomepageController@customermessage');

Route::get('/all-product','HomepageController@shop');
Route::get('/seller','HomepageController@seller');
Route::get('/seller-Product/{brand}/{id}','HomepageController@sellerProduct');

Route::get('/offer','HomepageController@offer');
Route::get('/allcategory','HomepageController@allcategory');
Route::get('/Full-filled','HomepageController@Full_filled');
Route::get('/special-offer','HomepageController@special_offer');
Route::get('/exclusive-offer','HomepageController@exclusive_offer');
Route::get('/Best-sale','HomepageController@Best_sale');
Route::get('/Express-service','HomepageController@express_offer');
Route::get('/Flash-Sale','HomepageController@flash_offer');


Route::get('/newproduct-show','HomepageController@newproduct_show');
Route::get('/item/{name}/{id}','HomepageController@item_wise');
Route::get('/category/{name}/{id}','HomepageController@category_wise');
Route::get('/subcategory/{name}/{id}','HomepageController@subcategory_wise');
Route::get('/product/{name}/{id}','HomepageController@single_product');
Route::post('/getProductcolor','HomepageController@getProductcolor');


// ================Checkout System===============
Route::post('/add_to_cart','CheckoutController@add_to_cart');
Route::post('/shoppingcart_view','CheckoutController@shoppingcart_view');
Route::get('/totalprice','CheckoutController@totalprice');
Route::get('/totalcartqunt','CheckoutController@totalcartqunt');
Route::get('/totalcartamount','CheckoutController@totalcartamount');
Route::post('/placeorder_show','CheckoutController@placeorder_show');
Route::post('/delete_product','CheckoutController@delete_product');
Route::get('/Checkout','CheckoutController@Checkout_order');
Route::post('/district_charge','CheckoutController@district_charge');
Route::post('/thana_info','CheckoutController@thana_info');
Route::post('/Applypromo_check','CheckoutController@Applypromo_check');
Route::post('/ordesystem','CheckoutController@ordesystem');
Route::get('/invoice-paper/{session}','CheckoutController@invoicepaper');
Route::post('/reviewsadd','CheckoutController@reviewsadd');
// =============searching=================
Route::post('/Searchproduct','ProductController@Search_product');
Route::get('/searchproducts','HomepageController@searchproducts');
Route::post('/search-product-list','HomepageController@search_Product_List');
Route::post('/Getitemwiseproduct','HomepageController@Get_itemwiseproduct');
Route::post('/Getcatwiseproduct','HomepageController@Get_catwiseproduct');
Route::post('/Getsubcatwiseproduct','HomepageController@Get_subcatwiseproduct');
Route::post('/fetch_time','HomepageController@fetch_time');
// =============searching=================
Route::post('/brand_wise_search','ProductController@brandwisesearch');
Route::post('/price_wise_search','ProductController@pricewisesearch');
Route::post('/size_wise_search','ProductController@sizewisesearch');
Route::post('/color_wise_search','ProductController@colorwisesearch');



// Item
Route::post('/brand_wise_search_item','ProductController@brandwisesearch_item');
Route::post('/price_wise_search_item','ProductController@pricewisesearch_item');
Route::post('/size_wise_search_item','ProductController@sizewisesearch_item');
Route::post('/color_wise_search_item','ProductController@colorwisesearch_item');


// Category
Route::post('/brand_wise_search_category','ProductController@brandwisesearch_category');
Route::post('/price_wise_search_category','ProductController@pricewisesearch_category');
Route::post('/size_wise_search_category','ProductController@sizewisesearch_category');
Route::post('/color_wise_search_category','ProductController@colorwisesearch_category');

// Sub Category
Route::post('/brand_wise_search_subcategory','ProductController@brandwisesearch_subcategory');
Route::post('/price_wise_search_subcategory','ProductController@pricewisesearch_subcategory');
Route::post('/size_wise_search_subcategory','ProductController@sizewisesearch_subcategory');
Route::post('/color_wise_search_subcategory','ProductController@colorwisesearch_subcategory');


// ==============Login system===============

Route::resource('/user-Register','guestController');
Route::get('/user-login','guestController@userLogin');
Route::post('/guest-login','guestController@guestLogin');
Route::get('/forgot_password','guestController@forgot_password');
Route::post('/guest-forget','guestController@guest_forget');
Route::get('/guest_forget_code/{phone}','guestController@guest_forget_code');
Route::post('/guest_forget_code_check','guestController@guest_forget_code_check');
Route::post('/guest_forget_reset_done','guestController@guest_forget_reset_done');

Route::get('/user-login/facebook', 'guestController@redirectTofacebook');
Route::get('/user-login/facebook/callback', 'guestController@handleFacebookCallback');


Route::get('/user-login/twitter', 'guestController@redirectToTwitter');
Route::get('/user-login/twitter/callback', 'guestController@handleTwitterCallback');

Route::get('/user-login/google', 'guestController@redirectToGoogle');
Route::get('/user-login/google/callback', 'guestController@handleGoogleCallback');
Route::post('/guest-login-redirect','guestController@guestLogin_redirect');


// ===========Guest section=============
Route::group(['middleware' => 'guestauth'], function () {

Route::get('/userdashboard','guestController@userdashboard');
Route::post('/my-profile-update','guestController@myprofileupdate');
Route::get('/guest-logout','guestController@guestLogout');


});

// =================seller Section================

Route::get('/seller-login','sellerController@sellerLogin');
Route::get('/seller-register','sellerController@sellerRegister');
Route::post('/seller-reg','sellerController@sellerReg');
Route::post('/seller-signin','sellerController@sellerSignin');


Route::get('/forgot_password_seller','sellerController@forgot_password_seller');
Route::post('/seller-forget','sellerController@seller_forget');
Route::get('/seller_forget_code/{phone}','sellerController@seller_forget_code');
Route::post('/seller_forget_code_check','sellerController@seller_forget_code_check');
Route::post('/seller_forget_reset_done','sellerController@seller_forget_reset_done');

Route::group(['middleware' => 'sellerauth'],function(){

Route::get('/seller-dashboard','sellerController@seller_dashboard');
Route::get('/seller-product-add','sellerController@sellerproductadd');
Route::post('/seller-product-insert','sellerController@store');
Route::get('/seller-product-view','sellerController@viewproduct');
Route::get('/sub-productedit/{id}','sellerController@sub_productedit');
Route::post('/sub-product-update/{id}','sellerController@subproductupdate');
Route::get('/sub-product-delete/{id}','sellerController@destroy');
Route::get('/total-ordered-peroduct','sellerController@totalorder');
Route::get('/seller-profile-setting','sellerController@profile_setting');
Route::post('/seller-profile-setting-update','sellerController@profile_setting_update');
Route::get('/seller-logout','sellerController@sellerLogout');


});


// ===========admin section=============

Route::get('/administrator','AdminController@Login');
Route::post('/Login-Admin','AdminController@LoginAdmin');

Route::post('CreateProductGetCategory','ProductController@categorylist');
Route::post('CreateProductGetsubCategory','ProductController@subcategorylist');


Route::group(['middleware' => 'adminauth'], function () {

Route::get('/Admin-dashboard','AdminController@Dashboard');
Route::get('/create-admin','AdminController@index');
Route::post('/insert-admin','AdminController@store');
Route::get('/view-admin','AdminController@show');
Route::get('/editadminModal/{id}','AdminController@editadminModal');
Route::post('/update-admin/{id}','AdminController@update');
Route::post('/inactive-status-admin','AdminController@inactivestatusadmin');
Route::post('/active-status-admin','AdminController@activestatusadmin');
Route::post('/delete-account-admin','AdminController@destroy');

//admin main menu
Route::get('MainMenu',
	['as'=>'MainMenu',
	'uses'=>'AdmainMenuCon@index'
	])->where(['MainMenu' => '[A-Z]+', 'MainMenu' => '[a-z]+']);

Route::get('AdminMainMenuModel/{id}','AdmainMenuCon@showDate');
Route::post('AdmainSaveMainlink','AdmainMenuCon@store');
Route::post('AdminEditMainlink','AdmainMenuCon@update');
Route::post('adminDeleteData/{id}','AdmainMenuCon@Dalete');

//admin sub menu
Route::get('SubMenu',
	['as'=>'SubMenu',
	'uses'=>'AdminSubMenuCon@index'
	])->where(['SubMenu' => '[A-Z]+', 'SubMenu' => '[a-z]+']);

Route::post('AdminSubLinkSave','AdminSubMenuCon@store');
Route::get('adminSubModelEdit/{id}','AdminSubMenuCon@showDate');
Route::post('AdminMainMenuEditcon','AdminSubMenuCon@update');
Route::post('AdminSubmenuDelete/{id}','AdminSubMenuCon@Dalete');
// ==============Item================

Route::resources([
	'item-add'=>'ItemController',
	'category-add'=>'categoryController',
	'sub-category-add'=>'subcategoryController',
	'brand-add'=>'CompanyController',
	'product-add'=>'ProductController',
	'slider'=>'sliderController',
	'Explore'=>'exploreController',
	'CouponAdd'=>'couponController',
	'deliverychargeadd'=>'deliverychargeController',
	'color-info'=>'colorController',
	'size-info'=>'sizeController',
	'offer-setup'=>'OfferController',
	'district-add'=>'districtController',
	'thana-add'=>'ThanaController',
]);

Route::get('shippingclass','deliverychargeController@shippingclass');
Route::get('shippingclasscreate','deliverychargeController@shippingclasscreate');
Route::post('shippingclassstore','deliverychargeController@shippingclassstore');
Route::get('shippingclassedit/{id}','deliverychargeController@shippingclassedit');
Route::post('shippingclassupdate/{id}','deliverychargeController@shippingclassupdate');
Route::post('shippingclassdestroy/{id}','deliverychargeController@shippingclassdestroy');

// ========measurment ========
Route::get('Measurementadd','ProductController@Measurementadd');
Route::post('Measurementinsert','ProductController@Measurementinsert');
Route::get('Measurementedit/{id}','ProductController@Measurementedit');
Route::post('Measurementupdate/{id}','ProductController@Measurementupdate');
Route::get('Measurementdelete/{id}','ProductController@Measurementdelete');
Route::get('Measurementview','ProductController@Measurementview');
// ========Zone Add===========

Route::get('zone','deliverychargeController@Zone');
Route::get('deliveryzone','deliverychargeController@Zonecreate');
Route::post('zonecreated','deliverychargeController@Zonestore');
Route::get('zoneedit/{id}','deliverychargeController@Zoneedit');
Route::post('zoneupdate/{id}','deliverychargeController@Zoneupdate');
Route::post('zonedestroy/{id}','deliverychargeController@Zonedestroy');

// ========Zone District Add===========
Route::get('zonedistrict','deliverychargeController@zonedistrict');
Route::get('zonewisedistrict','deliverychargeController@Zonedistrictcreate');
Route::post('zonedistrictcreated','deliverychargeController@Zonedistrictstore');
Route::get('zonedistrictedit/{id}','deliverychargeController@Zonedistrictedit');
Route::post('zonedistrictupdate/{id}','deliverychargeController@Zonedistrictupdate');
Route::post('zonedistrictdestroy/{id}','deliverychargeController@Zonedistrictdestroy');



Route::get('view-review','ProductController@view_review');
Route::get('activereview/{id}','ProductController@activereview');
Route::get('inactivereview/{id}','ProductController@inactivereview');
Route::get('Deletereview/{id}','ProductController@deletereview');



Route::get('activeoffer/{id}','OfferController@activeoffer');
Route::get('inactiveoffer/{id}','OfferController@inactiveoffer');

Route::post('getProduct','ProductController@getProduct');
Route::get('productstatusactive/{id}','ProductController@productstatusactive');
Route::get('productstatusinactive/{id}','ProductController@productstatusinactive');
Route::post('productdetails','ProductController@productdetails');
Route::get('productimage','ProductController@product_image');
Route::post('multiimage','ProductController@multiimage');
Route::get('activecoupon/{id}','couponController@activecoupon');
Route::get('inactivecoupon/{id}','couponController@inactivecoupon');


// Stock

Route::get('/productstock', 'ProductController@productstock');
Route::post('addproductstock','ProductController@addproductstock');
Route::get('/viewproductstock', 'ProductController@viewproductstock');
Route::get('/deletestock/{id}','ProductController@deletestock');
Route::get('/editstock/{id}','ProductController@editstock');
Route::post('/updateproductstock/{id}','ProductController@updateproductstock');
Route::get('/stockreport','ProductController@stockreport');
Route::post('/getsize','ProductController@getsize');
Route::post('/getcolor','ProductController@getcolor');
// other controller
Route::get('/admin/about_us','OtherController@about_us');
Route::post('/updateabout/{id}','OtherController@updateabout_us');

Route::get('/admin/term&condition','OtherController@term');
Route::post('/updateterm/{id}','OtherController@updateterm');

Route::get('/admin/privacy&policy','OtherController@privacy');
Route::post('/updateprivacy/{id}','OtherController@updateprivacy');

Route::get('/admin/faq','OtherController@faq');
Route::post('/updatefaq/{id}','OtherController@updatefaq');

Route::get('/admin/contact_us','OtherController@contact_us');
Route::post('/updatecontact_us/{id}','OtherController@updatecontact_us');

Route::get('/howtobuy','OtherController@howtobuy');
Route::post('/updatehowtobuy/{id}','OtherController@updatehowtobuy');


Route::get('/cash_on_delivery','OtherController@COD');
Route::post('/updatecod/{id}','OtherController@updatecod');


Route::get('customermessage','OtherController@customermessage');
Route::get('/customer-sms-delete/{id}','OtherController@customersmsdelete');


Route::get('setting','OtherController@setting');
Route::post('/updatesetting/{id}','OtherController@updatesetting');

Route::get('addimportexport','OtherController@addimportexport');
Route::post('/addimportexports','OtherController@addimportexports');
Route::get('viewimportexport','OtherController@viewimportexport');
Route::get('DeleteImportExport/{id}','OtherController@DeleteImportExport');
Route::get('EditImportExport/{id}','OtherController@EditImportExport');
Route::post('updateimportexports/{id}','OtherController@updateimportexports');



Route::get('/CareerAdd','OtherController@CareerAdd');
Route::post('/updateCareerAdd/{id}','OtherController@updateCareerAdd');

Route::get('/announcementadd','OtherController@announcementadd');
Route::post('/insertannouncement','OtherController@insertannouncement');
Route::get('/newsadd','OtherController@newsadd');
Route::post('/insertnews','OtherController@insertnews');


// =========Registration Controller=============
Route::get('sellerlist','registrationListController@sellerlist');
Route::get('selleractivelist','registrationListController@selleractivelist');
Route::get('sellerinactivelist','registrationListController@sellerinactivelist');
Route::get('sellerdelete/{id}','registrationListController@sellerdelete');
Route::get('inactiveseller/{id}','registrationListController@inactiveseller');
Route::get('activeseller/{id}','registrationListController@activeseller');
Route::get('selleraccess/{phone}/{pass}','registrationListController@selleraccess');
Route::get('guestaccess/{phone}/{pass}','registrationListController@guestaccess');
Route::get('GuestList','registrationListController@GuestList');
Route::get('GuestListactive','registrationListController@GuestListactive');
Route::get('GuestListinactive','registrationListController@GuestListinactive');
Route::get('GuestListdelete/{id}','registrationListController@GuestListdelete');
Route::get('inactiveguest/{id}','registrationListController@inactiveguest');
Route::get('activeguest/{id}','registrationListController@activeguest');
// ===================Order System==================

Route::get('/totalOrder','orderSystemController@totalOrder');
Route::get('/pendingOrder','orderSystemController@pendingOrder');
Route::get('/ProcessOrder','orderSystemController@ProcessOrder');
Route::get('/onthewayOrder','orderSystemController@onthewayOrder');
Route::get('/CompleteOrder','orderSystemController@CompleteOrder');
Route::get('/RejectOrder','orderSystemController@RejectOrder');

Route::post('/penToProOrder','orderSystemController@penToProOrder');
Route::post('/proToontheOrder','orderSystemController@proToontheOrder');
Route::post('/ontheTosuccOrder','orderSystemController@ontheTosuccOrder');
Route::post('/penTorejectOrder','orderSystemController@penTorejectOrder');
Route::get('/clearshopping','orderSystemController@clearshopping');
// ==========Logout===============
Route::get('/Adminlogout','AdminController@Adminlogout');


});




Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/schedule', function () {
            Artisan::call('product:pricechange');
            

             $notification=array(
            'messege'   =>'Flash Offer Off',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
        });
        
// Clear route cache:
 // Route::get('/route-cache', function() {
 //     $exitCode = Artisan::call('route:cache');
 //     return 'Routes cache cleared';
 // });

 // Clear config cache:
 // Route::get('/config-cache', function() {
 //     $exitCode = Artisan::call('config:cache');
 //     return 'Config cache cleared';
 // }); 


 // Clear view cache:
 // Route::get('/view-clear', function() {
 //     $exitCode = Artisan::call('view:clear');
 //     return 'View cache cleared';
 // });
