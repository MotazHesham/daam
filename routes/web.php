<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]); 

Route::get('api/search_beneficires','ApiController@searchBeneficires')->name('api.search_beneficires');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::post('roles/update_statuses', 'RolesController@update_statuses')->name('roles.update_statuses');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingsController');

    // Sliders
    Route::delete('sliders/destroy', 'SlidersController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/update_statuses', 'SlidersController@update_statuses')->name('sliders.update_statuses');
    Route::post('sliders/media', 'SlidersController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SlidersController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SlidersController');

    // Hawkam Categories
    Route::delete('hawkam-categories/destroy', 'HawkamCategoriesController@massDestroy')->name('hawkam-categories.massDestroy');
    Route::resource('hawkam-categories', 'HawkamCategoriesController');

    // Humanitarian Aid
    Route::delete('humanitarian-aids/destroy', 'HumanitarianAidController@massDestroy')->name('humanitarian-aids.massDestroy');
    Route::post('humanitarian-aids/media', 'HumanitarianAidController@storeMedia')->name('humanitarian-aids.storeMedia');
    Route::post('humanitarian-aids/ckmedia', 'HumanitarianAidController@storeCKEditorImages')->name('humanitarian-aids.storeCKEditorImages');
    Route::resource('humanitarian-aids', 'HumanitarianAidController');

    // Hawkma
    Route::delete('hawkmas/destroy', 'HawkmaController@massDestroy')->name('hawkmas.massDestroy');
    Route::post('hawkmas/update_statuses', 'HawkmaController@update_statuses')->name('hawkmas.update_statuses');
    Route::post('hawkmas/media', 'HawkmaController@storeMedia')->name('hawkmas.storeMedia');
    Route::post('hawkmas/ckmedia', 'HawkmaController@storeCKEditorImages')->name('hawkmas.storeCKEditorImages');
    Route::resource('hawkmas', 'HawkmaController');

    // Posts
    Route::delete('posts/destroy', 'PostsController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/update_statuses', 'PostsController@update_statuses')->name('posts.update_statuses');
    Route::post('posts/media', 'PostsController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostsController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostsController');

    // Partners
    Route::delete('partners/destroy', 'PartnersController@massDestroy')->name('partners.massDestroy');
    Route::post('partners/media', 'PartnersController@storeMedia')->name('partners.storeMedia');
    Route::post('partners/ckmedia', 'PartnersController@storeCKEditorImages')->name('partners.storeCKEditorImages');
    Route::resource('partners', 'PartnersController');

    // Said About Us
    Route::delete('said-about-uss/destroy', 'SaidAboutUsController@massDestroy')->name('said-about-uss.massDestroy');
    Route::resource('said-about-uss', 'SaidAboutUsController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/update_statuses', 'ProjectsController@update_statuses')->name('projects.update_statuses');
    Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectsController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::resource('projects', 'ProjectsController');

    // Volunteers
    Route::delete('volunteers/destroy', 'VolunteersController@massDestroy')->name('volunteers.massDestroy');
    Route::post('volunteers/media', 'VolunteersController@storeMedia')->name('volunteers.storeMedia');
    Route::post('volunteers/ckmedia', 'VolunteersController@storeCKEditorImages')->name('volunteers.storeCKEditorImages');
    Route::get('volunteers/verify/{id}', 'VolunteersController@verify')->name('volunteers.verify');
    Route::post('volunteers/verify_submit', 'VolunteersController@verify_submit')->name('volunteers.verify_submit');
    Route::resource('volunteers', 'VolunteersController');

    // Volunteer Tasks
    Route::delete('volunteer-tasks/destroy', 'VolunteerTasksController@massDestroy')->name('volunteer-tasks.massDestroy');
    Route::get('volunteer-tasks/qr/{id}', 'VolunteerTasksController@qr')->name('volunteer-tasks.qr');
    Route::resource('volunteer-tasks', 'VolunteerTasksController');
    
    // Volunteer Guides
    Route::delete('volunteer-guides/destroy', 'VolunteerGuidesController@massDestroy')->name('volunteer-guides.massDestroy');
    Route::post('volunteer-guides/update_statuses', 'VolunteerGuidesController@update_statuses')->name('volunteer-guides.update_statuses');
    Route::post('volunteer-guides/media', 'VolunteerGuidesController@storeMedia')->name('volunteer-guides.storeMedia');
    Route::post('volunteer-guides/ckmedia', 'VolunteerGuidesController@storeCKEditorImages')->name('volunteer-guides.storeCKEditorImages');
    Route::resource('volunteer-guides', 'VolunteerGuidesController');

    // Members
    Route::delete('members/destroy', 'MembersController@massDestroy')->name('members.massDestroy');
    Route::resource('members', 'MembersController');

    // Contacts
    Route::delete('contacts/destroy', 'ContactsController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactsController');

    // Subscribe
    Route::delete('subscribes/destroy', 'SubscribeController@massDestroy')->name('subscribes.massDestroy');
    Route::resource('subscribes', 'SubscribeController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/update_statuses', 'CoursesController@update_statuses')->name('courses.update_statuses');
    Route::get('courses/qr_attendance/{id}', 'CoursesController@qr_attendance')->name('courses.qr_attendance');
    Route::get('courses/qr_certificate/{id}', 'CoursesController@qr_certificate')->name('courses.qr_certificate');
    Route::post('courses/update_certificate', 'CoursesController@update_certificate')->name('courses.update_certificate');
    Route::get('courses/send_certificate/{id}', 'CoursesController@send_certificate')->name('courses.send_certificate');
    Route::get('courses/get_certificate/{id}', 'CoursesController@get_certificate')->name('courses.get_certificate');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CoursesController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::get('courses/print/{id}', 'CoursesController@print')->name('courses.print');
    Route::resource('courses', 'CoursesController');

    // Course Students
    Route::delete('course-students/destroy', 'CourseStudentsController@massDestroy')->name('course-students.massDestroy');
    Route::resource('course-students', 'CourseStudentsController');

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Reviews
    Route::delete('reviews/destroy', 'ReviewsController@massDestroy')->name('reviews.massDestroy');
    Route::resource('reviews', 'ReviewsController', ['except' => ['create', 'store', 'edit', 'update', 'show']]);

    // Report Categories
    Route::delete('report-categories/destroy', 'ReportCategoriesController@massDestroy')->name('report-categories.massDestroy');
    Route::post('report-categories/update_statuses', 'ReportCategoriesController@update_statuses')->name('report-categories.update_statuses');
    Route::resource('report-categories', 'ReportCategoriesController');

    // Reports
    Route::delete('reports/destroy', 'ReportsController@massDestroy')->name('reports.massDestroy');
    Route::post('reports/update_statuses', 'ReportsController@update_statuses')->name('reports.update_statuses');
    Route::post('reports/media', 'ReportsController@storeMedia')->name('reports.storeMedia');
    Route::post('reports/ckmedia', 'ReportsController@storeCKEditorImages')->name('reports.storeCKEditorImages');
    Route::resource('reports', 'ReportsController');

    // Memperships
    Route::delete('memperships/destroy', 'MempershipsController@massDestroy')->name('memperships.massDestroy');
    Route::post('memperships/update_certificate', 'MempershipsController@update_certificate')->name('memperships.update_certificate');
    Route::post('memperships/send_certificate', 'MempershipsController@send_certificate')->name('memperships.send_certificate');
    Route::post('memperships/media', 'MempershipsController@storeMedia')->name('memperships.storeMedia');
    Route::post('memperships/ckmedia', 'MempershipsController@storeCKEditorImages')->name('memperships.storeCKEditorImages');
    Route::get('memperships/print/{id}', 'MempershipsController@print')->name('memperships.print');
    Route::resource('memperships', 'MempershipsController');


    // questionneries
    Route::get('questionnaire/traning','QuestionnaireController@traning')->name('questionnaire.traning');
    Route::get('questionnaire/traning/{id}','QuestionnaireController@traning_show')->name('questionnaire.traning.show');
    Route::get('questionnaire/volunteers','QuestionnaireController@volunteers')->name('questionnaire.volunteers');
    Route::get('questionnaire/volunteers/{id}','QuestionnaireController@volunteers_show')->name('questionnaire.volunteers.show');
    Route::get('questionnaire/courses','QuestionnaireController@courses')->name('questionnaire.courses');
    Route::get('questionnaire/courses/type/{course_type}','QuestionnaireController@courses')->name('questionnaire.courses.type');
    Route::get('questionnaire/courses/{id}','QuestionnaireController@courses_show')->name('questionnaire.courses.show'); 
    Route::get('questionnaire/members','QuestionnaireController@members')->name('questionnaire.members');
    Route::get('questionnaire/members/{id}','QuestionnaireController@members_show')->name('questionnaire.members.show');
    Route::get('questionnaire/certificate','QuestionnaireController@certificate')->name('questionnaire.certificate');
    Route::get('questionnaire/certificate/{id}','QuestionnaireController@certificate_show')->name('questionnaire.certificate.show');
    Route::get('questionnaire/special-need','QuestionnaireController@specialneed')->name('questionnaire.specialneed');
    Route::get('questionnaire/special-need/{id}','QuestionnaireController@specialneed_show')->name('questionnaire.specialneed.show');
    Route::get('questionnaire/get_certificate/{id}', 'QuestionnaireController@get_certificate')->name('questionnaire.get_certificate');
    
    // Donations
    Route::delete('donations/destroy', 'DonationsController@massDestroy')->name('donations.massDestroy');
    Route::post('donations/parse-csv-import', 'DonationsController@parseCsvImport')->name('donations.parseCsvImport');
    Route::post('donations/process-csv-import', 'DonationsController@processCsvImport')->name('donations.processCsvImport');
    Route::resource('donations', 'DonationsController');

    // Beneficiaries
    Route::delete('beneficiaries/destroy', 'BeneficiariesController@massDestroy')->name('beneficiaries.massDestroy');
    Route::get('beneficiaries/status/{id}/{status}', 'BeneficiariesController@status')->name('beneficiaries.status');
    Route::post('beneficiaries/status2', 'BeneficiariesController@status2')->name('beneficiaries.status2');
    Route::post('beneficiaries/media', 'BeneficiariesController@storeMedia')->name('beneficiaries.storeMedia');
    Route::post('beneficiaries/ckmedia', 'BeneficiariesController@storeCKEditorImages')->name('beneficiaries.storeCKEditorImages');
    Route::post('beneficiaries/parse-csv-import', 'BeneficiariesController@parseCsvImport')->name('beneficiaries.parseCsvImport');
    Route::post('beneficiaries/process-csv-import', 'BeneficiariesController@processCsvImport')->name('beneficiaries.processCsvImport');
    Route::resource('beneficiaries', 'BeneficiariesController');
    
    // Report Money 
    Route::post('report-moneys/media', 'ReportMoneyController@storeMedia')->name('report-moneys.storeMedia');
    Route::post('report-moneys/ckmedia', 'ReportMoneyController@storeCKEditorImages')->name('report-moneys.storeCKEditorImages');
    Route::resource('report-moneys', 'ReportMoneyController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
