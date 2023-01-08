<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('jwt.verify')->get('/user', function (Request $request) {
    return $request->user();
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

Route::get('languages',[CommonController::class,'getLanguages']);
Route::group(['middleware' => 'jwt.auth',], function ($router) {
Route::get('getRequestsCount/{id}','CommonController@getRequestsCount');
Route::post('logout', 'Auth\AuthController@logout');
Route::post('refresh', 'Auth\AuthController@refresh');
Route::get('user', 'Auth\AuthController@user');
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

            Route::post('accept-design-request-offer', 'DesignRequestController@acceptDesign');
    });
Route::post('getType', [UserController::class, 'getType'])->name('getType.post');
Route::group([

  'middleware' => 'api',
 // 'prefix' => 'auth'
], function ($router) {

  Route::post('login', 'Auth\AuthController@login');


});

