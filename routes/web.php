<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ManageRolesController;
use App\Http\Controllers\EnginneringOffice\ManageRolesController as EnginneringOfficeManageRolesController;

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

/*Route::get('/', function () {
   return redirect('login');
});*/

Route::get('/{any?}', function (){
    return view('layouts.auth');
});//->where('any', '^(?!api\/)[\/\w\.-]*');
Route::get('cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');

    //$exitCode = Artisan::call('optimize:clear');
});
//Auth::routes(['register' => true]);
Route::get('get-genders', 'CommonController@getGenders');


Route::post('ajaxRequest', [UserController::class, 'getUserData'])->name('ajaxRequest.post');
Route::post('checkUser', [UserController::class, 'checkUserType'])->name('checkUser.post');
Route::post('getTypes', [ManageRolesController::class, 'getTypes'])->name('getTypes.post');
Route::post('getType', [UserController::class, 'getType'])->name('getType.post');

Route::get('get-location-info', 'ProjectController@getLocationInfo');
Route::get('create-user','CommonController@createUser');

if (config('constants.enable_client_signup')) {
    Route::get('/client/register', 'Client\ClientRegisterController@index')
            ->name('client.register-form');
    Route::post('/client/register', 'Client\ClientRegisterController@store')
            ->name('client.register');
}
Route::get('/', 'EstateOwner\SinglePageController@displaySPA')->name('estate_owner.spa');
// Employees & Superadmin
Route::prefix('admin')->
    namespace('Admin')
   ->middleware(['jwt.auth', 'employee'])
    ->name('admin')
    ->group(function () {
        // single page
        Route::get('/', 'SinglePageController@displaySPA')
            ->name('admin.spa');
            
        // resource routes
        Route::get('user-statistics', 'UserController@getStatistics');
        Route::get('users-all', 'UserController@getAllEmployee');
        Route::get('users/{id}/name', 'UserController@getEmployee');
        
        Route::resource('users', 'UserController');

        Route::get('customers/{id}/customer-name', 'CustomerController@getCustomer');
        Route::get('customers/{id}/contacts', 'CustomerController@getContacts');
        Route::resource('customers', 'CustomerController')
            ->except(['create']);
        Route::resource('customer-notes', 'CustomerNoteController')
            ->except(['create']);
        Route::resource('contacts', 'ContactController');

        Route::resource('employee-notes', 'EmployeeNoteController');

        Route::resource('categories', 'CategoryController')->only(['store']);
        Route::post('save-stick-notes', 'DashboardController@saveStickNotes');
        Route::resource('dashboards', 'DashboardController')->only(['index']);

        Route::post('system-settings-upload-logo', 'SystemSettingsController@uploadLogo');
        Route::resource('system-settings', 'SystemSettingsController')->only(['create', 'store']);

        Route::resource('currencies', 'CurrencyController')->only(['index', 'store']);

        Route::resource('backups', 'BackupController')->only(['index', 'create']);
        Route::get('backups/delete/{file_name}', 'BackupController@delete');
        Route::get('backups/{file_name}', 'BackupController@download');

        Route::resource('roles', 'ManageRolesController');
        Route::resource('knowledge-bases', 'KnowledgeBaseController');
        Route::resource('invoice-scheme', 'InvoiceSchemeController');
        Route::resource('customer-account-ledger', 'CustomerAccountLedgerController')->only(['index']);

        Route::resource('status', 'StatusController')->only(['index', 'store']);
        Route::resource('source', 'SourceController')->only(['index', 'store']);

        Route::get('lead-statistics', 'LeadController@getStatistics');
        Route::get('leads-update-status', 'LeadController@updateStatus');
        Route::resource('leads', 'LeadController');

        Route::resource('lead-notes', 'LeadNoteController');
        Route::resource('reminders', 'ReminderController');
    });

