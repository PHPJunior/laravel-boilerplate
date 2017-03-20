@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ trans('settings.language.title') }}
        <small>{{ trans('settings.language.management') }}</small>
    </h1>
@endsection

@section('content')
    @foreach($language_lines as $line)
        <div class="box box-solid">
            <div class="box-header">
                <p>{{ trans('settings.language.default_text') }} : <b>{{ $line->default_text }}</b></p>
                <p>{{ trans('settings.language.key') }} : <label class="label label-default">{{ $line->key }}</label></p>
                <a href="{{ route('admin.setting.translation.edit' , $line->id) }}" class="btn btn-primary btn-sm">{{ trans('settings.language.edit_key_group') }}</a>
                <a href="{{ route('admin.setting.translation.destroy', $line->id ) }}"
                   data-method="delete"
                   data-trans-button-cancel="{{ trans('buttons.general.cancel') }}"
                   data-trans-button-confirm="{{ trans('buttons.general.crud.delete') }}"
                   data-trans-title="{{ trans('strings.backend.general.are_you_sure') }}"
                   class="btn btn-sm btn-danger">
                    {{ trans('buttons.general.crud.delete') }}
                </a>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding" style="display: block;">
                <form class="form-horizontal" data-id="{{ $line->id }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="row">
                            @foreach($language_lists as $list)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="{{ $list->language_name }}">{{ $list->language_name }}</label>
                                        <div class="col-sm-8">
                                            <input type="text" {{ $list->locale_code === 'en' ? '' : '' }} name="text[{{ $list->locale_code }}]" value="{{ array_has($line->text , $list->locale_code) ? $line->text[$list->locale_code] : '' }}" class="form-control" id="{{ $list->language_name }}" placeholder="Enter Text">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    <div class="pull-right">
        {{ $language_lines->links() }}
    </div>
@endsection

@section('after-scripts')
    <script>
        $(function () {
            $('.form-horizontal').on('submit',function (e) {
                e.preventDefault();
                $.post('{{ url('admin/setting/translation') }}'+'/' + $(this).data('id'), $(this).serialize(), function (data) {
                    toastr.success('{{ trans('settings.translation.alerts.translation.updated') }}');
                });
            })
        });
    </script>
@endsection