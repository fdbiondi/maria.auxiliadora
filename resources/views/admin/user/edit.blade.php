@extends('layouts.app')

@section('styles')
@parent
        <!-- BOOTSTRAP SELECT -->
{!! Html::style('assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.user.edit.title'),
        'breadcrumbs' => [],
        'previous_url' => route('user.list'),
        'previous_text' => trans('general.button.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    @include('admin.partials.title', [
                        'title'=> trans('admin.user.create.subtitle')])
                    <div class="ibox-content">
                        <div class="row">
                            {!! Form::open(['id' => 'admin_form', 'route' => ['user.update', $user], 'method' => 'POST']) !!}
                                @include('admin.user.partials.fields')
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        @include('admin.partials.button.save')
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        app.url.action = "{{ route('user.list') }}";
    </script>
    <!-- BOOTSTRAP SELECT -->
    {!! Html::script('assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') !!}
    <!-- ADMIN VIEWS JS -->
    {!! Html::script('assets/js/admin/admin.js') !!}
@stop