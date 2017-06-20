@extends('layouts.app')

@section('styles')
    <!-- DATATABLES PLUGIN-->
    {!! Html::style('assets/template/css/plugins/dataTables/datatables.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.course.show.title') . $course->description ,
        'breadcrumbs' => [],
        'previous_url' => route('course.list'),
        'previous_text' => trans('general.button.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    @include('admin.partials.table.title', [
                        'title'=> trans('admin.course.show.list.title'),
                        'route'=> route('course_registration.students', $course),
                        'button' => trans('admin.course.show.list.add')])
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-list" >
                                <thead>
                                <tr>
                                    @include('admin.partials.table.header', [
                                        'headers' => trans('admin.user.list.table.header')])
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr class="gradeX">
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->last_name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->address }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->dni }}</td>
                                        <td>{{ trans("general.roles.{$student->role->name}") }}</td>
                                        <td>
                                            @include('admin.partials.button.actions', [
                                                'url' => [
                                                    'edit' => route('user.edit', ['id' => $student->id]),
                                                    'delete' => route('course.student.delete', [
                                                        'course_id' => Route::input('course_id'),
                                                        'student_id'=> $student->id
                                                    ])],
                                                'id' => $student->id,
                                                'name' => $student->name])
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-list" >
                                <thead>
                                <tr>
                                    @include('admin.partials.table.header', [
                                        'headers' => trans('admin.subject.list.table.header')])
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $subject)
                                    <tr class="gradeX">
                                        <td>{{ $subject->name }}</td>
                                        <td>{{ $subject->description }}</td>
                                        <td>
                                            @include('admin.partials.button.actions', [
                                                'url' => [
                                                    'edit' => route('subject.edit', ['id' => $subject->id])
                                                ],
                                                'id' => $subject->id,
                                                'name' => $subject->name,
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    @parent
    <!-- DATATABLES PLUGIN -->
    {!! Html::script('assets/template/js/plugins/dataTables/datatables.min.js') !!}
    <!-- DATATABLES IMPLEMENTATION JS -->
    {!! Html::script('assets/js/admin/datatable.js') !!}
    <!-- ADMIN VIEWS JS -->
    {!! Html::script('assets/js/admin/admin.js') !!}
    <script type="text/javascript">
        var QUESTION_DELETE = "{{ trans('admin.course.show.question.delete') }}" ;
        ACTION_URL = "{{ url()->current() }}";

        $order = [[ 1, "asc" ]];
        $fileToExportName = "CoursesStudents";
    </script>
@stop