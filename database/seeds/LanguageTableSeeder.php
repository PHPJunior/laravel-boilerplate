<?php

use Carbon\Carbon;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;

class LanguageTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('languages');

        $languages = [
            [
                'id'                => 1,
                'language_name'     => 'Arabic',
                'locale_code'       => 'ar',
                'php_locale_code'   => 'ar_AR',
                'rtl'               => true,
                'enabled'           => false,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 2,
                'language_name'     => 'Danish',
                'locale_code'       => 'da',
                'php_locale_code'   => 'da_DK',
                'rtl'               => false,
                'enabled'           => false,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 3,
                'language_name'     => 'German',
                'locale_code'       => 'de',
                'php_locale_code'   => 'de_DE',
                'rtl'               => false,
                'enabled'           => false,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 4,
                'language_name'     => 'Greek',
                'locale_code'       => 'el',
                'php_locale_code'   => 'el_GR',
                'rtl'               => false,
                'enabled'           => false,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 5,
                'language_name'     => 'English',
                'locale_code'       => 'en',
                'php_locale_code'   => 'en_US',
                'rtl'               => false,
                'enabled'           => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 6,
                'language_name'     => 'Spanish',
                'locale_code'       => 'es',
                'php_locale_code'   => 'es_ES',
                'rtl'               => false,
                'enabled'           => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 7,
                'language_name'     => 'French',
                'locale_code'       => 'fr',
                'php_locale_code'   => 'fr_FR',
                'rtl'               => false,
                'enabled'           => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 8,
                'language_name'     => 'Indonesian',
                'locale_code'       => 'id',
                'php_locale_code'   => 'id_ID',
                'rtl'               => false,
                'enabled'           => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 9,
                'language_name'     => 'Italian',
                'locale_code'       => 'it',
                'php_locale_code'   => 'it_IT',
                'rtl'               => false,
                'enabled'           => false,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 10,
                'language_name'     => 'Dutch',
                'locale_code'       => 'nl',
                'php_locale_code'   => 'nl_NL',
                'rtl'               => false,
                'enabled'           => false,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 11,
                'language_name'     => 'Brazilian Portuguese',
                'locale_code'       => 'pt_BR',
                'php_locale_code'   => 'pt_BR',
                'rtl'               => false,
                'enabled'           => false,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 12,
                'language_name'     => 'Russian',
                'locale_code'       => 'ru',
                'php_locale_code'   => 'ru-RU',
                'rtl'               => false,
                'enabled'           => false,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 13,
                'language_name'     => 'Swedish',
                'locale_code'       => 'sv',
                'php_locale_code'   => 'sv_SE',
                'rtl'               => false,
                'enabled'           => false,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'id'                => 14,
                'language_name'     => 'Thai',
                'locale_code'       => 'th',
                'php_locale_code'   => 'th_TH',
                'rtl'               => false,
                'enabled'           => false,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table('languages')->insert($languages);

        $this->enableForeignKeys();
    }
}
