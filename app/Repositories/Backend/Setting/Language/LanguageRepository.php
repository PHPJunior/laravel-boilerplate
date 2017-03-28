<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 3/15/17
 * Time: 8:15 PM.
 */

namespace App\Repositories\Backend\Setting\Language;

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Models\Setting\Language\Language;

class LanguageRepository extends BaseRepository
{
    const MODEL = Language::class;

    /**
     * @param array $input
     */
    public function create(array $input)
    {
        DB::transaction(function () use ($input) {
            $language = self::MODEL;
            $language = new $language;
            $language->language_name = $input['language_name'];
            $language->locale_code = $input['locale_code'];
            $language->php_locale_code = $input['php_locale_code'];
            $language->rtl = $input['rtl'];

            if (parent::save($language)) {
                return true;
            }

            throw new GeneralException(trans('settings.translation.exceptions.language.create_error'));
        });
    }
}
