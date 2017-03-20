@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ trans('settings.translation.title') }}
        <small>{{ trans('settings.translation.edit') }}</small>
    </h1>
@endsection

@section('content')


    {{ Form::model($language, ['route' => ['admin.setting.language.update', $language], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-language']) }}

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.translation.edit') }} : {{ $language->language_name }}</h3>

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
                {{ Form::label('rtl', trans('settings.translation.attributes.rtl'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="rtl" value="1" {{ ( $language->rtl ) ? 'checked' : '' }}>
                            Yes
                        </label>

                        <label>
                            <input type="radio" name="rtl" value="0" {{ ( ! $language->rtl ) ? 'checked' : '' }}>
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
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {{ Form::close() }}
@endsection