<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\User;

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



Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contact', 'PageController@contactUs')->name('contact');
Route::get('/teams', 'PageController@ourteam')->name('teams');
Route::get('/report', 'PageController@error404')->name('error404');
Route::get('/faq', 'PageController@faq')->name('faq');
Route::get('/privacy', 'PageController@privacy')->name('privacy');
Route::get('/search', 'PageController@search')->name('search');
Route::get('/handles', 'PageController@handles')->name('handles');
Route::get('/changeMinistryCharts/{ministry}', 'HomeController@MinistryCharts')->name('ministry_expenses_charts');
Route::post('/handles', 'PageController@SearchHandles')->name('search-handles');
Route::post('/handles/search', 'PageController@SearchHandle')->name('search-handle');


// Feedback
Route::post('/feedback', 'FeedbackController@create')->name('feedback');

// freedom of acts
Route::get('/FOIA', 'PageController@FOIA')->name('FOIA');

//
Route::get('/contactEmail', 'PageController@contactEmail')->name('contactEmail');

/**
 * Reports Endpoints
 */
Route::get('/expense/report', 'ExpenseController@report')->name('expense.reports');
Route::post('/subscribe', 'SubscriptionController@store')->name('subscribe');

Route::get('/expense/ministry', 'ExpenseController@ministry')->name('expense.ministry');



/***
 * Ministry Endpoints
 */
Route::get('/ministries', 'MinistryController@profile')->name('ministries');
Route::get('/ministries/{ministry}', 'MinistryController@show')->name('ministries.single');
Route::post('/ministries', 'MinistryController@store')->name('ministry_store');
Route::patch('/ministries/{ministry}', 'MinistryController@update')->name('ministry_update');
Route::delete('/ministries/{ministry}', 'MinistryController@destroy')->name('ministry_destroy');
Route::post('/ministries/autocomplete', 'MinistryController@autocomplete')->name('ministry_autocomplete');
Route::get('/expense/filterExpensesAll/{id}/{date}/{sort}/{sector?}', 'ExpenseController@filterExpensesAll')->name('all_ministries_filter_expenses');
Route::get('/expense/filterExpensesChart/{id}/{date}/{sort}/{chartType?}', 'ExpenseController@chartReport')->name('all_ministries_filter_chart');
Route::post('/expense/filterExpensesAll/{id}/{date}/{sort}/{sector?}', 'ExpenseController@filterExpensesAll')->name('all_ministries_search_expenses');

/**
 * Contractor Endpoints
 */
Route::get('/contractors', 'CompanyController@index')->name('contractors');
Route::get('/contractors/{company}', 'CompanyController@show')->name('contractors.single');
Route::post('/contractors/search', 'CompanyController@searchContractors')->name('contractors.search');

Route::get('/ministry-graph', 'PageController@ministryGraph')->name('ministry-graph');
Route::get('/expense-graph', 'PageController@expenseGraph')->name('expense-graph');
Route::get('/project-modal', 'PageController@projectModal')->name('project-modal');

Route::get('/ministry/getUrl', 'PageController@ministryGetUrl')->name('ministry_get_url');
Route::get('/ministry/filterExpenses', 'MinistrySearchController@filterExpenses')->name('ministry_filter_expenses');
Route::post('ministry/filterExpenses', 'MinistrySearchController@filterExpenses')->name('ministry_search_expenses');

/**
 * Email sending API
 */
Route::post('/sendmail', 'EmailController@sendMail')->name('sendmail');

/*
    Terms Of Service Endpoints
*/


Route::get('/accessibility', 'PageController@accessibility')->name('accessibility');

/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "auth" middleware group. Now create something great!
|
 */


// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');  // Matches The "/admin/dashboard" URL
//     Route::post('/create_expense', 'DashboardController@createExpense');
// Route::post('/create_company', 'DashboardController@createCompany');
// });

