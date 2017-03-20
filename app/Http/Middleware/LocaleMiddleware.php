<?php

namespace App\Http\Middleware;

use App\Models\Setting\Language\Language;
use Closure;
use Carbon\Carbon;

/**
 * Class LocaleMiddleware.
 */
class LocaleMiddleware
{
    /**
     * @var \App\Models\Setting\Language\Language
     */
    private $language;

    /**
     * LocaleMiddleware constructor.
     * @param \App\Models\Setting\Language\Language $language
     */
    public function __construct(Language $language)
    {
        $this->language = $language->where('locale_code' , session()->get('locale'))->first();
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         * Locale is enabled and allowed to be changed
         */
        if (config('locale.status')) {
            if (session()->has('locale') && ( count($this->language) > 0 ) ) {

                /*
                 * Set the Laravel locale
                 */
                app()->setLocale(session()->get('locale'));

                /*
                 * setLocale for php. Enables ->formatLocalized() with localized values for dates
                 */
                setlocale(LC_TIME, $this->language->php_locale_code );

                /*
                 * setLocale to use Carbon source locales. Enables diffForHumans() localized
                 */
                Carbon::setLocale($this->language->locale_code);

                /*
                 * Set the session variable for whether or not the app is using RTL support
                 * for the current language being selected
                 * For use in the blade directive in BladeServiceProvider
                 */
                if ($this->language->rtl) {
                    session(['lang-rtl' => true]);
                } else {
                    session()->forget('lang-rtl');
                }
            }
        }

        return $next($request);
    }
}
