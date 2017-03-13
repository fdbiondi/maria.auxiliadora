@extends('layouts.app')

@section('styles')
    <!-- DATATABLES PLUGIN-->
    {!! Html::style('assets/template/css/plugins/dataTables/datatables.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.exam_act.list.title'),
        'breadcrumbs' => [],
        'previous_url' => route('home'),
        'previous_text' => trans('admin.exam_act.list.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    @include('admin.partials.table.title', [
                        'title'=> trans('admin.exam_act.list.table.title'),
                        'route'=> route('exam_act.create'),
                        'button' => trans('admin.exam_act.list.table.add')])
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-list" >
                                <thead>
                                <tr>
                                    @include('admin.partials.table.header', [
                                        'headers' => trans('admin.exam_act.list.table.header')])
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($examActs as $examAct)
                                    <tr class="gradeX">
                                        <td>{{ $examAct->act_number }}</td>
                                        <td>{{ $examAct->classroom }}</td>
                                        <td>{{ $examAct->date_time }}</td>
                                        <td>{{ $examAct->exam_instance->name }}</td>
                                        <td>{{ $examAct->subject->name }}</td>
                                        <td>
                                            @include('admin.partials.button.actions', [
                                                'url' => [
                                                    'edit' => route('exam_act.edit', ['id' => $examAct->id]),
                                                    'delete' => route('exam_act.delete')],
                                                'id' => $examAct->id,
                                                'name' => $examAct->name])
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
        var QUESTION_DELETE = "{{ trans('admin.exam_act.question.delete') }}" ;
        ACTION_URL = "{{ route('exam_act.list') }}";

        $order = [[ 1, "asc" ]];
        $fileToExportName = "ExamActs";
    </script>
@stop