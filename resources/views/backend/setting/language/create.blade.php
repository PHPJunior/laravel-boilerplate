@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ trans('settings.translation.title') }}
        <small>{{ trans('settings.translation.add') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.setting.language.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-language']) }}

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.translation.add') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.setting.language.includes.partials.translation-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('language_name', trans('settings.translation.attributes.name'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('language_name', null, ['class' => 'form-control', 'placeholder' => trans('settings.translation.attributes.name')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('php_locale_code', trans('settings.translation.attributes.locale'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('php_locale_code', null, ['class' => 'form-control', 'placeholder' => trans('settings.translation.attributes.locale')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('locale_code', trans('settings.translation.attributes.tag'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('locale_code', null, ['class' => 'form-control', 'placeholder' => trans('settings.translation.attributes.tag')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('rtl', trans('settings.translation.attributes.rtl'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="rtl" value="1">
                            Yes
                        </label>

                        <label>
                            <input type="radio" name="rtl" value="0" checked>
                            No
                        </label>
                    </div>
                </div><!--col-lg-10-->
            </div><!--form control-->

        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-solid">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.setting.language.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {{ Form::close() }}
@endsection