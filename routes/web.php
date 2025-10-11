<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\TeamController; 
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CrmController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DepotsController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\Slider1Controller;
use App\Http\Controllers\Admin\SniPriceController;
use App\Http\Controllers\Admin\Slider2Controller;
use App\Http\Controllers\Admin\Slider3Controller;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\BlockController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AppointmentsController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\StockColController;
use App\Http\Controllers\LogViewerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\adminlogincontroller;
use Kreait\Firebase\Factory;


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

// Route::get('/clear-cache', function () {
//     $exitCode = Artisan::call('cache:clear');
//     // $exitCode = Artisan::call('route:clear');
//     // $exitCode = Artisan::call('config:clear');
//     // $exitCode = Artisan::call('view:clear');
//     // return what you want
// });
//=========================================== FRONTEND =====================================================

Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('/');
    Route::get('about', [HomeController::class, 'about'])->name('about');
    Route::get('our_team', [HomeController::class, 'our_team'])->name('our_team');
    Route::get('our_products/{category_id?}', [HomeController::class, 'our_products'])->name('our_products');
    Route::get('prod_detail/{product_id}', [HomeController::class, 'prod_detail'])->name('prod_detail');
    Route::get('our_gallery', [HomeController::class, 'our_gallery'])->name('our_gallery');
    Route::get('blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('our_commitments', [HomeController::class, 'our_commitments'])->name('our_commitments');
    Route::get('blog_single/{id}', [HomeController::class, 'blog_single'])->name('blog_single');
    Route::get('confidentiality_privacy', [HomeController::class, 'confidentiality_privacy'])->name('confidentiality_privacy');
    Route::get('legal_information', [HomeController::class, 'legal_information'])->name('legal_information');
});

Route::get('/test-firebase', function () {
    $factory = (new Factory)->withServiceAccount(storage_path('app/firebase/serviceAccount.json'));
    $messaging = $factory->createMessaging();
    return 'Firebase SDK working!';
});

Route::get('/view-logs', [LogViewerController::class, 'index'])->name('logs.view');


