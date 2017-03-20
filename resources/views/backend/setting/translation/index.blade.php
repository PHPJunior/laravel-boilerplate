@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ trans('settings.language.title') }}
        <small>{{ trans('settings.language.management') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.language.list') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.setting.translation.includes.partial.translation-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:25%;">{{ trans('settings.language.table.name') }}</th>
                        <th>{{ trans('settings.language.table.count') }}</th>
                        <th>{{ trans('settings.language.table.progress') }}</th>
                        <th style="width: 5%">{{ trans('settings.language.table.label') }}</th>
                        <th style="width: 10%">{{ trans('labels.general.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($language_lines as $lang)
                    <tr>
                        <td>
                            <b>{{ ucfirst($lang->group) }}</b>
                        </td>
                        <td>
                            <label class="label label-success">{{ $lang->total }}</label>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{ getLanguageLinePercentage($lang->group) }}%"></div>
                            </div>
                        </td>
                        <td>
                            <span class="label label-danger">{{ getLanguageLinePercentage( $lang->group ) }}%</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.setting.translation.line', $lang->group ) }}" class="btn btn-xs btn-primary"><i class="fa fa-language" data-toggle="tooltip" data-placement="top" title="{{ trans('settings.translation.button.translate') }}"></i></a>
                            <a href="{{ route('admin.setting.translation.delete_group', $lang->group ) }}"
                               data-method="delete"
                               data-trans-button-cancel="{{ trans('buttons.general.cancel') }}"
                               data-trans-button-confirm="{{ trans('buttons.general.crud.delete') }}"
                               data-trans-title="{{ trans('strings.backend.general.are_you_sure') }}"
                               class="btn btn-xs btn-danger">
                                <i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="{{ trans('buttons.general.crud.delete') }}"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script>
        $(function () {
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                container: 'body'
            });
        })
    </script>
@endsection