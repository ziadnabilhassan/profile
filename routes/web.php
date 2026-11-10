<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\MailController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\GenderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Front\CouponController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProcessController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\TypecertificateController;

use App\Http\Controllers\Admin\QualitiesController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController ;

use App\Http\Controllers\Admin\SettingController;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\Front\OrderCartController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Front\ProductWebController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\CategoryTypeController;
use App\Http\Controllers\Admin\DownloadtypeController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\SolutionController;
use App\Http\Controllers\Admin\CountController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\SolutionitemController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\PaymopController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Front\ShoppingCartController;
use App\Http\Controllers\Admin\ProductVariantController;
use Illuminate\Support\Facades\Crypt;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



use App\Http\Controllers\User\ProfileController as AuthController;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
        require __DIR__ . '/auth.php';

        // admin dashboard
        Route::prefix('websolla-db')->middleware(['auth', 'admin'])->group(function () {
            Route::view('/', 'dashboard')->name('dashboard');

            Route::resource('/sliders', SliderController::class);
            Route::resource('/pages', PageController::class);
            Route::resource('/solutions', SolutionController::class);
            Route::resource('/typecertificates', TypecertificateController::class);
            Route::resource('/solutionitems', SolutionitemController::class);
            Route::resource('/reviews', ReviewController::class);
            Route::resource('/supports', SupportController::class);
            Route::resource('/locations', LocationController::class);
            Route::resource('/galleries', GalleryController::class);
            Route::resource('/services', ServiceController::class);
            Route::resource('/process', ProcessController::class);
            Route::resource('/certificates', CertificateController::class);
            Route::resource('/counts', CountController::class);
            Route::resource('/qualities', QualitiesController::class);
            Route::resource('/reports', ReportController::class);
            Route::resource('/offers', OfferController::class);
            Route::resource('/settings', SettingController::class);
            Route::resource('/messages', MessageController::class);
            Route::resource('/newsletters', NewsletterController::class);
            Route::resource('/category-types', CategoryTypeController::class);
            Route::resource('/categories', CategoryController::class);
            Route::resource('/downloadtypes', DownloadtypeController::class);
            Route::resource('/downloads', DownloadController::class);
            Route::resource('/promocodes', PromocodeController::class);
            Route::resource('/deliveries', DeliveryController::class);
            Route::resource('/faqs', FaqController::class);
            Route::resource('/colors', ColorController::class);
            Route::resource('/genders', GenderController::class);
            Route::resource('/products', ProductController::class);
            Route::get('/category/{id}/genders', [ProductController::class, 'getGenders']);

            Route::post('/products/shoo/{id}', [ProductController::class, 'shoo'])->name('shoo');
            Route::resource('/orders', OrderController::class);
            Route::resource('/users', ClientController::class);
            Route::post('/orders/change-status/{id}', [OrderController::class, 'changeStatus'])->name('orders.status');
            Route::get('/product/images/{id}', [ProductImageController::class, 'index'])->name('product.images');
            Route::post('/product/images/store', [ProductImageController::class, 'store'])->name('product.images.store');
            Route::post('/product/images/update', [ProductImageController::class, 'update'])->name('product.images.update');
            Route::post('/product/images/delete', [ProductImageController::class, 'delete'])->name('product.images.delete');

            // Route::get('/product/variants/{id}', [ProductVariantController::class, 'index'])->name('product.variants');
            // Route::post('/product/variants/store', [ProductVariantController::class, 'store'])->name('product.variants.store');
            // Route::post('/product/variants/update', [ProductVariantController::class, 'update'])->name('product.variants.update');
            // Route::post('/product/variants/delete', [ProductVariantController::class, 'delete'])->name('product.variants.delete');

            Route::get('/contact', [ContactController::class, 'index'])->name('contact');
            Route::post('/contact', [ContactController::class, 'update'])->name('contact.update');
            Route::get('/social', [ContactController::class, 'social'])->name('social');
            Route::post('/social', [ContactController::class, 'updateSocial'])->name('social.update');
        });
        Route::get('/payment/{id}', function ($id) {

            return view('website.payment', ['order_id' => $id]);
        })->name('payment');
        Route::post('/pay/{encrypted_id}', [PaymopController::class, 'createIntention'])
            ->name('paymop.create');
        Route::get('/pay/checkout', [PaymopController::class, 'callback'])->name('payment.callback');

        Route::get('/website/success', function () {
            return view('website.success');
        })->name('website.success');

        Route::get('/website/failed', function () {
            return view('website.failed');
        })->name('website.failed');

        // website
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/about', [HomeController::class, 'page'])->name('about');
        Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
        Route::get('/quality', [HomeController::class, 'quality'])->name('quality');
        Route::get('/company-profile', [HomeController::class, 'company_profile'])->name('company-profile');
        Route::get('/company-culture', [HomeController::class, 'company_culture'])->name('company-culture');
        Route::get('/honor', [HomeController::class, 'honor'])->name('honor');
        Route::get('/oem', [HomeController::class, 'oem'])->name('oem');
        Route::get('/investor', [HomeController::class, 'investor'])->name('investor');
        Route::get('/page/{id}/{slug?}', [HomeController::class, 'page'])->name('page');
      Route::get('/solutions/{id}/{slug?}', [HomeController::class, 'solution'])->name('solution');
        Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');
        Route::get('/download-center', [HomeController::class, 'download_center'])->name('download-center');
        Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
        Route::get('/global-network', [HomeController::class, 'global_network'])->name('global-network');
        Route::post('contacts/meassage', [MailController::class, 'sendMail'])->name('contact.mail');
        Route::post('newsletter/meassage', action: [MailController::class, 'sendLetter'])->name('newsletter.message');
        Route::get('/services', [HomeController::class, 'services'])->name('services');
        Route::get('/service/{id}/{slug?}', [HomeController::class, 'serviceDetails'])->name('service.details');
        Route::get('/previous_work', [HomeController::class, 'previous_work'])->name('previous_work');
        Route::get('/message', [HomeController::class, 'message'])->name('message');
        Route::get('/work_details/{id}/{slug?}', [HomeController::class, 'workDetails'])->name('work.details');
        Route::get('/category-type/{id}/{slug?}/products', [ProductWebController::class, 'categoryType'])->name('type');
        Route::get('/category/{id}/{slug?}/products', [ProductWebController::class, 'category'])->name('category');
        Route::get('/solutionitem/{id}/{slug?}', [HomeController::class, 'solutionitem'])->name('solutionitem');

        Route::get('/gender/{id}/{slug?}/products', [ProductWebController::class, 'gender'])->name('gender');
        Route::get('/products', [ProductWebController::class, 'products'])->name('products');
        Route::get('/offers', [ProductWebController::class, 'offers'])->name('offers');
        Route::get('/product/{id}/{slug?}', [ProductWebController::class, 'productDetails'])->name('product.details');
        Route::get('/quickview/{variantId}/', [ProductWebController::class, 'quickView'])->name('product.quickView');
        Route::get(
            '/get-unique-colors-by-variant-size/{product_id}/{color_id}/',
            [ProductWebController::class, 'getUniqueColorsByVariantSize']
        )->name('product.colors');
        Route::prefix('auth/profile')->middleware('auth')->group(function () {
            Route::get('/', [AuthController::class, 'index'])->name('profile.index');
            Route::post('/info', [AuthController::class, 'info'])->name('profile.info.update');
            Route::post('/address', [AuthController::class, 'address'])->name('profile.address.update');
            Route::post('/password', [AuthController::class, 'password'])->name('profile.password.update');
            Route::get('/order/{id}', [AuthController::class, 'order'])->name('profile.order.show');
        });

        // cart
        Route::get('cart', [ShoppingCartController::class, 'index'])->name('cart');
        Route::post('/cart/add', [ShoppingCartController::class, 'addToCart'])->name('cart.add');
        Route::post('/cart/update', [ShoppingCartController::class, 'update'])->name('cart.update');
        Route::post('/cart/remove', [ShoppingCartController::class, 'remove'])->name('cart.remove');
        Route::post('/applay-coupon', [CouponController::class, 'applayCoupon'])->name('coupon');

        Route::prefix('checkout')->group(function () {
            Route::get('/', [OrderCartController::class, 'index'])->name('checkout');
            Route::post('/', [OrderCartController::class, 'storeOrder'])->name('checkout');
        });
        // Route::get('/order/complete', [OrderCartController::class, 'complete'])->name('order.complete');

        // Route::get('fff', function () {
        //     // Cart::clear();
        //     return Cart::getContent();
        // });
    }
);