//Common routes
Route::middleware(['jwt.auth'])
    ->name('common')
    ->group(function () {
        Route::resource('manage-profiles', 'ManageProfileController')
            ->only(['index', 'edit', 'update']);

            Route::resource('dashboards', 'DashboardController')->only(['index']);
        Route::resource('media', 'MediaController');
        
        Route::get('getRequestsCount','CommonController@getRequestsCount');
        Route::resource('enginner_office/roles', EnginneringOfficeManageRolesController::class);

        Route::post('confirm-design', 'DesignRequestController@confirmDesign');
        Route::get('edit-user/{id}','CommonController@editUser');

        Route::post('accept-project','ProjectController@acceptProject');
        Route::post('reject-project','ProjectController@rejectProject');
        Route::post('removeFile', 'MediaController@removeFile');
        Route::get('/customers', 'Admin\UserController@getCustomers');

      //  Route::post('visit-request', 'RequestTypeController@store');
        Route::resource('request', 'RequestTypeController');
        Route::get('stages', 'ReportController@stages');

      
        Route::get('get-requests', 'RequestTypeController@getRequests');
        Route::get('get-requests-enginners/{id}', 'RequestTypeController@getRequestEnginners');
        
        //project 
        
        Route::get('projects/{id}/members', 'ProjectController@getMembers');
        Route::get('get-default-members/{id}', 'ProjectController@getDefaultMembers');
        Route::get('get-project/{id}', 'ProjectController@getProject');
        

       Route::get('get-customer-project/{id}', 'ProjectController@getCustomer');
        Route::post('add-new-project', 'ProjectController@addNewProject');
        Route::get('get-offices', 'Admin\UserController@getAllOffices');
        Route::get('get-supprt-services', 'Admin\UserController@getAllSupportServices');
        
        Route::get('get-contractors', 'Admin\UserController@getAllContractors');
        Route::get('get-users-office/{id}', 'Admin\UserController@getUsersOffice');
        
      
        

        Route::get('projects-statistics', 'ProjectController@getStatistics');
        Route::get('projects-customer', 'ProjectController@getCustomerProject');
      
        Route::get('projects/projects-list', 'ProjectController@getProjectsList');
        
        Route::get('projects/update-status', 'ProjectController@updateStatus');


        Route::get('projects/mark-favorite', 'ProjectController@markAsFavorite');

        Route::resource('projects', 'ProjectController');

        Route::get('project/dataFilters', 'ProjectController@filterDataResults');

        Route::resource('project-notes', 'ProjectDocumentsAndNotesController');

        Route::get('project-tasks/mark-completed', 'ProjectTaskController@markAsCompleted');

        Route::get('project-tasks/filter-data/{project_id}', 'ProjectTaskController@getFilterData');
        
        Route::get('project-task-description', 'ProjectTaskController@updateDescription');
        Route::resource('project-tasks', 'ProjectTaskController');
        Route::resource('project-comments', 'ProjectCommentController');

      
        
        //Activities related route
        Route::get('activities/project', 'ActivityController@project');

        Route::resource('project-milestones', 'ProjectMilestonesController');   
        Route::post('confirm-send', 'RequestTypeController@confirmSendRequest');
        Route::post('send_request', 'ProjectController@projectRequest'); 
        Route::post('edit-visit-request', 'ProjectController@editVisitRequest');   
        Route::post('edit-project-request', 'ProjectController@editProjectRequest');

        Route::get('get-location-status', 'ProjectController@getLocationStatus');

       
        Route::post('customer-info', 'Admin\CustomerController@getCutomerInfo');
        Route::post('project-info', 'ProjectController@getProjectInfo');
        Route::post('getProject-Data', 'ProjectController@getProjectData');
        Route::post('add-agency', 'ProjectController@addAgency');
        Route::post('edit-new-project', 'ProjectController@editNewProject');
        Route::get('get-agencies/{user_id}', 'ProjectController@getAgencies');
        Route::get('get-project/{id}', 'ProjectController@getProject');

      
       
        Route::delete('delete-requests/{id}', 'ProjectController@deleteRequest');
        Route::get('get-priority','RequestTypeController@getPriority');
        Route::resource('request-type','RequestTypeController');
        Route::get('get-request-types','RequestTypeController@getRequestsTypes');
        
        //reRoute::get('get-request-types','RequestTypeController@getRequestsTypes');port 
        Route::get('get-report-types','ReportController@getReportTypes');
        Route::get('getOffices','ReportController@getOffices');
        Route::get('getProjectsOffice','ProjectController@getProjectsOffice');
        Route::resource('reports', 'ReportController');
        Route::resource('reportTypes', 'ReportTypesController');
        Route::resource('serviceTypes', 'ServiceTypeController');
        Route::resource('locations', 'LocationController');
        
        Route::get('get-Customer-name/{id}','Admin\CustomerController@getCustomerName');
        Route::get('visit-request-type/{id}','ProjectController@getVisitRequestType');
        
        Route::get('invoice-statistics', 'InvoiceController@getStatistics');
        Route::get('invoices/create','InvoiceController@create');
        Route::post('invoices/post-invoice-reminder', 'InvoiceController@postInvoiceReminder');
        Route::get('invoices/get-invoice-reminder', 'InvoiceController@getInvoiceReminder');
        Route::get('invoices/{id}/convert-to-invoice', 'InvoiceController@ConvertToInvoice');
        Route::get('invoices/get-filter-data', 'InvoiceController@getFilterData');
        Route::get('invoices/{id}/download', 'InvoiceController@download');
        Route::resource('invoices', 'InvoiceController');
        Route::resource('transaction-payments', 'TransactionPaymentController');

        Route::get('notifications-mark-as-read', 'NotificationController@markAsRead');
        Route::resource('notifications', 'NotificationController')->only(['index']);
        Route::resource('calendar-overview', 'CalendarOverviewController')->only(['index']);

        Route::get('expense-statistics', 'ExpensesController@getStatistics');
        Route::get('expenses/get-filters', 'ExpensesController@getFilters');
        Route::resource('expenses', 'ExpensesController');
        
        Route::get('leaves/get-filters', 'LeaveManagementController@getFilters');
        Route::get('leaves/update-status', 'LeaveManagementController@updateStatus');
        Route::resource('leaves', 'LeaveManagementController');

        Route::get('tickets-statistics', 'TicketController@getStatistics');
        Route::get('tickets-update-status', 'TicketController@updateStatus');
        Route::get('tickets/get-filters', 'TicketController@getFilters');
        Route::resource('tickets', 'TicketController');
        
        Route::resource('ticket-comments', 'TicketCommentController');


        Route::get('get-user/{id}', 'CommonController@getUser');

        Route::get('get-current-user', 'CommonController@getCurrentUser');
        Route::get('get-roles-permission', 'CommonController@getPermissionsforAsk');
        Route::post('ask-for-permission', 'CommonController@askPermissionForUser');
        Route::get('get-my-users', 'CommonController@getMyUsers');
        Route::get('get-my-agencies', 'CommonController@getMyAgencies');
        Route::get('get-role', 'CommonController@getRole');
        Route::get('get-roles', 'CommonController@getRoles');
        Route::get('/check-role-primary/{id}', 'CommonController@checkRole');
        Route::get('get-project-customer','CommonController@getProjects');
        Route::get('check-current-user-type/{type}', 'CommonController@checkCurrentUserType');
        Route::get('all-customers-admin', 'CommonController@getAllCustomer');
        Route::get('all-customers', 'CommonController@getAllCustomer');
        
       // Route::get('get-download/{path}', 'CommonController@getDownload');
        Route::get('get-download/{path}','CommonController@getDownload');
        
        Route::get('get-municipalities-info/{province}', 'ProjectController@getMunicipalitiesInfo');
        
        Route::resource('requests-role', 'RequestRoleController');
        Route::get('accept-requests-role/{id}','RequestRoleController@acceptRequestRole');
        Route::get('reject-requests-role/{id}','RequestRoleController@rejectRequestRole');
      //  Route::get('get-office-requests','RequestRoleController@getOfficeRequests1');

        Route::resource('get-document-project', 'ProjectDocumnetsController');
        //

        Route::resource('specialty', 'SpecialtyController');

        Route::get('/get-enginnering-types', 'SpecialtyController@getspecialties');

        Route::get('/get-enginnering-types-by-role/{role_id}', 'SpecialtyController@getspecialtiesByRole');
        Route::resource('project-document', 'ProjectDocumentsController');
        
        Route::post('show-design-request-details', 'DesignRequestController@showDesignRequestDetails');


        Route::get('get-stage/{id}','CommonController@getStage');

    });

