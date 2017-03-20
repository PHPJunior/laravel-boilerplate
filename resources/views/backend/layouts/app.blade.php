<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('meta_author', 'Nyi Nyi Lwin')">

        <link href="https://fonts.googleapis.com/css?family=Raleway|Reenie+Beanie" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="shortcut icon" href="{{ url('tile.png') }}" type="image/vnd.microsoft.icon" />

        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
            {{ Html::style(getRtlCss(mix('css/backend.css'))) }}
        @else
            {{ Html::style(mix('css/backend.css')) }}
        @endif

        @yield('after-styles')
        {{ Html::style('plugin/select2/select2.css') }}
        {{ Html::style('plugin/flag-icon-css/css/flag-icon.min.css') }}
        {{ Html::style('plugin/toastr/build/toastr.min.css') }}
        {{ Html::style('plugin/bootstrap-toggle/css/bootstrap-toggle.min.css') }}

        <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        {{ Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
        {{ Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
        <![endif]-->

        <style>
            body {
                font-family: Raleway, "Helvetica Neue", Helvetica, Arial, sans-serif;
            }
        </style>

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body class="skin-{{ config('backend.theme') }} {{ config('backend.layout') }}">
        @include('includes.partials.logged-in-as')

        <div class="wrapper">
            @include('backend.includes.header')
            @include('backend.includes.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('page-header')

                    {{-- Change to Breadcrumbs::render() if you want it to error to remind you to create the breadcrumbs for the given route --}}
                    {!! Breadcrumbs::renderIfExists() !!}
                </section>

                <!-- Main content -->
                <section class="content">
                    @include('includes.partials.messages')
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            @include('backend.includes.footer')
        </div><!-- ./wrapper -->

        <!-- JavaScripts -->
        @yield('before-scripts')

        {{ Html::script(mix('js/backend.js')) }}
        {{ Html::script('plugin/select2/select2.full.min.js') }}
        {{ Html::script('plugin/toastr/build/toastr.min.js') }}
        {{ Html::script('plugin/bootstrap-toggle/js/bootstrap-toggle.min.js') }}
        {{ Html::script('plugin/bootstrap-confirmation/bootstrap-confirmation.min.js') }}

        @yield('after-scripts')


        <script>
            $(function () {
               $('.select').select2();
            });
        </script>
    </body>
</html>