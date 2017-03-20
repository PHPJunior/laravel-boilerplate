<?php

namespace App\Http\Composers;

use App\Models\Setting\Language\Language;
use Illuminate\View\View;

/**
 * Class GlobalComposer.
 */
class GlobalComposer
{
    /**
     * @var Language
     */
    private $language;

    /**
     * GlobalComposer constructor.
     * @param Language $language
     */
    public function __construct(Language $language)
    {
        $this->language = $language->where('enabled' , 1)->get();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('logged_in_user', access()->user());
        $view->with('languages' , $this->language );
    }
}
