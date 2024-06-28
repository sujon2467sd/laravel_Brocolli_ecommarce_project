<?php

use App\Models\Banner;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartControler;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PdfController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ChosseController;
use App\Http\Controllers\Admin\OrderedController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ArtibuteController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ArtibuteInfoController;
use App\Http\Controllers\Admin\MaincategoryController;
use App\Http\Controllers\Admin\SingleServiceController;
use App\Http\Controllers\Admin\TopMenuSettingsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// dashboard for user and admin
Route::get('/home',[AuthController::class,'index'])->name('home.backhand');


Route::middleware(['auth','admin'])->group(function (){
    Route::get('/dashboard',[AdminController::class,'dashboard']);
    Route::get('/category', [HomeController::class, 'cate']);
});


Route::get('/user-login',[HomeController::class,'user_Login'])->name('user_Login');
Route::get('/post',[HomeController::class, 'post'])->middleware('auth','admin');


// dashboard for edit user and admin//here check only auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// check auth and also admin



// Setting route strat

Route::middleware(['auth','admin'])->group(function (){
    Route::get('/general-setting',[SettingController::class,'general_setting'])->name('general_setting');
    Route::put('/top-menu-update',[TopMenuSettingsController::class,'top_update'])->name('top_update');
    Route::put('/logo-update',[LogoController::class,'logo_update'])->name('logo_update');
    Route::get('/logo-show',[LogoController::class,'logo_show'])->name('logo_show');

});

// Setting route end

//Ordered route stat
Route::middleware(['auth','admin'])->group(function (){

    Route::get('/view-order/{id}',[OrderedController::class,'view_order'])->name('view.order');
    Route::put('/update-order-status/{id}',[OrderedController::class,'update_order_status'])->name('update.order.status');
    Route::put('/update-order-status-all',[OrderedController::class,'update_order_status_all'])->name('update.order.status.all');
    Route::get('/pending-order',[OrderedController::class,'pending_order'])->name('pending.order');
    Route::get('/confirm-order',[OrderedController::class,'confirm_order'])->name('confirm.order');
    Route::get('/delivered-order',[OrderedController::class,'delivered_order'])->name('delivered.order');
    Route::get('/cancelled-order',[OrderedController::class,'cancelled_order'])->name('cancelled.order');
    Route::get('/all-order',[OrderedController::class,'all_order'])->name('all.order');
    Route::get('/invoice-{id}/pdf', [PdfController::class,'invoice_pdf'])->name('invoice.pdf');
    Route::get('/invoice-pdf', [PdfController::class,'download_pdf_bulk'])->name('download.pdf.bulk');



//Ordered route end


});

// Category
Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/main-category', MaincategoryController::class);

    Route::resource('/sub-category', SubCategoryController::class);
    Route::get('/getSubcategories', [SubCategoryController::class, 'getSubcategories']);

});

// Brand

Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/brand', BrandController::class);
    Route::get('/brand-status/{id}', [BrandController::class, 'brand_status'])->name('brand_status');
});

//  Artibutes
Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/artibute', ArtibuteController::class);
    Route::get('/artibute-status/{id}', [ArtibuteController::class, 'artibute_status'])->name('artibute_status');

});

//  Artibutes info setting

Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/artibute-info', ArtibuteInfoController::class);
    Route::get('/artibute-info-status/{id}', [ArtibuteInfoController::class, 'artibute_info_status'])->name('artibute_info_status');
    Route::get('/getArtibuteInfo', [ArtibuteInfoController::class, 'getArtibuteInfo']);

});


//  color
Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/color', ColorController::class);
    Route::get('/color-status/{id}', [ColorController::class, 'color_status'])->name('color_status');

});
//  Size
Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/size', SizeController::class);
    Route::get('/size-status/{id}', [SizeController::class, 'size_status'])->name('size_status');

});
Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/unit', UnitController::class);
    Route::get('/unit-status/{id}', [UnitController::class, 'unit_status'])->name('unit_status');

});
//  Products
Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/product', ProductController::class);
    Route::get('quick-view', [ProductController::class, 'quickView'])->name('quick.view');
});


// banner route start
Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/banner', BannerController::class);
    Route::get('/banner-status/{id}', [BannerController::class, 'banner_status'])->name('banner.status');

});
// banner route end

//faq route
Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/faq', FaqController::class);
    Route::get('/faq-status/{id}', [FaqController::class, 'faq_status'])->name('faq.status');
});

// service route
Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/service', ServiceController::class);
    Route::get('/service-status/{id}', [ServiceController::class, 'service_status'])->name('service.status');

    Route::resource('/single-service', SingleServiceController::class);
    Route::get('/Singlesrc-status/{id}', [SingleServiceController::class, 'SingleService_status'])->name('singleservice.status');
});

//about route
Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/about', AboutController::class);
    Route::get('/about-status/{id}', [AboutController::class, 'about_status'])->name('about.status');
    Route::resource('/choose', ChosseController::class);
    Route::get('/choose-status/{id}', [ChosseController::class, 'choose_status'])->name('choose.status');
});

//team route
Route::middleware(['auth','admin'])->group(function (){
    Route::resource('/teams',TeamController::class);
    Route::get('/team-status/{id}', [TeamController::class, 'team_status'])->name('team.status');
});









// frontend route
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/product-details/{id}', [HomeController::class, 'product_details'])->name('product.details');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/caetgory-product/{id}', [HomeController::class, 'caetgory_product'])->name('caetgory.product');
Route::get('/subcaetgory-product/{id}', [HomeController::class, 'subcategory_product'])->name('subcategory.product');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/offer-product', [HomeController::class, 'offer_product'])->name('offer.product');

// cart route end


// account route start
Route::get('/my-account', [AccountController::class, 'my_account'])->name('my.account');
Route::get('/order-view/{id}', [AccountController::class, 'order_view'])->name('order.view');
Route::get('/order-cancel/{id}', [AccountController::class, 'order_cancel'])->name('order.cancel');
Route::post('/account-details', [AccountController::class, 'account_details'])->name('account.details');
// account route end

// Faq route start
Route::get('/faq-details', [HomeController::class, 'faq'])->name('faq');
//Faq route end


// cart route start
Route::post('/add-cart/{id}', [CartController::class, 'Addcart'])->name('cart');
Route::get('/cart-show', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart-update/{rowId}', [CartController::class, 'updateItem'])->name('cart.update');
Route::post('/cart-remove/{rowId}', [CartController::class, 'removeItem'])->name('cart.remove');

//check out route start
 Route::middleware(['auth','user'])->group(function (){
Route::get('/check-out', [CartController::class, 'CheckOut'])->name('check.out');
 });

//check out route end


// account route emd

// order route start
Route::post('/place-order', [OrderController::class, 'place_order'])->name('place.order');
Route::get('/order-sccuess', [OrderController::class, 'order_sccuess'])->name('order.sccuess');
// order route end


// service route
Route::get('/service', [HomeController::class, 'SerVice'])->name('service');
Route::get('/service-details/{id}', [HomeController::class, 'Service_details'])->name('service.details');

//About us
Route::get('/about-us', [HomeController::class, 'about_us'])->name('about.us');
Route::get('/team-us', [HomeController::class, 'team_us'])->name('team.us');

//contact routes
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact-messege', [ContactController::class, 'contact_messege'])->name('contact.messege');

require __DIR__.'/auth.php';
