<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountsController;
use App\Http\Controllers\UserMediaController;
use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserDeviceController;
use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TaxAndChargesController;
use App\Http\Controllers\helpAndSupportController;
// use App\Http\Controllers\AppointmentDisputeController;
use App\Http\Controllers\CustomChangePasswordController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\PaymentController;

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
// \Log::debug('luch bhi');
Route::middleware(['auth'])->group(function () {

    Route::post('/setDeviceToken', [UserDeviceController::class, 'setDeviceToken']);
    Route::post('/removeDeviceToken', [UserDeviceController::class, 'removeDeviceToken']);
    Route::prefix('Activity')->group(function () {
        Route::get('/activitylist', [ActivityController::class, 'activityList'])->name('activity.list');
        Route::get('/activityCount', [ActivityController::class, 'countNotification'])->name('activity.count');
    });

    Route::prefix('user')->group(function () {
        Route::get('/userList', [UserController::class, 'getUsers'])->name('user.list');
        Route::delete('/delete/{nannies}', [UserController::class, 'deleteNanny'])->name('nannies.delete');
        Route::get('/userinfo/{nanny}/{isView?}/{type?}', [UserController::class, 'nannyinfo'])->name('nannies.info');
        // Route::get('/getbookings/{nannies}', [AppoinmentController::class, 'getUserBooking'])->name('getUser.bookings');
        Route::put('/updateuser/{nannies}', [UserController::class, 'updateuser'])->name('nannies.update');
        Route::post('/updateuser/{vehicle_id}', [UserController::class, 'updatNannyVehicle'])->name('update.nannyvehicle');
        Route::get('/editNanny/{nannies}', [UserController::class, 'editNanny'])->name('nannies.edit');
    });
    Route::prefix('content')->group(function () {
        Route::get('/contentlist', [ContentController::class, 'getContains'])->name('content.list');
        Route::get('/contentForm', [ContentController::class, 'containForm'])->name('content.swform');
        Route::Post('/contentAdd', [ContentController::class, 'createContain'])->name('content.add');
        Route::delete('/deleteContent/{content}', [ContentController::class, 'deleteContent'])->name('content.delete');
        Route::get('/editContent/{content}', [ContentController::class, 'editContent'])->name('content.edit');
        Route::put('/updateContent/{content}', [ContentController::class, 'updateContent'])->name('content.update');
    });
    Route::prefix('offer')->group(function () {
        Route::get('/offerlist', [OfferController::class, 'getOffers'])->name('offer.list');
        Route::get('/offerForm', [OfferController::class, 'create'])->name('offer.form');
        Route::Post('/offerAdd', [OfferController::class, 'add'])->name('offer.add');
        Route::delete('/deleteoffer/{offer}', [OfferController::class, 'delete'])->name('offer.delete');
        Route::get('/editoffer/{offer}', [OfferController::class, 'edit'])->name('offer.edit');
        Route::put('/updateoffer/{offer}', [OfferController::class, 'update'])->name('offer.update');
    });
    Route::prefix('reward')->group(function () {
        Route::get('/rewardlist', [RewardController::class, 'getrewards'])->name('reward.list');
        Route::get('/rewardForm', [RewardController::class, 'create'])->name('reward.form');
        Route::Post('/rewardAdd', [RewardController::class, 'add'])->name('reward.add');
        Route::delete('/deletereward/{reward}', [RewardController::class, 'delete'])->name('reward.delete');
        Route::get('/editreward/{reward}', [RewardController::class, 'edit'])->name('reward.edit');
        Route::put('/updatereward/{reward}', [RewardController::class, 'update'])->name('reward.update');
    });
    Route::prefix('product')->group(function () {
        Route::get('/productlist', [ProductController::class, 'getproducts'])->name('product.list');
        Route::get('/productForm', [ProductController::class, 'create'])->name('product.form');
        Route::Post('/productAdd', [ProductController::class, 'add'])->name('product.add');
        Route::delete('/deleteproduct/{product}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/editproduct/{product}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/updateproduct/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/productstatus/{product_id}/{status}', [ProductController::class, 'updateStatus'])->name('product.status');
    });
    Route::prefix('survey')->group(function () {
        Route::get('/surveylist', [SurveyController::class, 'getSurveys'])->name('survey.list');
        Route::get('/surveyForm', [SurveyController::class, 'create'])->name('survey.form');
        Route::Post('/surveyAdd', [SurveyController::class, 'add'])->name('survey.add');
        Route::delete('/deletereward/{survey}', [SurveyController::class, 'delete'])->name('survey.delete');
        Route::get('/editreward/{survey}', [SurveyController::class, 'edit'])->name('survey.edit');
        Route::put('/updatereward/{survey}', [SurveyController::class, 'update'])->name('survey.update');
    });
    Route::prefix('setting')->group(function () {
        Route::get('/settinglist', [SettingController::class, 'getsettings'])->name('setting.list');
        Route::put('/updatereward/{setting}', [SettingController::class, 'update'])->name('setting.update');
    });
    Route::prefix('faqs')->group(function () {
        Route::get('/faqsList', [FaqsController::class, 'getfaqs'])->name('faqs.list');
        Route::get('/faqcreate', [FaqsController::class, 'create'])->name('faq.form');
        Route::post('/faqadd', [FaqsController::class, 'add'])->name('faqs.add');
        Route::get('/edit/{faqs}', [FaqsController::class, 'edit'])->name('faq.edit');
        Route::delete('/delete/{faqs}', [FaqsController::class, 'delete'])->name('faq.delete');
        Route::put('/update/{faqs}', [FaqsController::class, 'update'])->name('faq.update');
    });
    Route::prefix('order')->group(function () {
        Route::get('/statusupdate/{order}/{status}', [OrderController::class, 'statusUpdate'])->name('status.update');
    });

    Route::prefix('userProfile')->group(function () {
        Route::get('/userProfile', [UserProfileController::class, 'userProfileForm'])->name('userProfile.Form');
        Route::put('/userProfileUpdate', [UserProfileController::class, 'userProfileUpdate'])->name('userProfile.Update');
    });
    Route::prefix('userMedia')->group(function () {
        Route::get('/userMedia/{userMedia}', [UserMediaController::class, 'mediaAprove'])->name('userMedia.aprove');
        Route::get('/userMediaDelete/{userMedia}', [UserMediaController::class, 'mediaDelete'])->name('userMedia.delete');
    });
    Route::prefix('updatePassword')->group(function () {

        Route::Put('/updatePassword', [CustomChangePasswordController::class, 'updatePassword'])->name('update.Password');
        Route::get('/update.PasswordForm', [CustomChangePasswordController::class, 'updatePasswordForm'])->name('update.PasswordForm');
    });

    // Route::get('/agreementlist', [AgreementController::class, 'getAgreement'])->name('agreement.list');
    // Route::get('/serviceslist', [ServiceController::class, 'getServices'])->name('services.list');
    // Route::get('/bookingslist', [AppoinmentController::class, 'getBookings'])->name('bookings.list');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/logintest', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::get('/', function () {
    return view('web.home');
});
Route::get('/webfaqs', function () {
    return view('web.Faqs');
})->name('web.faqs');
Route::get('/becomdoner', function () {
    return view('web.BecomAdoner');
})->name('becom.doner');
Route::get('/doner/register', [RegisterController::class, 'showRegistrationForm'])->name('register.doner');
Route::post('/web/filter', [FilterController::class, 'filterView'])->name('web.filterWiew');
Route::get('/web/checkoutlist', [CheckoutController::class, 'checkOutList'])->name('web.checkOutList');
Route::get('/web/proceedCheckoutview', [CheckoutController::class, 'proceedCheckoutview'])->name('web.proceedCheckoutview');
Route::post('/web/submitpaymentdetail', [PaymentController::class, 'submitPaymentDetail'])->name('web.SubmitPaymentDetail');




Route::get('/clear', function () {
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    // composer dump-autoload
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    return 'clear all';
})->name('LP');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
