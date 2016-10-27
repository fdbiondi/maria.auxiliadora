@extends('layouts.auth')

@section('title')
    {{ trans('login.page.head-title') }}
@endsection

@section('content')
    <div class="col-md-6">
        <h2 class="font-bold">{{ trans('login.page.title')}}</h2>
        <p>
            {{ trans('login.page.text_1')}}
        </p>
        <p>
            {{ trans('login.page.text_2')}}
        </p>
        <p>
            <small>{{ trans('login.page.text_3')}}</small>
        </p>
    </div>
    <div class="col-md-6">
        <div class="ibox-content">
            {!! Form::open(['route'=>'login', 'method'=>'POST', 'class'=>'m-t']) !!}
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="{{ trans('login.general.user')}}" required="required" >
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="{{ trans('login.general.pass')}}" required="required">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">{{ trans('login.general.login')}}</button>
                <a href="#">
                    <small>{{ trans('login.general.forgot_pass')}}</small>
                </a>
            {!! Form::close() !!}
            <p class="m-t">
                <small></small>
            </p>
            @include('partials.errors')
        </div>
    </div>
@endsection