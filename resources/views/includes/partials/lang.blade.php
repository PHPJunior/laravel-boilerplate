<ul class="dropdown-menu" role="menu">
    @foreach ($languages as $lang)
        @if ($lang->locale_code != App::getLocale())
            <li role="presentation">
                <a href="{{ url('lang/'.$lang->locale_code ) }}">
                    <i class="flag-icon flag-icon-{{ $lang->locale_code == 'en' ? 'gb' : $lang->locale_code }} flag-icon-squared"></i>
                    <span>&nbsp;{{ $lang->language_name }}</span>
                </a>
            </li>
        @endif
    @endforeach
</ul>