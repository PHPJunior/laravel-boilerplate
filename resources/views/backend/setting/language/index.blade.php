@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ trans('settings.translation.title') }}
        <small>{{ trans('settings.translation.management') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.translation.list') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.setting.language.includes.partials.translation-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ trans('settings.translation.table.name') }}</th>
                        <th>{{ trans('settings.translation.table.locale') }}</th>
                        <th>{{ trans('settings.translation.table.tag') }}</th>
                        <th>{{ trans('settings.translation.table.rtl') }}</th>
                        <th style="width:6%;">{{ trans('settings.translation.table.enabled') }}</th>
                        <th style="width:30%;">{{ trans('settings.translation.table.progress') }}</th>
                        <th style="width:5%">{{ trans('settings.translation.table.label') }}</th>
                        <th style="width: 10%">{{ trans('labels.general.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($language_list as $lang)
                        <tr>
                            <td>{{ $lang->language_name }}</td>
                            <td>{{ $lang->php_locale_code }}</td>
                            <td>
                                <b>{{ $lang->locale_code }}</b>
                            </td>
                            <td>
                                @if($lang->rtl)
                                    <label class="label label-success">Yes</label>
                                    @else
                                    <label class="label label-danger">No</label>
                                @endif
                            </td>
                            <td>
                                @if($lang->enabled)
                                    <label class="label label-success">Yes</label>
                                @else
                                    <label class="label label-danger">No</label>
                                @endif
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" style="width: {{ getLanguagePercentage($lang->locale_code) }}%"></div>
                                </div>
                            </td>
                            <td><span class="label label-danger">{{ getLanguagePercentage($lang->locale_code) }}%</span></td>
                            <td>{!! $lang->action_buttons !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            {{ $language_list->links('vendor.pagination.custom') }}
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