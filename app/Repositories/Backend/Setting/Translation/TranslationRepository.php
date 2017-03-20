<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 3/15/17
 * Time: 8:12 PM
 */

namespace App\Repositories\Backend\Setting\Translation;


use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Spatie\TranslationLoader\LanguageLine;

/**
 * Class TranslationRepository
 * @package App\Repositories\Backend\Setting\Translation
 */
class TranslationRepository extends BaseRepository
{
    /**
     *
     */
    const MODEL = LanguageLine::class;

    /**
     * @return mixed
     */
    public function getGroupBy()
    {
        $languages_lines = self::MODEL;

        return $languages_lines::select( 'group' , DB::raw('count(*) as total'))
            ->groupBy('group')
            ->get();
    }

    /**
     * @param array $input
     */
    public function create(array $input)
    {
        $translation = self::MODEL;
        $translation::create([
            'group' => $input['group'] ,
            'key' => $input['key'] ,
            'text' => [
                'en' => $input['default_text']
            ] ,
            'default_text' => $input['default_text']
        ]);
    }
}