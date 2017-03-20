@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ trans('settings.configuration.title') }}
        <small>{{ trans('settings.configuration.management') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.setting.config.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'company-config']) }}

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.configuration.company.title') }}</h3>

        </div><!-- /.box-header -->

        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('company_name', trans('settings.configuration.company.attributes.company_name'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('company_name', Settings::get('company_name') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.company.attributes.company_name')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('company_phone', trans('settings.configuration.company.attributes.company_phone'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('company_phone', Settings::get('company_phone') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.company.attributes.company_phone')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('company_address', trans('settings.configuration.company.attributes.company_address'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::textarea('company_address', Settings::get('company_address') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.company.attributes.company_address')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('company_email', trans('settings.configuration.company.attributes.company_email'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('company_email', Settings::get('company_email') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.company.attributes.company_email')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('company_website', trans('settings.configuration.company.attributes.company_website'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('company_website', Settings::get('company_website') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.company.attributes.company_website')]) }}
                        </div><!--col-lg-10-->
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