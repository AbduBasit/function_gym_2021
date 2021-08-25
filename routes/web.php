<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController,
    App\Http\Controllers\UserController,
    App\Http\Controllers\TrainerController,
    App\Http\Controllers\ActivityController,
    App\Http\Controllers\PosController;

Route::get('/', 'App\Http\Controllers\FitoadminController@page_login');
Route::post('login_process', [UserController::class, 'checkpoint']);
Route::get('logout', [UserController::class, 'logout']);
Route::group(['middleware' => ['protectedCMS']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\FitoadminController@dashboard_1');

    // Complete Customer Module
    Route::get('/create-customer', 'App\Http\Controllers\FitoadminController@form_wizard');
    Route::post('create-customer', [CustomerController::class, 'create_data']);
    Route::get('manage-customer', 'App\Http\Controllers\FitoadminController@table_bootstrap_basic');
    Route::get('customer-view/{id}', [CustomerController::class, 'customer_view']);
    Route::get('customer-delete/{id}', [CustomerController::class, 'customer_delete']);
    Route::get('customer-edit/{id}', [CustomerController::class, 'customer_update_show']);
    Route::post('update-customer', [CustomerController::class, 'customer_update']);
    Route::get('customer-edit-pt/{id}', [CustomerController::class, 'customer_update_pt']);
    Route::get('pt-customer-details', [CustomerController::class, 'pt_trainer_details']);
    Route::post('create-pt-details', [CustomerController::class, 'add_pt_details']);
    Route::post('update-pt', [CustomerController::class, 'update_pt']);

    Route::get('add_fees/{id}', [CustomerController::class, 'index_fees_add']);



    // Trainer Module
    Route::get('/create-trainer', [TrainerController::class, 'create_data']);
    Route::post('/create-trainer', [TrainerController::class, 'create_new_trainer']);
    Route::get('manage-trainer', [TrainerController::class, 'trainer_manage']);
    Route::get('trainer-view/{id}', [TrainerController::class, 'trainer_view']);
    Route::get('trainer-delete/{id}', [TrainerController::class, 'trainer_delete']);
    Route::get('trainer-edit/{id}', [TrainerController::class, 'update_trainer']);
    Route::post('update_trainer', [TrainerController::class, 'update']);
    Route::get('trainer-schedule/{id}', [TrainerController::class, 'schedule_manage']);


    // Activity
    Route::get('manage-rules', [ActivityController::class, 'rules_index']);
    Route::get('update_rule_show/{id}', [ActivityController::class, 'update_rule_show']);
    Route::post('update_rule', [ActivityController::class, 'update_rule']);


    // Finance / Point of Sale (POS)
    Route::get('manage-invoice', [PosController::class, 'invoice_index']);
    Route::get('manage-expense', [PosController::class, 'expense_index']);
    Route::get('create-expense', [PosController::class, 'expense_create'])->name('create-expense');
    Route::post('expense-add', [PosController::class, 'add_expense'])->name('expense-add');
    Route::get('deleteExpense/{id}', [PosController::class, 'expense_delete']);
    Route::get('editExpense/{id}', [PosController::class, 'expense_edit']);
    Route::post('expense-edit', [PosController::class, 'expense_edit_put']);
    Route::get('trainer-commision', [PosController::class, 'trainer_commision_index']);
    Route::post('/insertFees/{id}', [CustomerController::class, 'insertFees']);
});


