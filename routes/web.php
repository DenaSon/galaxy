<?php

use App\Http\Middleware\RoleMiddleware;
use App\Livewire\Admin\Blog\Categories;
use App\Livewire\Admin\Blog\CreateBlog;
use App\Livewire\Admin\Blog\EditBlog;
use App\Livewire\Admin\Blog\ListBlog;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Shop\CreateAttribute;
use App\Livewire\Admin\Shop\CreateProduct;
use App\Livewire\Admin\Shop\ListProduct;
use App\Livewire\Admin\Shop\Orders\OrderList;
use App\Livewire\Admin\Shop\Pages\CreatePage;
use App\Livewire\Admin\Shop\PriceManagement;
use App\Livewire\App\Blog\SingleBlog;
use App\Livewire\App\Home\HomeIndex;
use App\Livewire\App\Profile\Order\OrderDetails;
use App\Livewire\App\Profile\ProfileAddress;
use App\Livewire\App\Profile\ProfileDashboard;
use App\Livewire\App\Profile\ProfileInformation;
use App\Livewire\App\Shop\Cart\ShopCart;
use App\Livewire\App\Shop\Checkout;
use App\Livewire\App\Shop\CheckoutPayment;
use App\Livewire\App\Shop\ProductList;
use App\Livewire\App\Shop\SinglePage;
use App\Livewire\App\Shop\SingleProduct;
use Illuminate\Support\Facades\Route;

Route::post('/login', [\App\Livewire\App\System\LoginPage::class, 'login']);

Route::get('/login', [\App\Livewire\App\System\LoginPage::class, 'login'])->name('login');
Route::get('/contact-us', \App\Livewire\App\Shop\ContactUs::class)->name('contact-us');


Route::name('home.')->group(function () {

    Route::get('', HomeIndex::class)->name('index-home');
    Route::get('/logout', \App\Livewire\App\System\Logout::class)->name('logout');


    Route::prefix('store')->name('product.')->group(function () {

        Route::get('/',\App\Livewire\App\Shop\Store::class)->name('indexStore');
        Route::get('product/{product}/{slug}', SingleProduct::class)->name('singleProduct');
        Route::get('category/{category}/{slug}', ProductList::class)->name('singleCategory');

    });

    Route::get('page/{page}/{slug}', SinglePage::class)->name('singlePage');

    Route::prefix('blog')->name('blog.')->group(function () {

        Route::get('/{blog}/{slug}', SingleBlog::class)->name('singleBlog');


    });


});

Route::middleware([RoleMiddleware::class . ':customer', 'auth:web'])->name('panel.')->group(function () {

    Route::get('/order/pax-{order}', OrderDetails::class)->name('orderDetails');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/orders', \App\Livewire\App\Profile\Order\OrderList::class)->name('user.orders.list');
        Route::get('/dashboard', ProfileDashboard::class)->name('profileDashboard');
        Route::get('/address', ProfileAddress::class)->name('profileAddress');
        Route::get('/information', ProfileInformation::class)->name('profileInformation');

    });

    Route::get('/cart', ShopCart::class)->name('shop.cart');
    Route::get('/checkout', Checkout::class)->name('checkout');
    Route::get('/checkout/payment', CheckoutPayment::class)->name('checkoutPayment');

});


// Master group
Route::middleware(['auth:web', RoleMiddleware::class . ':master', 'throttle:15,2'])->prefix('master')->name('master.')->group(function () {
    // Master Dashboard route
    Route::get('/', Dashboard::class)->name('dashboard')->lazy();
    Route::get('system/setting', \App\Livewire\Admin\System\Setting::class)->name('setting');
    Route::get('system/upload-center', \App\Livewire\Admin\System\UploadCenter::class)->name('uploadCenter');


    // Blog subgroup
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('create', CreateBlog::class)->name('create');
        Route::get('edit/{blog}', EditBlog::class)->name('edit');
        Route::get('list', ListBlog::class)->name('list')->lazy();
        Route::get('categories', Categories::class)->name('categories')->lazy();
    });

    Route::prefix('page')->name('page.')->group(function () {
        Route::get('create', CreatePage::class)->name('createPage');
    });

    // Shop subgroup
    Route::prefix('shop')->name('shop.')->group(function () {
        Route::get('create', CreateProduct::class)->name('create');
        Route::get('list', ListProduct::class)->name('list');
        Route::get('categories', \App\Livewire\Admin\Shop\Categories::class)->name('categories')->lazy();
        Route::get('attribute', CreateAttribute::class)->name('attribute')->lazy();
        Route::get('orders', OrderList::class)->name('orders');
        Route::get('order-{order}', \App\Livewire\Admin\Shop\Orders\OrderDetail::class)->name('orderDetail');

        //prices
        Route::get('price-management', PriceManagement::class)->name('price-management');
    });
});