/*Route::group(['middleware' => ['auth']], function (){
    Route::get('/admin/company/create', 'CompanyController@create')->name('company.create');
    Route::post('/admin/company/create', 'CompanyController@createCompany')->name('create.company');
    Route::get('/admin/company/view', 'CompanyController@viewCompanies')->name('company.view');
    Route::get('/admin/company/edit/{company_id}', 'CompanyController@showEditForm')->name('company.view.edit');
    Route::put('/admin/company/edit/{company_id}', 'CompanyController@editCompany')->name('company.edit');
    Route::delete('/admin/company/delete/{company_id}', 'CompanyController@deleteCompany')->name('company.delete');
    Route::get('/admin/ministry/create', 'MinistryController@viewCreateMinistry')->name('ministry.create');
    Route::post('/admin/ministry/create', 'MinistryController@createMinistry')->name('create.ministry');
    Route::get('/admin/ministry/view', 'MinistryController@viewMinistries')->name('ministry.view');
    Route::get('/admin/ministry/edit/{ministry_id}', 'MinistryController@showEditForm')->name('ministry.view.edit');
    Route::put('/admin/ministry/edit/{ministry_id}', 'MinistryController@editMinistry')->name('ministry.edit');
    Route::delete('/admin/ministry/delete/{ministry_id}', 'MinistryController@deleteMinistry')->name('ministry.delete');
});*/


 // Route::group(['prefix' => 'admin', 'middleware' => [] ], function() {
 //    Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); // Matches The "/admin/dashboard" URL


 Route::group(['prefix' => 'admin', 'middleware' => ['auth'] ], function () {
     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
      // Matches The "/admin/dashboard" URL
     Route::delete('/activity/delete/{activity_id}', 'DashboardController@deleteActivity')->name('activity.delete');
    Route::put('/activity/all/', 'DashboardController@seenAllNotifications')->name('allactivity.edit');
    Route::put('/activity/mark/{activity_id}', 'DashboardController@seenActivity')->name('activity.update');



     // Expense CRUD
     Route::get('/expenses', 'Admin\ExpenseController@index')->name('expenses.view');
     Route::get('/expenses/create', 'Admin\ExpenseController@createExpense')->name('expenses.create');
     Route::post('/expenses/create', 'Admin\ExpenseController@storeExpense')->name('expenses.store');
     Route::get('/expenses/edit/{expense_id}', 'Admin\ExpenseController@editExpense')->name('expenses.edit');
     Route::put('/expenses/edit/{expense_id}', 'Admin\ExpenseController@updateExpense')->name('expenses.update');
     Route::delete('/expenses/delete/{expense_id}', 'Admin\ExpenseController@deleteExpense')->name('expenses.delete');


     // Company CRUD
     Route::get('/company/create', 'CompanyController@create')->name('company.create');
     Route::post('/company/create', 'CompanyController@createCompany')->name('create.company');
     Route::get('/company/view', 'CompanyController@viewCompanies')->name('company.view');
     Route::get('/company/edit/{company_id}', 'CompanyController@showEditForm')->name('company.view.edit');
     Route::put('/company/edit/{company_id}', 'CompanyController@editCompany')->name('company.edit');
     Route::delete('/company/delete/{company_id}', 'CompanyController@deleteCompany')->name('company.delete');



      // MiNISTY CRUD
      Route::get('/ministry/create', 'MinistryController@viewCreateMinistry')
      ->name('ministry.create');
      Route::post('/ministry/create', 'MinistryController@createMinistry')
      ->name('create.ministry');
      Route::get('/ministry/view', 'MinistryController@viewMinistries')
      ->name('ministry.view');
      Route::get('/ministry/edit/{ministry_id}', 'MinistryController@showEditForm')
      ->name('ministry.view.edit');
      Route::put('/ministry/edit/{ministry_id}', 'MinistryController@editMinistry')
      ->name('ministry.edit');
      Route::delete('/ministry/delete/{ministry_id}', 'Admin\MinistryController@deleteMinistry')
      ->name('ministry.delete');

      // SECTOR CRUD
      Route::get('/sector/create', 'SectorController@viewCreateSector')
      ->name('sector.create');
      Route::post('/sector/create', 'SectorController@createSector')
      ->name('create.sector');
      Route::get('/sector/view', 'SectorController@viewSectors')
      ->name('sector.view');
      Route::get('/sector/edit/{sector_id}', 'SectorController@showEditForm')
      ->name('sector.view.edit');
      Route::put('/sector/edit/{sector_id}', 'SectorController@editSector')
      ->name('sector.edit');
      Route::delete('/sector/delete/{sector_id}', 'Admin\SectorController@deleteSector')
      ->name('sector.delete');

      //People CRUD
      Route::get('/admin/{company}/{people}', 'CompanyController@showPeople');

      // USERS CRUD
      Route::get('/users', 'Admin\UserController@index')->name('users.view');
      Route::get('/users/create', 'Admin\UserController@create')->name('users.create');
      Route::post('/users/create', 'Admin\UserController@store')->name('users.store');
      Route::get('/users/edit/{user_id}', 'Admin\UserController@edit')->name('users.edit');
      Route::put('/users/edit/{user_id}', 'Admin\UserController@update')->name('users.update');
      Route::put('/users/change_password/{user_id}', 'Admin\UserController@updatePassword')->name('users.change_password');
      Route::delete('/users/delete/{user_id}', 'Admin\UserController@destroy')->name('users.delete');

     //Profile Page
     Route::get('/profile', 'ProfileController@viewProfile')->name('profile');
     Route::get('/user/profile', 'ProfileController@index')->name('users.profile');
     Route::get('/profile/edit/{user_id}', 'ProfileController@edit')->name('profile.edit');
     Route::put('/profile/edit/{user_id}', 'ProfileController@update')->name('profile.update');
     Route::put('/profile/change_password/{user_id}', 'ProfileController@updatePassword')->name('profile.change_password');

     //Settings Page
     Route::get('/user/settings', 'SettingsController@index')->name('users.settings');
     Route::put('/settings/change_password/{user_id}', 'SettingsController@ChangePassword')->name('settings.change_password');
     Route::post('/user/settings/update', 'SettingsController@updateSidebar')->name('sidebar.settings');


    
     // Cabinet CRUD
     Route::get('/cabinet/create', 'CabinetController@create')
     ->name('cabinet.create');

     Route::post('/cabinet/create', 'CabinetController@createCabinet')
     ->name('create.cabinet');

     Route::get('/cabinet/view', 'CabinetController@viewCabinets')
     ->name('cabinet.view');

     Route::get('/cabinet/edit/{cabinet_id}', 'CabinetController@showEditForm')
     ->name('cabinet.view.edit');

     Route::put('/cabinet/edit/{cabinet_id}', 'CabinetController@editCabinet')
     ->name('cabinet.edit');

     Route::delete('/cabinet/delete/{cabinet_id}', 'CabinetController@deleteCabinet')
     ->name('cabinet.delete');

      //  Route::get('/user/profile', 'ProfileController@index')->name('users.profile');
      Route::get('/import', 'UploadController@importFile');
      Route::post('/import', 'UploadController@importExcel')->name('importExcel');

      //SUBSCRIPTION
      Route::get('/subcribe', 'Admin\SubscriptionController@index')
      ->name('subscribe.view');
      // Cabinet CRUD
     Route::get('/subscribe/create', 'Admin\SubscriptionController@create')
     ->name('subscribe.create');

     Route::post('/subscribe/create', 'Admin\SubscriptionController@createSub')
     ->name('create.subscribe');

     Route::get('/subscribe/edit/{subscription_id}', 'Admin\SubscriptionController@showEditForm')
     ->name('subscribe.view.edit');

     Route::put('/subscribe/edit/{subscription_id}', 'Admin\SubscriptionController@editSub')
     ->name('subscribe.edit');

     Route::delete('/subscribe/delete/{subscription_id}', 'Admin\SubscriptionController@deleteSub')
     ->name('subscribe.delete');

      Route::get('/feedback/approve/{id}', 'FeedbackController@approve')
      ->name('feedback.approve');
     Route::get('/feedback/ignore/{id}', 'FeedbackController@ignore')
     ->name('feedback.ignore');


     // COMMENTS ROUTES
    Route::get('/comments', 'Admin\CommentController@index')->name('comments');  //Displays the index page for all comments


     // Payments CRUD
      Route::get('/payments', 'Admin\PaymentController@index')->name('payments.view');

      Route::get('/payments/create', 'Admin\PaymentController@create')->name('payments.create');
      Route::post('/payments/create', 'Admin\PaymentController@store')->name('payments.store');

      Route::get('/payments/edit/{payment_id}', 'Admin\PaymentController@edit')->name('payments.edit');
      Route::put('/payments/edit/{payment_id}', 'Admin\PaymentController@update')->name('payments.update');


      Route::delete('/payments/delete/{payment_id}', 'Admin\PaymentController@destroy')->name('payments.delete');

      // Team CRUD
      Route::get('/team/create', 'TeamController@viewCreateTeam')
      ->name('team.create');
      Route::post('/team/create', 'TeamController@createTeam')
      ->name('create.team');
      Route::get('/team/view', 'TeamController@viewTeam')
      ->name('team.view');
      Route::get('/team/edit/{team_id}', 'TeamController@showEditForm')
      ->name('team.view.edit');
      Route::put('/team/edit/{team_id}', 'TeamController@editTeam')
      ->name('team.edit');
      Route::delete('/team/delete/{team_id}', 'TeamController@deleteTeam')
      ->name('team.delete');


      //Sheets
      Route::get('/sheets', 'Admin\SheetController@viewSheets')->name('sheets');
      Route::get('/sheet/parse/{sheet_id}', 'Admin\SheetController@parseSheet')
      ->name('sheet.parse');

      Route::get('/website_stats', 'Website_Statistics_Controller@index')->name('website_stats');
 });


