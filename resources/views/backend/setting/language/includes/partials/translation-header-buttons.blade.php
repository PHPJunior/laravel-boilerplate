<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.setting.translation.index', trans('settings.translation.button.translate'), [], ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('admin.setting.language.create', trans('settings.translation.button.add'), [], ['class' => 'btn btn-success btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.sidebar.setting.translation') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.setting.translation.index', trans('settings.translation.button.translate')) }}</li>
            <li>{{ link_to_route('admin.setting.language.create', trans('settings.translation.button.add')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>