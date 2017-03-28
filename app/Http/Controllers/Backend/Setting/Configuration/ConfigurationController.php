<?php

namespace App\Http\Controllers\Backend\Setting\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Efriandika\LaravelSettings\Facades\Settings;

/**
 * Class ConfigurationController.
 */
class ConfigurationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function general()
    {
        return view('backend.setting.configuration.general');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function company()
    {
        return view('backend.setting.configuration.company');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mail()
    {
        return view('backend.setting.configuration.mail');
    }

    public function system()
    {
        return view('backend.setting.configuration.system');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->has('app_locale')) {
            session()->put('locale', $request->input('app_locale'));
        }

        foreach ($request->except(['_token']) as $key => $value) {
            Settings::set($key, $value);
        }

        return redirect()->back()->withFlashSuccess(trans('settings.configuration.alerts.updated'));
    }
}
