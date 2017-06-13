@extends('layouts.app')

@section('styles')
        <!-- DATATABLES PLUGIN-->
{!! Html::style('assets/template/css/plugins/dataTables/datatables.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('exam.registration.index.title', ['subject' => $subject->name]),
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
                        'title'=> trans('exam.registration.index.table.title'),
                    ])
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-list" >
                                <thead>
                                <tr>
                                    @include('admin.partials.table.header', [
                                        'headers' => trans('exam.registration.index.table.header')])
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($exams as $exam)
                                    <tr class="gradeX">
                                        <td>{{ $exam->instance->name }}</td>
                                        <td>{{ $exam->date_time }}</td>
                                        <td>{{ $exam->date_time }}</td>
                                        <td>
                                            <a href="" title="" class="btn btn-link register" data-exam="{{ $exam->instance->name.' '.$exam->date_time }}" data-id= "{{ $exam->id }}">
                                                Registrar Inscripción
                                            </a>
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
        const CONFIRM_REGISTRATION = "{{ trans('exam.registration.question.confirm_registration', ['subject' => $subject->name]) }}" ;
        const STUDENT_ID = {{ $student_id }};
        ACTION_URL = "{{ route('exam_registration.subjects', ['id' => $student_id]) }}";
        const STORE_URL = "{{ route('exam_registration.store') }}";

    </script> 
@stop