//======================================= ADMIN ===================================================
Route::group(['prifix' => 'admin'], function () {
    Route::group(['middleware'=>'admin.guest'],function(){

        Route::get('/admin_index', [adminlogincontroller::class, 'admin_login'])->name('admin_login');
        Route::post('/login_process', [adminlogincontroller::class, 'admin_login_process'])->name('admin_login_process');

    });
Route::group(['middleware'=>'admin.auth'],function(){

 Route::get('/index', [TeamController::class, 'admin_index'])->name('admin_index');
 Route::get('/logout', [adminlogincontroller::class, 'admin_logout'])->name('admin_logout');
 Route::get('/profile', [adminlogincontroller::class, 'admin_profile'])->name('admin_profile');
 Route::get('/view_change_password', [adminlogincontroller::class, 'admin_change_pass_view'])->name('view_change_password');
 Route::post('/admin_change_password', [adminlogincontroller::class, 'admin_change_password'])->name('admin_change_password');

        // Admin Team ------------------------

Route::get('/view_team', [TeamController::class, 'view_team'])->name('view_team');
Route::get('/add_team_view', [TeamController::class, 'add_team_view'])->name('add_team_view');
Route::post('/add_team_process', [TeamController::class, 'add_team_process'])->name('add_team_process');
Route::get('/UpdateTeamStatus/{status}/{id}', [TeamController::class, 'UpdateTeamStatus'])->name('UpdateTeamStatus');
Route::get('/deleteTeam/{id}', [TeamController::class, 'deleteTeam'])->name('deleteTeam');



// Admin CRM settings ------------------------
Route::get('/add_settings', [CrmController::class, 'add_settings'])->name('add_settings');
Route::get('/view_settings', [CrmController::class, 'view_settings'])->name('view_settings');
Route::get('/update_settings/{id}', [CrmController::class, 'update_settings'])->name('update_settings');
Route::post('/add_settings_process', [CrmController::class, 'add_settings_process'])->name('add_settings_process');
Route::post('/update_settings_process/{id}', [CrmController::class, 'update_settings_process'])->name('update_settings_process');
Route::get('/deletesetting/{id}', [CrmController::class, 'deletesetting'])->name('deletesetting');


    Route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');
    Route::get('/vendors/create', [VendorController::class, 'create'])->name('vendors.create');
    Route::post('/vendors', [VendorController::class, 'store'])->name('vendors.store');
    Route::get('/vendors/{id}/edit', [VendorController::class, 'edit'])->name('vendors.edit');
    Route::put('/vendors/{id}', [VendorController::class, 'update'])->name('vendors.update');
    Route::delete('/vendors/{vendor}', [VendorController::class, 'destroy'])->name('vendors.destroy');
    Route::patch('/vendor/{id}/update-status', [VendorController::class, 'updateStatus'])->name('vendors.updateStatus');

  Route::get('/get-citiess/{state_id}', [VendorController::class, 'getCities'])->name('get_city');


    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::patch('/category/{id}/update-status', [CategoryController::class, 'updateStatus'])->name('category.updateStatus');

    Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
    Route::get('/stock/create', [StockController::class, 'create'])->name('stock.create');
    Route::post('/stock', [StockController::class, 'store'])->name('stock.store');
    Route::get('/stock/{id}/edit', [StockController::class, 'edit'])->name('stock.edit');
    Route::put('/stock/{id}', [StockController::class, 'update'])->name('stock.update');
    Route::delete('/stock/{id}', [StockController::class, 'destroy'])->name('stock.destroy');
    Route::patch('/stock/{id}/update-status', [StockController::class, 'updateStatus'])->name('stock.updateStatus');


    Route::get('/stock-col', [StockColController::class, 'index'])->name('stockcol.index');

    Route::get('/stock-col/data', [StockColController::class, 'getData'])->name('stockcol.data');



    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::get('/edit-by/products/{id}', [ProductsController::class, 'editproduct'])->name('products.editby');
    Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
    Route::patch('/products/{id}/update-status', [ProductsController::class, 'updateStatus'])->name('products.updateStatus');


    Route::get('/depots', [DepotsController::class, 'index'])->name('depots.index');
    Route::get('/depots/create', [DepotsController::class, 'create'])->name('depots.create');
    Route::post('/depots', [DepotsController::class, 'store'])->name('depots.store');
    Route::get('/depots/{id}/edit', [DepotsController::class, 'edit'])->name('depots.edit');
    Route::put('/depots/{id}', [DepotsController::class, 'update'])->name('depots.update');
    Route::delete('/depots/{id}', [DepotsController::class, 'destroy'])->name('depots.destroy');
    Route::patch('/depots/{id}/update-status', [DepotsController::class, 'updateStatus'])->name('depots.updateStatus');
Route::get('/get-cities/{state_id}', [DepotsController::class, 'getCities']);


    
    Route::get('/slider1', [Slider1Controller::class, 'index'])->name('slider1.index');
    Route::get('/slider1/create', [Slider1Controller::class, 'create'])->name('slider1.create');
    Route::post('/slider1', [Slider1Controller::class, 'store'])->name('slider1.store');
    Route::get('/slider1/{id}/edit', [Slider1Controller::class, 'edit'])->name('slider1.edit');
    Route::put('/slider1/{id}', [Slider1Controller::class, 'update'])->name('slider1.update');
    Route::delete('/slider1/{vendor}', [Slider1Controller::class, 'destroy'])->name('slider1.destroy');
    Route::patch('/slider1/{id}/update-status', [Slider1Controller::class, 'updateStatus'])->name('slider1.updateStatus');

    Route::get('/slider2', [Slider2Controller::class, 'index'])->name('slider2.index');
    Route::get('/slider2/create', [Slider2Controller::class, 'create'])->name('slider2.create');
    Route::post('/slider2', [Slider2Controller::class, 'store'])->name('slider2.store');
    Route::get('/slider2/{id}/edit', [Slider2Controller::class, 'edit'])->name('slider2.edit');
    Route::put('/slider2/{id}', [Slider2Controller::class, 'update'])->name('slider2.update');
    Route::delete('/slider2/{vendor}', [Slider2Controller::class, 'destroy'])->name('slider2.destroy');
    Route::patch('/slider2/{id}/update-status', [Slider2Controller::class, 'updateStatus'])->name('slider2.updateStatus');

    Route::get('/slider3', [Slider3Controller::class, 'index'])->name('slider3.index');
    Route::get('/slider3/create', [Slider3Controller::class, 'create'])->name('slider3.create');
    Route::post('/slider3', [Slider3Controller::class, 'store'])->name('slider3.store');
    Route::get('/slider3/{id}/edit', [Slider3Controller::class, 'edit'])->name('slider3.edit');
    Route::put('/slider3/{id}', [Slider3Controller::class, 'update'])->name('slider3.update');
    Route::delete('/slider3/{vendor}', [Slider3Controller::class, 'destroy'])->name('slider3.destroy');
    Route::patch('/slider3/{id}/update-status', [Slider3Controller::class, 'updateStatus'])->name('slider3.updateStatus');


    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{vendor}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    Route::patch('/gallery/{id}/update-status', [GalleryController::class, 'updateStatus'])->name('gallery.updateStatus');

    Route::get('/gallery-category', [GalleryCategoryController::class, 'index'])->name('gallery_category.index');
    Route::get('/gallery-category/create', [GalleryCategoryController::class, 'create'])->name('gallery_category.create');
    Route::post('/gallery-category', [GalleryCategoryController::class, 'store'])->name('gallery_category.store');
    Route::get('/gallery-category/{id}/edit', [GalleryCategoryController::class, 'edit'])->name('gallery_category.edit');
    Route::put('/gallery-category/{id}', [GalleryCategoryController::class, 'update'])->name('gallery_category.update');
    Route::delete('/gallery-category/{vendor}', [GalleryCategoryController::class, 'destroy'])->name('gallery_category.destroy');
    Route::patch('/gallery-category/{id}/update-status', [GalleryCategoryController::class, 'updateStatus'])->name('gallery_category.updateStatus');
    
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/contact/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('/contact/{vendor}', [ContactController::class, 'destroy'])->name('contact.destroy');
    Route::patch('/contact/{id}/update-status', [ContactController::class, 'updateStatus'])->name('contact.updateStatus');

    Route::get('/Appointments', [AppointmentsController::class, 'index'])->name('Appointments.index');
    Route::get('/Appointments/create', [AppointmentsController::class, 'create'])->name('Appointments.create');
    Route::post('/Appointments', [AppointmentsController::class, 'store'])->name('Appointments.store');
    Route::get('/Appointments/{id}/edit', [AppointmentsController::class, 'edit'])->name('Appointments.edit');
    Route::put('/Appointments/{id}', [AppointmentsController::class, 'update'])->name('Appointments.update');
    Route::delete('/Appointments/{vendor}', [AppointmentsController::class, 'destroy'])->name('Appointments.destroy');
    Route::patch('/Appointments/{id}/update-status', [AppointmentsController::class, 'updateStatus'])->name('Appointments.updateStatus');


    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{vendor}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::patch('/user/{id}/update-status', [UserController::class, 'updateStatus'])->name('user.updateStatus');


    Route::get('/sni_price', [SniPriceController::class, 'index'])->name('sni_price.index');
    Route::get('/sni_price/create', [SniPriceController::class, 'create'])->name('sni_price.create');
    Route::post('/sni_price', [SniPriceController::class, 'store'])->name('sni_price.store');
    Route::get('/sni_price/{id}/edit', [SniPriceController::class, 'edit'])->name('sni_price.edit');
    Route::put('/sni_price/{id}', [SniPriceController::class, 'update'])->name('sni_price.update');
    Route::delete('/sni_price/{vendor}', [SniPriceController::class, 'destroy'])->name('sni_price.destroy');
    Route::patch('/sni_price/{id}/update-status', [SniPriceController::class, 'updateStatus'])->name('sni_price.updateStatus');

       Route::get('/block', [BlockController::class, 'index'])->name('block.index');
    Route::get('/block/create', [BlockController::class, 'create'])->name('block.create');
    Route::post('/block', [BlockController::class, 'store'])->name('block.store');
    Route::get('/block/{id}/edit', [BlockController::class, 'edit'])->name('block.edit');
    Route::put('/block/{id}', [BlockController::class, 'update'])->name('block.update');
    Route::delete('/block/{vendor}', [BlockController::class, 'destroy'])->name('block.destroy');
    Route::patch('/block/{id}/update-status', [BlockController::class, 'updateStatus'])->name('block.updateStatus');


    
Route::post('/stock-col/delete-limit', [StockColController::class, 'deleteLimit'])->name('stockcol.deleteLimit');

    });

});



