<?php

namespace App\Http\Controllers\Backend\Setting\Language;

use App\Http\Requests\Backend\Setting\Language\ManageLanguageRequest;
use App\Http\Requests\Backend\Setting\Language\StoreLanguageRequest;
use App\Http\Requests\Backend\Setting\Language\UpdateLanguageRequest;
use App\Models\Setting\Language\Language;
use App\Repositories\Backend\Setting\Language\LanguageRepository;
use Efriandika\LaravelSettings\Facades\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    /**
     * @var LanguageRepository
     */
    private $language;

    /**
     * LanguageController constructor.
     * @param LanguageRepository $language
     */
    public function __construct(LanguageRepository $language)
    {
        $this->language = $language;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManageLanguageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageLanguageRequest $request)
    {
        return view('backend.setting.language.index')->withLanguageList($this->language->paginate(Settings::get('page_per_row')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageLanguageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(ManageLanguageRequest $request)
    {
        return view('backend.setting.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreLanguageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguageRequest $request)
    {
        $this->language->create($request->all());
        return redirect()->back()->withFlashSuccess(trans('settings.translation.alerts.translation.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Language $language
     * @param ManageLanguageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language , ManageLanguageRequest $request)
    {
        return view('backend.setting.language.edit')->withLanguage($language);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Language $language
     * @param UpdateLanguageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Language $language , UpdateLanguageRequest $request)
    {
        $this->language->update( $language , $request->all() );

        return redirect()->route('admin.setting.language.index')->withFlashSuccess(trans('settings.translation.alerts.language.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Language $language
     * @param ManageLanguageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language , ManageLanguageRequest $request)
    {
        $this->language->delete($language);

        return redirect()->route('admin.setting.language.index')->withFlashSuccess(trans('settings.translation.alerts.language.deleted'));
    }

    public function enable(Language $language , ManageLanguageRequest $request)
    {
        $language->update([
            'enabled' => ($language->enabled) ? false : true
        ]);

        return redirect()->route('admin.setting.language.index')->withFlashSuccess(trans('settings.translation.alerts.language.enabled'));
    }
}