/* Admin backend routes - CRUD for posts, categories, and approving/deleting submitted comments */
    Route::group(['prefix' => 'admin/blog', 'middleware' => 'auth'], static function () {

        Route::get('/', 'Admin\ManagePostsController@index')->name('blogetc.admin.index');

        Route::get('/add_post', 'Admin\ManagePostsController@create')->name('blogetc.admin.create_post');
        Route::post('/add_post', 'Admin\ManagePostsController@store')->name('blogetc.admin.store_post');

        Route::get('/edit_post/{blogPostId}', 'Admin\ManagePostsController@edit')->name('blogetc.admin.edit_post');
        Route::patch('/edit_post/{blogPostId}', 'Admin\ManagePostsController@update')->name('blogetc.admin.update_post');

        Route::group(['prefix' => 'image_uploads', 'middleware' => 'auth'], static function () {
            Route::get('/', 'Admin\ManageUploadsController@index')->name('blogetc.admin.images.all');

            Route::get('/upload', 'Admin\ManageUploadsController@create')->name('blogetc.admin.images.upload');
            Route::post('/upload', 'Admin\ManageUploadsController@store')->name('blogetc.admin.images.store');

            Route::get('/post/{postId}/delete-images', 'Admin\ManageUploadsController@deletePostImage')->name('blogetc.admin.images.delete-post-image');
            Route::delete('/post/{postId}/delete-images', 'Admin\ManageUploadsController@deletePostImageConfirmed')->name('blogetc.admin.images.delete-post-image-confirmed');
        });

        Route::post('/delete_post/{blogPostId}', 'Admin\ManagePostsController@destroy')->name('blogetc.admin.destroy_post');

        Route::group(['prefix' => 'comments'], static function () {
            Route::get('/', 'Admin\ManageCommentsController@index')->name('blogetc.admin.comments.index');
            Route::patch('/{commentId}', 'Admin\ManageCommentsController@approve')->name('blogetc.admin.comments.approve');

            Route::delete('/{commentId}', 'Admin\ManageCommentsController@destroy')->name('blogetc.admin.comments.delete');
        });

        Route::group(['prefix' => 'categories', 'middleware' => 'auth'], static function () {
            Route::get('/', 'Admin\ManageCategoriesController@index')->name('blogetc.admin.categories.index');

            Route::get('/add_category', 'Admin\ManageCategoriesController@create')->name('blogetc.admin.categories.create_category');
            Route::post('/add_category', 'Admin\ManageCategoriesController@store')->name('blogetc.admin.categories.store_category');

            Route::get('/edit_category/{categoryId}', 'Admin\ManageCategoriesController@edit')->name('blogetc.admin.categories.edit_category');
            Route::patch('/edit_category/{categoryId}', 'Admin\ManageCategoriesController@update')->name('blogetc.admin.categories.update_category');

            Route::delete('/delete_category/{categoryId}', 'Admin\ManageCategoriesController@destroy')->name('blogetc.admin.categories.destroy_category');
        });
    });





    Route::get('/ggg', 'Website_Statistics_Controller@dds')->name('ggg');



    Auth::routes();


//admin route
    Route::get('/admin', function () {
        return redirect(route('dashboard'));
    });

    Route::get('/startRT', 'TwitterBot@startLiveRetweet');
    Route::get('/stopRT', 'TwitterBot@stopLiveRetweet');
    Route::post('/post_tweet', 'TwitterBot@sendTweet');
    Route::post('/retweet', 'TwitterBot@retweet');
    Route::get('/tweets', 'TwitterBot@getTweet');
    Route::delete('delete_tweet', 'TwitterBot@delete');
    Route::post('parse_sheet', 'SheetParsing@parse');
    Route::post('tweet_payment', "TwitterBot@tweetPayment");
