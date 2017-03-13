@extends('layouts.app')

@section('styles')
    {!! Html::style('assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.course_registration.index.title'),
        'breadcrumbs' => [],
        'previous_url' => route('home'),
        'previous_text' => trans('admin.course_registration.index.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    @include('admin.partials.table.title', [
                        'title'=> trans('admin.course_registration.index.register'),
                    ])
                    <div class="ibox-content">
                        @include('controls.select', [
                            'title' => trans('admin.course_registration.index.course'),
                            'placeholder' => trans('general.label.select_course'),
                            'selected_id' => $course->id,
                            'collection' => $courses,
                            'control_id' => 'course_id',
                            'field_id' => 'id',
                            'field_value' => 'description',
                            'disabled' => false,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    @parent
    {!! Html::script('assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') !!} 
            <!-- ADMIN VIEWS JS -->
    {!! Html::script('assets/js/admin/admin.js') !!}
    <script type="text/javascript">
        var QUESTION_DELETE = "{{ trans('admin.course_registration.question.delete') }}" ;
        ACTION_URL = "{{ url()->current() }}";

        $order = [[ 2, "desc" ]];
        $fileToExportName = "Courses";
    </script>
@stop