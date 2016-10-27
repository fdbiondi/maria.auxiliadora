@extends('layouts.app')

@section('content-header')
    @include('partials.content-header',[
        'title'=>trans('general.home.title'),
        'breadcrumbs' => []])
@endsection

@section('content')
    <div class="row" style="margin-top: 3em">
        @include('partials.errors')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row" style="margin-bottom:1em">
                        <div class="col-md-4 col-md-offset-4" >
                            <h2><strong>{{ trans('general.home.welcome') }}</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection