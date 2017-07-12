@extends('layouts.app')

@section('styles')
@parent
    <!-- BOOTSTRAP SELECT -->
    {!! Html::style('assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') !!}
    <!-- DATETIME PICKER -->
    {!! Html::style('assets/template/css/plugins/datetimepicker/bootstrap-datetimepicker.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('exam.instance.edit.title'),
        'breadcrumbs' => [],
        'previous_url' => route('exam_instances.list'),
        'previous_text' => trans('general.button.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    @include('admin.partials.title', [
                        'title'=> trans('exam.instance.create.subtitle')])
                    <div class="ibox-content">
                        {!! Form::open(['id' => 'admin_form', 'route' => ['exam_instances.update', $examInstance], 'method' => 'POST']) !!}
                            @include('exam.instance.partials.fields')
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
    <!-- BOOTSTRAP SELECT -->
    {!! Html::script('assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') !!}
    <!-- MOMENT JS-->
    {!! Html::script('assets/template/js/plugins/moment/moment.min.js') !!}
    {!! Html::script('assets/template/js/plugins/moment/locale.'. getAppLanguage() .'.js') !!}
    <!-- DATETIME PICKER -->
    {!! Html::script('assets/template/js/plugins/datetimepicker/bootstrap-datetimepicker.min.js') !!}
    <!-- ADMIN VIEWS JS -->
    {!! Html::script('assets/js/admin/admin.js') !!}
    <script type="text/javascript">
        app.url.action = "{{ route('exam_instances.list') }}";
        $(function () {
            $('#from').datetimepicker({
                locale: app.lang.locale,
                format: "DD/MM/YYYY",
            });
            $('#to').datetimepicker({
                locale: app.lang.locale,
                format: "DD/MM/YYYY",
                useCurrent: false //Important! See issue #1075
            });
            $("#from").on("dp.change", function (e) {
                $('#to').data("DateTimePicker").minDate(e.date);
            });
            $("#to").on("dp.change", function (e) {
                $('#from').data("DateTimePicker").maxDate(e.date);
            });
        });

    </script>
@stop