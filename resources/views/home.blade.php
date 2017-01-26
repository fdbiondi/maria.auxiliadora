@extends('layouts.app')

@section('styles')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Home Style -->
    {!! Html::style('assets/css/home.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header',[
        'title'=>trans('general.home.title'),
        'breadcrumbs' => []])
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('partials.errors')
            <div class="col-md-8 col-md-offset-1">
                <div class="welcome-text flex-center position-ref full-height">
                    <div class="content">
                        <div class="title m-b-md">
                            {{ trans('general.home.welcome') }}
                        </div>

                        <div class="links">
                            <span>{{ trans('general.home.select_option') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection