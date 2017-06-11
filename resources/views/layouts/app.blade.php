<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ trans('general.title') }}</title>
        <!-- Bootstrap -->
        {!! Html::style('assets/template/css/bootstrap.min.css') !!}
        <!-- Font Awesome-->
        {!! Html::style('assets/template/font-awesome/css/font-awesome.css') !!}
        <!-- Ladda style -->
        {!! Html::style('assets/template/css/plugins/ladda/ladda-themeless.min.css') !!}
        <!-- Toastr style -->
        {!! Html::style('assets/template/css/plugins/toastr/toastr.min.css') !!}
        <!-- Sweet Alert -->
        {!! Html::style('assets/template/css/plugins/sweetalert/sweetalert.css') !!}
        <!-- Inspinia Animations CSS -->
        {!! Html::style('assets/template/css/animate.css') !!}

        @yield('styles_before_custom_style')
        <!-- Inspinia Styles CSS-->
        {!! Html::style('assets/template/css/style.css') !!}
        <!-- App Styles -->
        {!! Html::style('assets/css/app.css') !!}

        @yield('styles')
    </head>
    <body @yield('body-class')>
        <div id="wrapper">
            {{-- Sidebar --}}
            @include('partials.sidebar')
            <div id="page-wrapper" class="gray-bg">
                {{-- Header Bar --}}
                @if(isset($use_header))
                    {!! Html::header($use_header) !!}
                @else
                    {!! Html::header() !!}
                @endif

                @yield('content-header')

                @yield('content')

                @include('partials.footer')
            </div>

            <!-- SPIN -->
            <div class="spinner-general overlay" style="display: none; z-index: 999999;">
                <div class="sk-spinner sk-spinner-fading-circle plus" style="height: 100px; width: 100px; ">
                    <div class="sk-circle1 sk-circle"></div>
                    <div class="sk-circle2 sk-circle"></div>
                    <div class="sk-circle3 sk-circle"></div>
                    <div class="sk-circle4 sk-circle"></div>
                    <div class="sk-circle5 sk-circle"></div>
                    <div class="sk-circle6 sk-circle"></div>
                    <div class="sk-circle7 sk-circle"></div>
                    <div class="sk-circle8 sk-circle"></div>
                    <div class="sk-circle9 sk-circle"></div>
                    <div class="sk-circle10 sk-circle"></div>
                    <div class="sk-circle11 sk-circle"></div>
                    <div class="sk-circle12 sk-circle"></div>
                </div>
            </div>
        </div><!-- ./wrapper -->

        <!-- Mainly scripts -->
        {!! Html::script('assets/template/js/jquery-2.1.1.js') !!}
        {!! Html::script('assets/template/js/bootstrap.min.js') !!}
        {!! Html::script('assets/template/js/plugins/metisMenu/jquery.metisMenu.js') !!}
        {!! Html::script('assets/template/js/plugins/slimscroll/jquery.slimscroll.min.js') !!}
        <!-- Custom and plugin javascript -->
        {!! Html::script('assets/template/js/inspinia.js') !!}
        {!! Html::script('assets/template/js/plugins/pace/pace.min.js') !!}
        <!-- Custom Classes -->
        {!! Html::script('assets/js/helpers/loading.class.js') !!}
        {!! Html::script('assets/js/helpers/message.class.js') !!}
        {!! Html::script('assets/js/helpers/util.class.js') !!}
        {!! Html::script('assets/js/helpers/async.class.js') !!}
        {!! Html::script('assets/js/helpers/error.class.js') !!}
        <!-- App -->
        {!! Html::script('assets/js/app.js') !!}
        {!! Html::script('assets/js/app.validations.js') !!}
        <!-- Ladda -->
        {!! Html::script('assets/template/js/plugins/ladda/spin.min.js') !!}
        {!! Html::script('assets/template/js/plugins/ladda/ladda.min.js') !!}
        {!! Html::script('assets/template/js/plugins/ladda/ladda.jquery.min.js') !!}
        <!-- Toastr script -->
        {!! Html::script('assets/template/js/plugins/toastr/toastr.min.js') !!}
        <!-- Sweet alert -->
        {!! Html::script('assets/template/js/plugins/sweetalert/sweetalert.min.js') !!}

        <script>
            //Action URL
            let ACTION_URL = "{{ route('home') }}";
            //token
            let _TOKEN = "{{ csrf_token() }}";
            //Language
            let LANG = "{{ $LANG = getAppLanguage() }}";
            const SERVER_HOSTNAME = "{{ getServerHostName() }}";
            //Language datatables
            const LANG_DATA_TABLE_URL = "{{ asset('assets/template/js/plugins/dataTables/datatables.' . $LANG . '.json') }}";
            //Messages
            const TRY_AGAIN = "{{ trans('general.error.try_again') }}"
            const ERROR_FORM_TITLE = "{{trans('general.error.title')}}";
            const ERROR_FORM_SUBTITLE = "{{trans('general.error.subtitle')}}";
            const OK_FORM_TITLE = "{{trans('general.message.save.ok')}}";
            //Texts for buttons
            const CANCEL_BUTTON = "{{ trans('general.button.cancel') }}";
            const DELETE_BUTTON = "{{ trans('general.button.delete') }}";
            const CONFIRM_BUTTON = "{{ trans('general.button.confirm') }}";
            const ADD_BUTTON = "{{ trans('general.button.add') }}";
            const SAVE_BUTTON = "{{ trans('general.button.save') }}";
            const BACK_BUTTON = "{{ trans('general.button.back') }}";
            //Questions
            const ARE_YOU_SURE_QUESTION = "{{ trans('general.message.question.are_you_sure') }}";
        </script>
        @yield('scripts')
    </body>
</html>
