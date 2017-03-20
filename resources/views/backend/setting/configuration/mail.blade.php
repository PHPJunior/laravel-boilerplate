@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ trans('settings.configuration.title') }}
        <small>{{ trans('settings.configuration.management') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.setting.config.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'mail_from-config']) }}

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('settings.configuration.mail.title') }}</h3>

        </div><!-- /.box-header -->

        <div class="box-body">

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label class="col-lg-4 control-label">{{ trans('settings.configuration.mail.attributes.mail_driver') }}</label>
                        <div class="col-lg-8">
                            {{ Form::selectMailDriver('mail_driver', Settings::get('mail_driver') , ['class' => 'form-control' , 'id' => 'mail_driver']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('mail_from_name', trans('settings.configuration.mail.attributes.mail_from_name'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('mail_from_name', Settings::get('mail_from_name') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.mail.attributes.mail_from_name')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('mail_from_address', trans('settings.configuration.mail.attributes.mail_from_address'), ['class' => 'col-lg-4 control-label']) }}

                        <div class="col-lg-8">
                            {{ Form::text('mail_from_address', Settings::get('mail_from_address') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.mail.attributes.mail_from_address')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->


                </div>
                <div class="col-md-6">
                    <div id="mandrill-div">
                        <div class="form-group">
                            {{ Form::label('services_mandrill_secret', trans('settings.configuration.mail.attributes.services_mandrill_secret'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::text('services_mandrill_secret', Settings::get('services_mandrill_secret') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.mail.attributes.services_mandrill_secret')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div>

                    <div id="mailgun-div">
                        <div class="form-group">
                            {{ Form::label('services_mailgun_domain', trans('settings.configuration.mail.attributes.services_mailgun_domain'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::text('services_mailgun_domain', Settings::get('services_mailgun_domain') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.mail.attributes.services_mailgun_domain')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('services_mailgun_secret', trans('settings.configuration.mail.attributes.services_mailgun_secret'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::text('services_mailgun_secret', Settings::get('services_mailgun_secret') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.mail.attributes.services_mailgun_secret')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div>

                    <div id="smtp-div">
                        <div class="form-group">
                            {{ Form::label('mail_host', trans('settings.configuration.mail.attributes.mail_host'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::text('mail_host', Settings::get('mail_host') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.mail.attributes.mail_host')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('mail_port', trans('settings.configuration.mail.attributes.mail_port'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::text('mail_port', Settings::get('mail_port') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.mail.attributes.mail_port')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('mail_username', trans('settings.configuration.mail.attributes.mail_username'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::text('mail_username', Settings::get('mail_username') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.mail.attributes.mail_username')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('mail_password', trans('settings.configuration.mail.attributes.mail_password'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::text('mail_password', Settings::get('mail_password') , ['class' => 'form-control', 'placeholder' => trans('settings.configuration.mail.attributes.mail_password')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div>

                    <div id="enc-div">
                        <div class="form-group">
                            <label class="col-lg-4 control-label">{{ trans('settings.configuration.mail.attributes.mail_encryption') }}</label>
                            <div class="col-lg-8">
                                {{ Form::selectMailEncryption('mail_encryption', Settings::get('mail_encryption') , ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
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

@section('after-scripts')
    <script>
        open_div('{{ Settings::get('mail_driver') }}');

        $(function () {
            $('#mail_driver').on('change',function () {
                open_div($(this).val());
            });
        });

        function open_div(val) {
            var id = $('#mailgun-div,#mandrill-div,#smtp-div,#enc-div');
            switch(val) {
                case 'mail' :
                    id.hide();
                    break;
                case 'sendmail' :
                    id.hide();
                    break;
                case 'smtp' :
                    $('#smtp-div,#enc-div').show();
                    $('#mailgun-div,#mandrill-div').hide();
                    break;
                case 'mailgun' :
                    $('#smtp-div,#mailgun-div').show();
                    $('#enc-div,#mandrill-div').hide();
                    break;
                case 'mandrill' :
                    $('#mandrill-div').show();
                    $('#mailgun-div,#smtp-div,#enc-div').hide();
                    break;
                default:
                    id.hide();
            }
        }
    </script>
@endsection