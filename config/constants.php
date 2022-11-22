<?php

return [
    /*
    |--------------------------------------------------------------------------
    | App Constants
    |--------------------------------------------------------------------------
    |List of all constants for the app
    */

    'task_prefix' => '#',
    'notification_refresh_timeout' => 30000,
    'upload_file_max_size' => 10, // 10MB
    'langs' => [
        'en' => ['full_name' => 'English', 'short_name' => 'English'],
        'es' => ['full_name' => 'Spanish - Español', 'short_name' => 'Spanish'],
        // 'sq' => ['full_name' => 'Albanian - Shqip', 'short_name' => 'Albanian'],
        // 'hi' => ['full_name' => 'Hindi - हिंदी', 'short_name' => 'Hindi'],
        // 'nl' => ['full_name' => 'Dutch', 'short_name' => 'Dutch'],
        'fr' => ['full_name' => 'French - Français', 'short_name' => 'French'],
        // 'de' => ['full_name' => 'German - Deutsch', 'short_name' => 'German'],
        'ar' => ['full_name' => 'Arabic - العَرَبِيَّة', 'short_name' => 'Arabic'],
        // 'tr' => ['full_name' => 'Turkish - Türkçe', 'short_name' => 'Turkish'],
    ],
    'user_types' => [
        'ESTATE_OWNER' => "Estate Owner",
        'ENGINEERING_OFFICE_MANAGER' => "Engineering Office Manager",
        'SUPPORT_SERVICES_OFFICE' => "Support Service Office",
        
        'CONTRACTING_COMPANY' => "Contracting  Company",
        'GOVERNMENT_AGENCIES' => "Government Agencies",
        'SITE_MANAGENMENT' => "Site Managnment",

    ],
    'langs_rtl' => ['ar'],
    'non_utf8_languages' => ['ar', 'hi'],
    'expense_prefix' => 'expense#',
    'temp_upload_folder' => 'temp',
    'enable_client_signup' => !empty(env('ENABLE_CLIENT_SIGNUP')) ? true : false,
    'ticket_prefix' => 'ticket#',
];
