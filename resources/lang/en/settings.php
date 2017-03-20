<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 3/15/17
 * Time: 6:24 PM
 */

return [
    'translation' => [
        'title' => 'Translation',
        'management' => 'Language Management',
        'edit' => 'Edit Language',
        'add'   => 'Add New Language',
        'list'      => 'Language List',
        'group'      => 'Language Line Group List',
        'line'      => 'Language Line',

        'button' => [
            'translate' => 'View & Translate',
            'add'   => 'Add New Language',
            'add_new_group'   => 'Add New Group And Language',
        ],

        'table' => [
            'name'      => 'Language Name',
            'locale'    => 'Locale',
            'tag'       => 'Tag',
            'rtl'       => 'Right to Left',
            'progress'  => 'Progress',
            'label'     => 'Label',
            'enabled'   => 'enabled'
        ],

        'attributes' => [
            'name'      => 'Language Name',
            'locale'    => 'Locale',
            'tag'       => 'Tag',
            'rtl'       => 'Right to Left'
        ],

        'alerts' => [
            'language' => [
                'created' => 'The language was successfully created.',
                'deleted' => 'The language was successfully deleted.',
                'updated' => 'The language was successfully updated.',
                'enabled' => 'The language was successfully enabled.',
                'updated_key_group' => 'Language Line key or group updated'
            ],
            'translation' => [
                'created' => 'The translation was successfully created.',
                'deleted' => 'The translation was successfully deleted.',
                'updated' => 'The translation was successfully updated.',
                'enabled' => 'The translation was successfully enabled.'
            ]
        ],
        'exceptions' => [
            'language' => [
                'already_exists'    => 'That language already exists. Please choose a different name.',
                'create_error'      => 'There was a problem creating this language. Please try again.',
                'delete_error'      => 'There was a problem deleting this language. Please try again.',
                'not_found'         => 'That language does not exist.',
                'update_error'      => 'There was a problem updating this language. Please try again.',
            ]
        ]
    ],

    'language' => [
        'title' => 'Language',
        'management' => 'Language Management',
        'edit' => 'Edit Language',
        'add'   => 'Add New Language',
        'list'      => 'Language List',
        'translate' => 'Translate',
        'group' => 'language Line Group',
        'default_text' => 'Default Text',
        'key'   => 'Language line Key',
        'edit_key_group' => 'Edit Language line Key And Group',
        'table' => [
            'name'      => 'Language Line Group Name',
            'count'     => 'Line Count',
            'progress'  => 'Progress',
            'label'     => 'Label'
        ],
        'attributes' => [
            'group'      => 'Language Line Group',
            'default_text' => 'Default Text',
            'key'   => 'Language line Key'
        ],

    ],

    'configuration' => [
        'title' => 'Configurations',
        'management' => 'Setting Management',

        'general' => [
            'title' => 'General Setting',
            'attributes' => [
                'app_name' => 'Application Name',
                'timezone' => 'Timezone',
                'default_language' => 'Default Language',
                'backend_theme' => 'Backend Theme',
                'backend_layout' => 'Backend Layout',
                'page_per_row'     => 'Page Per Row',
                'analytics'     => 'Google Analytics'
            ]
        ],

        'system' => [
            'title' => 'System Setting',
            'pusher' => 'Pusher Setting',
            'cache' => 'Cache Setting',
            'captcha' => 'No-Captcha Setting',
            'attributes' => [
                'access_users_registration' => 'Registration',
                'access_users_confirm_email' => 'User Confirmation',
                'access_users_change_email' => 'User Can Change Email',
                'access_captcha_registration' => 'Registration captcha',

                'broadcasting_default' => 'Default Broadcaster',

                'broadcasting_connections_pusher_key' => 'Pusher App Key',
                'broadcasting_connections_pusher_secret' => 'Pusher App Secret',
                'broadcasting_connections_pusher_app_id' => 'Pusher App Id',
                'broadcasting_connections_pusher_cluster' => 'Pusher Cluster',
                'broadcasting_connections_pusher_encrypted' => 'Pusher Encrypted',

                'cache_default' => 'Cache Defult Driver',

                'cache_stores_memcached_persistent_id' => 'Memcached Persistent_id',
                'cache_stores_memcached_sasl_username' => 'Memcached Username',
                'cache_stores_memcached_sasl_password' => 'Memcached Password',
                'cache_stores_memcached_servers_host' => 'Nemcached Servers Host',
                'cache_stores_memcached_servers_port' => 'Nemcached Servers Port',

                'no-captcha_secret' => 'No-Captcha Secret',
                'no-captcha_sitekey' => 'No-Captcha SiteKey',
            ]
        ],

        'company' => [
            'title' => 'Company Setting',
            'attributes' => [
                'company_name' => 'Name',
                'company_address' => 'Address',
                'company_phone' => 'Phone',
                'company_email' => 'Email',
                'company_website' => 'Website'
            ]
        ],

        'mail' => [
            'title' => 'Mail Setting',
            'attributes' => [
                'mail_from_name' => 'Email sent from name',
                'mail_from_address' => 'Email sent from address',
                'mail_driver' => 'Mail Driver',
                'mail_host' => 'SMTP Host',
                'mail_port' => 'SMTP Port',
                'mail_encryption' => 'Encryption',
                'mail_username' => 'SMTP Username',
                'mail_password' => 'SMTP Password',

                'services_mailgun_domain' => 'Domain',
                'services_mailgun_secret' => 'Secret Key',
                'services_mandrill_secret' => 'Mandrill Secret Key',
            ]
        ],

        'alerts' => [
            'created' => 'The setting was successfully created.',
            'deleted' => 'The setting was successfully deleted.',
            'updated' => 'The setting was successfully updated.',
            'enabled' => 'The setting was successfully enabled.',
        ]
    ]
];