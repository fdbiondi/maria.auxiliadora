@extends('layouts.app')

@section('styles')
    {!! Html::style('assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.course.registration.list.title'),
        'breadcrumbs' => [],
        'previous_url' => route('home'),
        'previous_text' => trans('general.button.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    @include('admin.partials.table.title', [
                        'title'=> trans('admin.course.registration.list.register'),
                    ])
                    <div class="ibox-content">
                        <div class="row">
                            @if($courses->count() == 0)
                                <div class="col-md-12">
                                    {{ trans('admin.course.registration.message.no_available') }}
                                </div>
                            @else
                            <div class="col-md-12">
                                @include('controls.select', [
                                    'title' => trans('admin.course.registration.list.course'),
                                    'placeholder' => trans('general.label.select_course'),
                                    'selected_id' => $course->id,
                                    'collection' => $courses,
                                    'control_id' => 'course_id',
                                    'field_id' => 'id',
                                    'field_value' => 'description',
                                    'disabled' => false,
                                ])
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    @parent
    {!! Html::script('assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') !!} 
    <!-- COURSE SELECT JS -->
    {!! Html::script('assets/js/admin/course/select.js') !!}

    <script type="text/javascript">
        var QUESTION_DELETE = "{{ trans('admin.course.registration.question.delete') }}" ;
        ACTION_URL = "{{ url()->current() }}";

        const REGISTER_STUDENTS_ROUTE = "{{ route('course_registration.students', 'ID') }}";
    </script>
@stop