// Employees & Estate Owner


Route::prefix('estate_owner')
    ->namespace('EstateOwner')
    ->middleware(['jwt.auth','estate_owner'])
    ->name('estate_owner')
    ->group(function () {
            Route::get('/', 'SinglePageController@displaySPA')
            ->name('estate_owner.spa');
            Route::resource('dashboards', 'DashboardController')->only(['index']);

            Route::get('user-statistics', 'UserController@getStatistics');
            Route::get('users-all', 'UserController@getAllEmployee');
            Route::get('users/{id}/name', 'UserController@getEmployee');
            Route::get('customers', 'UserController@getCustomers');
            
            Route::post('rejectDesignRequestOffer','DesignRequestController@rejectDesignRequestOffer');
            Route::post('acceptDesignRequestOffer','DesignRequestController@acceptDesignRequestOffer');

            Route::post('rejectContractorRequestOffer','ContractorRequestController@rejectContractorRequestOffer');
            Route::post('acceptContractorRequestOffer','ContractorRequestController@acceptContractorRequestOffer');

            Route::post('rejectSupportServiceRequestOffer','SupportServiceRequestController@rejectSupoortServiceRequestOffer');
            Route::post('acceptSupportServiceRequestOffer','SupportServiceRequestController@acceptSupportServiceRequestOffer');

            Route::resource('users', 'UserController');

            Route::resource('request-design', 'DesignRequestController');
            Route::resource('request-contractor', 'ContractorRequestController');
            Route::resource('request-support-service', 'SupportServiceRequestController');

           // Route::post('confirm-design', 'DesignRequestController@confirmDesign');

            Route::post('accept-design-request-offer', 'DesignRequestController@acceptDesign');
            
        // Route::get('dashboards', 'DashboardController@index');
    });
