@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ trans('settings.configuration.title') }}
        <small>{{ trans('settings.configuration.management') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.setting.config.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'general-config']) }}

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.configuration.general.title') }}</h3>

            <div class="box-tools pull-right">
                <label class="label label-danger">Note: you cannot use both layout-boxed and fixed at
                    the same time. Anything else can be mixed together.</label>
            </div>

        </div><!-- /.box-header -->

        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('app_name', trans('settings.configuration.general.attributes.app_name'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('app_name', Settings::get('app_name') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.general.attributes.app_name')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        <label class="col-lg-4 control-label">{{ trans('settings.configuration.general.attributes.default_language') }}</label>
                        <div class="col-lg-8">
                            {{ Form::selectLanguage('app_locale', Settings::get('app_locale') , ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">{{ trans('settings.configuration.general.attributes.backend_theme') }}</label>
                        <div class="col-lg-8">
                            {{ Form::selectBackendTheme('backend_theme', Settings::get('backend_theme') , ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">{{ trans('settings.configuration.general.attributes.backend_layout') }}</label>
                        <div class="col-lg-8">
                            {{ Form::selectBackendLayout('backend_layout[]', Settings::get('backend_layout') , ['class' => 'form-control select' , 'multiple' => true ]) }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">{{ trans('settings.configuration.general.attributes.timezone') }}</label>
                        <div class="col-lg-8">
                            {{ Form::selectTimezone('app_timezone', Settings::get('app_timezone') , ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('page_per_row', trans('settings.configuration.general.attributes.page_per_row'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('page_per_row', Settings::get('page_per_row') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.general.attributes.page_per_row')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                </div>
            </div>

           <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                       {{ Form::label('google_analytics', trans('settings.configuration.general.attributes.analytics'), ['class' => 'col-md-2 control-label']) }}

                       <div class="col-md-10">
                           {{ Form::textarea('google_analytics', Settings::get('google_analytics') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.general.attributes.analytics')]) }}

                       </div>
                   </div><!--form control-->
               </div>
           </div>

        </div><!-- /.box-body -->

        <div class="box-footer">
            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {{ Form::close() }}
@endsection