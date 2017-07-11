@extends('layouts.app')

@section('styles')
    <!-- DATATABLES PLUGIN-->
    {!! Html::style('assets/template/css/plugins/dataTables/datatables.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('exam.instance.list.title'),
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
                        'title'=> trans('exam.instance.list.table.title'),
                        'route'=> route('exam_instance.create'),
                        'button' => trans('exam.instance.list.table.add')])
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-list" >
                                <thead>
                                <tr>
                                    @include('admin.partials.table.header', [
                                        'headers' => trans('exam.instance.list.table.header')])
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($examInstances as $examInstance)
                                    <tr class="gradeX">
                                        <td>{{ $examInstance->name }}</td>
                                        <td>{{ $examInstance->from }}</td>
                                        <td>{{ $examInstance->to }}</td>
                                        <td>
                                            @include('admin.partials.button.actions', [
                                                'url' => [
                                                    'edit' => route('exam_instance.edit', ['id' => $examInstance->id]),
                                                    'delete' => route('exam_instance.delete')],
                                                'id' => $examInstance->id,
                                                'name' => $examInstance->name])
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
        app.question.delete = "{{ trans('exam.instance.question.delete') }}" ;
        app.url.action = "{{ route('exam_instance.list') }}";

        dataTableConfig.order = [[ 1, 'asc' ]];
        dataTableConfig.fileToExportName = 'ExamsInstance';
    </script>
@stop