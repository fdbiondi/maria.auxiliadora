@extends('layouts.app')

@section('styles')
@parent
    <!-- DATETIME PICKER -->
    {!! Html::style('assets/template/css/plugins/datetimepicker/bootstrap-datetimepicker.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.plan.create.title'),
        'breadcrumbs' => [],
        'previous_url' => route('plan.list'),
        'previous_text' => trans('admin.plan.create.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    @include('admin.partials.title', [
                        'title'=> trans('admin.plan.create.subtitle')])
                    <div class="ibox-content">
                        {!! Form::open(['id' => 'admin_form', 'route' => 'plan.store', 'method' => 'POST']) !!}
                        @include('admin.plan.partials.fields')
                        <div class="form-group">
                            @include('admin.partials.button.save')
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <!-- MOMENT JS-->
    {!! Html::script('assets/template/js/plugins/moment/moment.min.js') !!}
    {!! Html::script('assets/template/js/plugins/moment/locale.'. getAppLanguage() .'.js') !!}
    <!-- DATETIME PICKER -->
    {!! Html::script('assets/template/js/plugins/datetimepicker/bootstrap-datetimepicker.min.js') !!}

    <script type="text/javascript">
        ACTION_URL = "{{ route('plan.create') }}";
        $(function () {
            $('.date').datetimepicker({
                viewMode: 'years',
                format: 'DD/MM/YYYY'
            });
        });
    </script>
    <!-- ADMIN VIEWS JS -->
    {!! Html::script('assets/js/admin/admin.js') !!}
@stop