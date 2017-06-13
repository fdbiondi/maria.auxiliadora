@extends('layouts.app')

@section('styles')
        <!-- DATATABLES PLUGIN-->
{!! Html::style('assets/template/css/plugins/dataTables/datatables.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('exam.registration.list.title'),
        'breadcrumbs' => [],
        'previous_url' => route('home'),
        'previous_text' => trans('general.button.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    @include('admin.partials.table.title', [
                        'title'=> trans('exam.registration.list.table.title'),
                    ])
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-list" >
                                <thead>
                                <tr>
                                    @include('admin.partials.table.header', [
                                        'headers' => trans('exam.registration.subjects.table.header')])
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $subject)
                                    <tr class="gradeX">
                                        <td>{{ $subject->subject->name }}</td>
                                        <td>{{ $subject->course_user->created_at->year }}</td>
                                        <td>{{ $subject->course_user->course->level->name  }}</td>
                                        <td><a href="{{ route('exam_registration.index', ['student_id' => $subject->course_user->user->id,
                                            'subject_id' => $subject->subject->id
                                        ]) }}" class="btn btn-link">
                                                inscribir
                                            </a></td>

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
        var QUESTION_DELETE = "{{ trans('exam.registration.question.delete') }}" ;
        ACTION_URL = "{{ url()->current() }}";

        $order = [[ 1, "asc" ]];
        $fileToExportName = "ExamSubjects";
    </script>
@stop