//contractor
    Route::prefix('contracting_company')
    ->namespace('ContractingCompany')
   // ->middleware(['auth','enginner_office'])
    ->name('contracting_company')
    ->group(function () {
            Route::get('/', 'SinglePageController@displaySPA')
            ->name('estate_owner.spa');
            Route::resource('request-contractor', 'ContractorRequestController');
            Route::post('accept-contractor-request','ContractorRequestController@acceptContractorRequest');
    });

    //support service
    Route::prefix('support_service_office')
    ->namespace('SupportService')
   // ->middleware(['auth','enginner_office'])
    ->name('support_service_office')
    ->group(function () {
            Route::get('/', 'SinglePageController@displaySPA')
            ->name('estate_owner.spa');
            
            Route::resource('request-support-service', 'SupportServiceRequestController');
            Route::post('accept-support-service-request','SupportServiceRequestController@acceptSupportServiceRequest');
    });
    /// Enginnering OFFICE

    Route::prefix('enginner_office')
    ->namespace('EnginneringOffice')
    ->middleware(['jwt.auth','enginner_office'])
    ->name('enginner_office')
    ->group(function () {
            Route::get('/', 'SinglePageController@displaySPA')->name('enginner_office.spa');
          //  Route::resource('dashboards', 'DashboardController')->only(['index'])->name('enginner_office.dashboards');
        //  Route::get('dashboards', 'DashboardController@index')->name('enginner_office.dashboards');  
          Route::post('addNewEmployee','UserController@addNewEmployee');
            Route::get('user-statistics', 'UserController@getStatistics');
            Route::get('users-all', 'UserController@getAllEmployee');
            Route::get('users/{id}/name', 'UserController@getEmployee');
            Route::get('get-office-empoloyees/{id}', 'UserController@getUsersOffice');
            Route::post('get-office-empoloyees-specialty', 'UserController@getEmployeesOfficeForSpecialty');
            Route::resource('users', 'UserController');
            Route::get('/customers', 'UserController@getCustomers');
             //    request     
             Route::post('get-office-empoloyees-request', 'RequestTypeController@getEmployeesOfficeForRequest');

             Route::post('rejectContractorRequestOffer','ContractorRequestController@rejectContractorRequestOffer');
             Route::post('acceptContractorRequestOffer','ContractorRequestController@acceptContractorRequestOffer');
 
             Route::post('rejectSupportServiceRequestOffer','SupportServiceRequestController@rejectSupoortServiceRequestOffer');
             Route::post('acceptSupportServiceRequestOffer','SupportServiceRequestController@acceptSupportServiceRequestOffer');

             Route::post('accept-project', 'RequestTypeController@acceptProject');
            Route::post('request-cancel', 'RequestTypeController@cancelRequest');
            Route::get('get-office-requests','RequestTypeController@getOfficeRequests');
            Route::get('projects-request','RequestTypeController@getProjectRequests');

            Route::resource('request-contractor', 'ContractorRequestController');
            Route::resource('request-support-service', 'SupportServiceRequestController');

            Route::resource('request', 'RequestTypeController');
            Route::post('accept-request-by-enginner','RequestTypeController@acceptRequestByEnginner');
            

            Route::get('project-tasks/mark-completed', 'ProjectTaskController@markAsCompleted');

            Route::get('project-tasks/filter-data/{project_id}', 'ProjectTaskController@getFilterData');
            
            Route::get('project-task-description', 'ProjectTaskController@updateDescription');
            Route::resource('project-tasks', 'ProjectTaskController');
            //customer
            Route::post('add-customer', 'UserController@addCustomer');

            Route::get('all-employee/{id}', 'UserController@getAllEmployeeForRequest');


            Route::resource('request-design', 'DesignRequestController');

            Route::post('get-stages-design-request', 'DesignRequestController@getStagesDesignRequest');
           
            Route::post('accept-design-request', 'DesignRequestController@acceptDesignRequest');

            Route::post('reject-design-request', 'DesignRequestController@rejectDesignRequest');

            Route::post('send-design-request-offer', 'DesignRequestController@sendDesignRequestOffer');

            Route::post('show-design-request-details', 'DesignRequestController@showDesignRequestDetails');

            
            
            
            
        // Route::get('dashboards', 'DashboardController@index');
    });




Route::prefix('client')
    ->namespace('Client')
    ->middleware(['auth', 'client'])
    ->name('client')
    ->group(function () {
        // single page
        Route::get('/', 'SinglePageController@displaySPA')
            ->name('spa');

        Route::get('dashboards', 'DashboardController@index');
    });

   

// Localization
Route::get('/js/lang.js', function () {
   // $strings = Cache::remember('lang.js', 2, function () {
        $lang = config('app.locale');
   
        $files = glob(resource_path('lang/'.$lang.'/*.php'));
       
        $strings = [];
        foreach ($files as $file) {
        
            $name = basename($file, '.php');
   
            $strings[$name] = require $file;
         
       
        }
     
     //   return $strings;
    //});

    header('Content-Type: text/javascript');
    echo 'window.i18n = '.json_encode($strings).';';
    exit();
})->name('assets.lang');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

