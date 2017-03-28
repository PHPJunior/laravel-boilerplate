<?php

namespace App\Http\Controllers\Backend\Setting\Translation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\TranslationLoader\LanguageLine;
use Efriandika\LaravelSettings\Facades\Settings;
use App\Repositories\Backend\Setting\Language\LanguageRepository;
use App\Repositories\Backend\Setting\Translation\TranslationRepository;

class TranslationController extends Controller
{
    /**
     * @var TranslationRepository
     */
    private $translation;
    /**
     * @var LanguageRepository
     */
    private $language;

    /**
     * TranslationController constructor.
     * @param TranslationRepository $translation
     * @param LanguageRepository $language
     */
    public function __construct(TranslationRepository $translation, LanguageRepository $language)
    {
        $this->translation = $translation;
        $this->language = $language;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.setting.translation.index')->withLanguageLines($this->translation->getGroupBy());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setting.translation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->translation->create($request->all());

        return redirect()->route('admin.setting.translation.index')->withFlashSuccess(trans('settings.translation.alerts.language.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  LanguageLine $line
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function line($line)
    {
        return view('backend.setting.translation.translate')->with([
            'language_lines' => $line->paginate(Settings::get('page_per_row')),
            'language_lists' => $this->language->getAll(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  LanguageLine $line
     * @return \Illuminate\Http\Response
     */
    public function edit(LanguageLine $line)
    {
        return view('backend.setting.translation.edit')->with(['line' => $line]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LanguageLine $language
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update($language, Request $request)
    {
        $this->translation->update($language, $request->except(['_token', '_method']));

        return redirect()->back()->withFlashSuccess(trans('settings.translation.alerts.language.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LanguageLine $line
     * @return \Illuminate\Http\Response
     */
    public function destroy(LanguageLine $line)
    {
        $this->translation->delete($line);

        return redirect()->back()->withFlashSuccess(trans('settings.translation.alerts.language.deleted'));
    }

    public function deleteLanguageGroup($group)
    {
        $group->delete();

        return redirect()->route('admin.setting.translation.index')->withFlashSuccess(trans('settings.translation.alerts.language.deleted'));
    }
}
