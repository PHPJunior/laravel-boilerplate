@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ trans('settings.configuration.title') }}
        <small>{{ trans('settings.configuration.management') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.setting.config.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'system-config']) }}

    <input type="hidden" value="{{ Settings::get('access_users_registration', 'false') }}" name="access_users_registration">
    <input type="hidden" value="{{ Settings::get('access_users_confirm_email', 'false') }}" name="access_users_confirm_email">
    <input type="hidden" value="{{ Settings::get('access_users_change_email', 'false') }}" name="access_users_change_email">
    <input type="hidden" value="{{ Settings::get('access_captcha_registration', 'false') }}" name="access_captcha_registration">
    <input type="hidden" value="{{ Settings::get('broadcasting_connections_pusher_encrypted ' , 'false') }}" name="broadcasting_connections_pusher_encrypted">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.configuration.system.title') }}</h3>

        </div><!-- /.box-header -->

        <div class="box-body">

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('access_users_registration', trans('settings.configuration.system.attributes.access_users_registration'), ['class' => 'col-lg-8 control-label']) }}

                        <div class="col-lg-4">
                            <input class="btn btn-flat" id="access_users_registration" type="checkbox" {{ Settings::get('access_users_registration') == 'false' ? '' : 'checked' }} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                </div>
                <div class="col-md-3">

                    <div class="form-group">
                        {{ Form::label('access_users_confirm_email', trans('settings.configuration.system.attributes.access_users_confirm_email'), ['class' => 'col-lg-8 control-label']) }}

                        <div class="col-lg-4">
                            <input class="btn btn-flat" id="access_users_confirm_email" type="checkbox" {{ Settings::get('access_users_confirm_email') == 'false' ? '' : 'checked' }} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
                <div class="col-md-3">

                    <div class="form-group">
                        {{ Form::label('access_users_change_email', trans('settings.configuration.system.attributes.access_users_change_email'), ['class' => 'col-lg-8 control-label']) }}

                        <div class="col-lg-4">
                            <input class="btn btn-flat" id="access_users_change_email" type="checkbox" {{ Settings::get('access_users_change_email') == 'false' ? '' : 'checked' }} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
                <div class="col-md-3">

                    <div class="form-group">
                        {{ Form::label('access_captcha_registration', trans('settings.configuration.system.attributes.access_captcha_registration'), ['class' => 'col-lg-8 control-label']) }}

                        <div class="col-lg-4">
                            <input class="btn btn-flat" id="access_captcha_registration" type="checkbox" {{ Settings::get('access_captcha_registration') == 'false' ? '' : 'checked' }} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>

        </div><!-- /.box-body -->

        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.configuration.system.pusher') }}</h3>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('broadcasting_connections_pusher_key', trans('settings.configuration.system.attributes.broadcasting_connections_pusher_key'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('broadcasting_connections_pusher_key', Settings::get('broadcasting_connections_pusher_key') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.system.attributes.broadcasting_connections_pusher_key')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <div class="form-group">
                        {{ Form::label('broadcasting_connections_pusher_secret', trans('settings.configuration.system.attributes.broadcasting_connections_pusher_secret'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('broadcasting_connections_pusher_secret', Settings::get('broadcasting_connections_pusher_secret') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.system.attributes.broadcasting_connections_pusher_secret')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <div class="form-group">
                        {{ Form::label('broadcasting_connections_pusher_app_id', trans('settings.configuration.system.attributes.broadcasting_connections_pusher_app_id'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('broadcasting_connections_pusher_app_id', Settings::get('broadcasting_connections_pusher_app_id') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.system.attributes.broadcasting_connections_pusher_app_id')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('broadcasting_connections_pusher_cluster', trans('settings.configuration.system.attributes.broadcasting_connections_pusher_cluster'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('broadcasting_connections_pusher_cluster', Settings::get('broadcasting_connections_pusher_cluster') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.system.attributes.broadcasting_connections_pusher_cluster')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <div class="form-group">
                        {{ Form::label('broadcasting_default', trans('settings.configuration.system.attributes.broadcasting_default'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::selectBroadcastingDefault('broadcasting_default', Settings::get('broadcasting_default') , ['class' => 'form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <div class="form-group">
                        {{ Form::label('broadcasting_connections_pusher_encrypted', trans('settings.configuration.system.attributes.broadcasting_connections_pusher_encrypted'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            <input class="btn btn-flat" id="broadcasting_connections_pusher_encrypted" type="checkbox" {{ Settings::get('broadcasting_connections_pusher_encrypted') == 'false' ? '' : 'checked' }} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>
        </div>

        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.configuration.system.cache') }}</h3>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('cache_default', trans('settings.configuration.system.attributes.cache_default'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::selectCacheDefault('cache_default', Settings::get('cache_default' , 'file') , ['class' => 'form-control', 'id' => 'cache_driver']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>

                <div class="col-md-6">
                    <div id="memcached-div">
                        <div class="form-group">
                            {{ Form::label('cache_stores_memcached_persistent_id', trans('settings.configuration.system.attributes.cache_stores_memcached_persistent_id'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::text('cache_stores_memcached_persistent_id', Settings::get('cache_stores_memcached_persistent_id') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.system.attributes.cache_stores_memcached_persistent_id')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                        <div class="form-group">
                            {{ Form::label('cache_stores_memcached_servers_host', trans('settings.configuration.system.attributes.cache_stores_memcached_servers_host'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::text('cache_stores_memcached_servers_host', Settings::get('cache_stores_memcached_servers_host' , '127.0.0.1') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.system.attributes.cache_stores_memcached_servers_host')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                        <div class="form-group">
                            {{ Form::label('cache_stores_memcached_servers_port', trans('settings.configuration.system.attributes.cache_stores_memcached_servers_port'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::text('cache_stores_memcached_servers_port', Settings::get('cache_stores_memcached_servers_port' , 11211 ) , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.system.attributes.cache_stores_memcached_servers_port')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                        <div class="form-group">
                            {{ Form::label('cache_stores_memcached_sasl_username', trans('settings.configuration.system.attributes.cache_stores_memcached_sasl_username'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::text('cache_stores_memcached_sasl_username', Settings::get('cache_stores_memcached_sasl_username') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.system.attributes.cache_stores_memcached_sasl_username')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                        <div class="form-group">
                            {{ Form::label('cache_stores_memcached_sasl_password', trans('settings.configuration.system.attributes.cache_stores_memcached_sasl_password'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::text('cache_stores_memcached_sasl_password', Settings::get('cache_stores_memcached_sasl_password') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.system.attributes.cache_stores_memcached_sasl_password')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div>
                </div>
            </div>
        </div>

        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.configuration.system.captcha') }}</h3>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('no-captcha_secret', trans('settings.configuration.system.attributes.no-captcha_secret'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('no-captcha_secret', Settings::get('no-captcha_secret' , 'no-captcha-secret') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.system.attributes.no-captcha_secret')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('no-captcha_sitekey', trans('settings.configuration.system.attributes.no-captcha_sitekey'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('no-captcha_sitekey', Settings::get('no-captcha_sitekey' , 'no-captcha-sitekey') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.system.attributes.no-captcha_sitekey')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                </div>
            </div>
        </div>

        <div class="box-footer">
            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-scripts')
    <script>
        open_div('{{ Settings::get('mail_driver') }}');

        function open_div(val) {
            switch(val) {
                case 'memcached' :
                    $('#memcached-div').show();
                    break;
                default:
                    $('#memcached-div').hide();
            }
        }

        $(function () {
            $('#cache_driver').on('change',function () {
                open_div($(this).val());
            });

            $('#access_users_registration').change(function() {
                $('input[name=access_users_registration]').val($(this).prop('checked'))
            })

            $('#access_users_change_email').change(function() {
                $('input[name=access_users_change_email]').val($(this).prop('checked'))
            })

            $('#access_users_confirm_email').change(function() {
                $('input[name=access_users_confirm_email]').val($(this).prop('checked'))
            })

            $('#access_captcha_registration').change(function() {
                $('input[name=access_captcha_registration]').val($(this).prop('checked'))
            })

            $('#broadcasting_connections_pusher_encrypted').change(function() {
                $('input[name=broadcasting_connections_pusher_encrypted]').val($(this).prop('checked'))
            })
        })
    </script>
@endsection