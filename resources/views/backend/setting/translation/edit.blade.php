@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ trans('settings.translation.title') }}
        <small>{{ trans('settings.translation.edit') }}</small>
    </h1>
@endsection

@section('content')
   {{ Form::model($line, ['route' => ['admin.setting.translation.update', $line], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.translation.add') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.setting.language.includes.partials.translation-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                <label class="col-lg-2 control-label">{{ trans('settings.language.attributes.group') }}</label>
                <div class="col-lg-10">
                    {{ Form::selectLanguageLineGroup('group', null , ['class' => 'form-control' , 'id' => 'group']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('key', trans('settings.language.attributes.key'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('key', null, ['class' => 'form-control', 'placeholder' => trans('settings.language.attributes.key')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('default_text', trans('settings.language.attributes.default_text'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('default_text', null, ['class' => 'form-control', 'placeholder' => trans('settings.language.attributes.default_text')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

        </div><!-- /.box-body -->
        <div class="box-footer">
            <div class="pull-left">
                {{ link_to_route('admin.setting.translation.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-scripts')
    <script>
        $(function () {
            $('#group').select2({
                tags: "true",
            });
        });
    </script>
@endsection