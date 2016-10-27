<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        {!! Html::style('assets/template/css/bootstrap.min.css') !!}
        {!! Html::style('assets/template/font-awesome/css/font-awesome.css') !!}

        {!! Html::style('assets/template/css/animate.css') !!}
        {!! Html::style('assets/template/css/style.css') !!}

        {!! Html::style('assets/css/app.css') !!}
    </head>
    <body class="gray-bg">
        <div class="loginColumns animated fadeInDown">
            <div class="row">
                @yield('content')
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    {{ trans('app.company') }}
                </div>
                <div class="col-md-6 text-right">
                    <small>{{ trans('app.copyright') }}</small>
                </div>
            </div>
        </div>
    </body>
</html>
