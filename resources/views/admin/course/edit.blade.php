@extends('layouts.app')

@section('styles')
@parent
    <!-- BOOTSTRAP SELECT -->
    {!! Html::style('assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') !!}
    <!-- DATETIME PICKER -->
    {!! Html::style('assets/template/css/plugins/datetimepicker/bootstrap-datetimepicker.min.css') !!}
    <!-- iCHECK -->
    {!! Html::style('assets/template/css/plugins/iCheck/custom.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.course.edit.title'),
        'breadcrumbs' => [],
        'previous_url' => route('course.list'),
        'previous_text' => trans('general.button.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        {!! Form::open(['id' => 'admin_form', 'route' => ['course.update', $course], 'method' => 'POST']) !!}
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    @include('admin.partials.title', [
                        'title'=> trans('admin.course.create.subtitle')])
                    <div class="ibox-content">
                        <div class="row">
                            @include('admin.course.partials.fields')
                        </div>
                        <div class="form-group">
                            @include('admin.partials.button.save')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    @parent
    <!-- BOOTSTRAP SELECT -->
    {!! Html::script('assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') !!}
    <!-- MOMENT JS-->
    {!! Html::script('assets/template/js/plugins/moment/moment.min.js') !!}
    {!! Html::script('assets/template/js/plugins/moment/locale.'. getAppLanguage() .'.js') !!}
    <!-- DATETIME PICKER -->
    {!! Html::script('assets/template/js/plugins/datetimepicker/bootstrap-datetimepicker.min.js') !!}
    <!-- iCHECK -->
    {!! Html::script('assets/plugins/iCheck/icheck.js') !!}
    {!! Html::script('assets/template/js/plugins/iCheck/icheck.min.js') !!}
    <!-- ADMIN VIEWS JS -->
    {!! Html::script('assets/js/admin/admin.js') !!}
    {!! Html::script('assets/js/controls/multiples_checkbox.js') !!}

    <script type="text/javascript">
        ACTION_URL = "{{ route('course.list') }}";

        /* DateTimePicker */
        $(function () {
            $('.date').datetimepicker({
                viewMode: 'years',
                format: 'YYYY',
                locale: LANG
            });
        });
    </script>
@stop