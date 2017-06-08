@extends('layouts.app')

@section('styles')
    <!-- iCHECK -->
    {!! Html::style('assets/template/css/plugins/iCheck/custom.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.course.student.title') . $course->description ,
        'breadcrumbs' => [],
        'previous_url' => route('course.list'),
        'previous_text' => trans('admin.course_registration.add.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            {!! Form::open(['id' => 'admin_form', 'route' => ['course_registration.store', $course], 'method' => 'POST']) !!}
            @include('partials.errors')
            <!-- All Students -->
            <div class="col-lg-6">
                @include('controls.checkbox', [
                    'title' => trans('general.label.students'),
                    'control' => 'disallow',
                    'filter' => true,
                    'model' => $course,
                    'collection' => $students,
                    'relation' => 'users',
                    'attribute' => 'fileNumberAndName'
                    ])
            </div>
            <!-- Register Students -->
            <div class="col-lg-6">
                @include('controls.checkbox', [
                    'title' => trans('general.label.register_students'),
                    'control' => 'assign',
                    'filter' => true,
                    'model' => $course,
                    'collection' => $course->students,
                    'relation' => 'users',
                    'attribute' => 'fileNumberAndName',
                    ])
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    @include('admin.partials.button.save')
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @endsection

@section('scripts')
    @parent
    <!-- iCHECK -->
    {!! Html::script('assets/plugins/iCheck/icheck.js') !!}
    {!! Html::script('assets/template/js/plugins/iCheck/icheck.min.js') !!}
    <!-- ADMIN VIEWS JS -->
    {!! Html::script('assets/js/admin/admin.js') !!}
    {!! Html::script('assets/js/controls/multiples_checkbox.js') !!}

    <script type="text/javascript">
        ACTION_URL = "{{ url()->current() }}";
    </script>
@stop