Route::get('/distance-map', 'App\Http\Controllers\FitoadminController@distance_map');
Route::post('/recent-activities', 'App\Http\Controllers\FitoadminController@recent_activities');
Route::get('/food-menu', 'App\Http\Controllers\FitoadminController@food_menu');
Route::post('/food-menu-list', 'App\Http\Controllers\FitoadminController@food_menu_list');
Route::post('/trending-ingridients', 'App\Http\Controllers\FitoadminController@trending_ingridients');
Route::get('/workout-plan', 'App\Http\Controllers\FitoadminController@workout_plan');
Route::get('/workout-statistic', 'App\Http\Controllers\FitoadminController@workout_statistic');
Route::get('/personal-record', 'App\Http\Controllers\FitoadminController@personal_record');
Route::get('/app-calender', 'App\Http\Controllers\FitoadminController@app_calender');
Route::get('/app-profile', 'App\Http\Controllers\FitoadminController@app_profile');
Route::get('/chart-chartist', 'App\Http\Controllers\FitoadminController@chart_chartist');
Route::get('/chart-chartjs', 'App\Http\Controllers\FitoadminController@chart_chartjs');
Route::get('/chart-flot', 'App\Http\Controllers\FitoadminController@chart_flot');
Route::get('/chart-morris', 'App\Http\Controllers\FitoadminController@chart_morris');
Route::get('/chart-peity', 'App\Http\Controllers\FitoadminController@chart_peity');
Route::get('/chart-sparkline', 'App\Http\Controllers\FitoadminController@chart_sparkline');
Route::get('/ecom-checkout', 'App\Http\Controllers\FitoadminController@ecom_checkout');
Route::get('/ecom-customers', 'App\Http\Controllers\FitoadminController@ecom_customers');
Route::get('/ecom-invoice', 'App\Http\Controllers\FitoadminController@ecom_invoice');
Route::get('/ecom-product-detail', 'App\Http\Controllers\FitoadminController@ecom_product_detail');
Route::get('/ecom-product-grid', 'App\Http\Controllers\FitoadminController@ecom_product_grid');
Route::get('/ecom-product-list', 'App\Http\Controllers\FitoadminController@ecom_product_list');
Route::get('/ecom-product-order', 'App\Http\Controllers\FitoadminController@ecom_product_order');
Route::get('/email-compose', 'App\Http\Controllers\FitoadminController@email_compose');
Route::get('/email-inbox', 'App\Http\Controllers\FitoadminController@email_inbox');
Route::get('/email-read', 'App\Http\Controllers\FitoadminController@email_read');
Route::get('/map-jqvmap', 'App\Http\Controllers\FitoadminController@map_jqvmap');
Route::get('/page-error-400', 'App\Http\Controllers\FitoadminController@page_error_400');
Route::get('/page-error-403', 'App\Http\Controllers\FitoadminController@page_error_403');
Route::get('/page-error-404', 'App\Http\Controllers\FitoadminController@page_error_404');
Route::get('/page-error-500', 'App\Http\Controllers\FitoadminController@page_error_500');
Route::get('/page-error-503', 'App\Http\Controllers\FitoadminController@page_error_503');
Route::get('/page-forgot-password', 'App\Http\Controllers\FitoadminController@page_forgot_password');
Route::get('/page-lock-screen', 'App\Http\Controllers\FitoadminController@page_lock_screen');
Route::get('/page-register', 'App\Http\Controllers\FitoadminController@page_register');

Route::get('/table-datatable-basic', 'App\Http\Controllers\FitoadminController@table_datatable_basic');
Route::get('/uc-nestable', 'App\Http\Controllers\FitoadminController@uc_nestable');
Route::get('/uc-noui-slider', 'App\Http\Controllers\FitoadminController@uc_noui_slider');
Route::get('/uc-select2', 'App\Http\Controllers\FitoadminController@uc_select2');
Route::get('/uc-sweetalert', 'App\Http\Controllers\FitoadminController@uc_sweetalert');
Route::get('/uc-toastr', 'App\Http\Controllers\FitoadminController@uc_toastr');
Route::get('/ui-accordion', 'App\Http\Controllers\FitoadminController@ui_accordion');
Route::get('/ui-alert', 'App\Http\Controllers\FitoadminController@ui_alert');
Route::get('/ui-badge', 'App\Http\Controllers\FitoadminController@ui_badge');
Route::get('/ui-button', 'App\Http\Controllers\FitoadminController@ui_button');
Route::get('/ui-button-group', 'App\Http\Controllers\FitoadminController@ui_button_group');
Route::get('/ui-card', 'App\Http\Controllers\FitoadminController@ui_card');
Route::get('/ui-carousel', 'App\Http\Controllers\FitoadminController@ui_carousel');
Route::get('/ui-dropdown', 'App\Http\Controllers\FitoadminController@ui_dropdown');
Route::get('/ui-grid', 'App\Http\Controllers\FitoadminController@ui_grid');
Route::get('/ui-list-group', 'App\Http\Controllers\FitoadminController@ui_list_group');
Route::get('/ui-media-object', 'App\Http\Controllers\FitoadminController@ui_media_object');
Route::get('/ui-modal', 'App\Http\Controllers\FitoadminController@ui_modal');
Route::get('/ui-pagination', 'App\Http\Controllers\FitoadminController@ui_pagination');
Route::get('/ui-popover', 'App\Http\Controllers\FitoadminController@ui_popover');
Route::get('/ui-progressbar', 'App\Http\Controllers\FitoadminController@ui_progressbar');
Route::get('/ui-tab', 'App\Http\Controllers\FitoadminController@ui_tab');
Route::get('/ui-typography', 'App\Http\Controllers\FitoadminController@ui_typography');
Route::get('/widget-basic', 'App\Http\Controllers\FitoadminController@widget_basic');
