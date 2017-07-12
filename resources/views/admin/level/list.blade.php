@extends('layouts.app')

@section('styles')
    <!-- DATATABLES PLUGIN-->
    {!! Html::style('assets/template/css/plugins/dataTables/datatables.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.level.list.title'),
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
                        'title'=> trans('admin.level.list.table.title'),
/*                        'route'=> route('levels.create'),*/
                        'button' => trans('admin.level.list.table.add')])
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-list" >
                                <thead>
                                <tr>
                                    @include('admin.partials.table.header', [
                                        'headers' => trans('admin.level.list.table.header')])
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($levels as $level)
                                    <tr class="gradeX">
                                        <td>{{ trans("general.levels.{$level->name}") }}</td>
                                        <td>{{ $level->plan }}</td>
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
        app.question.delete = "{{ trans('admin.level.question.delete') }}" ;
        app.url.action = "{{ url()->current() }}";

        dataTableConfig.order = [[ 0, 'asc' ]];
        dataTableConfig.fileToExportName = 'Levels';
    </script>
@stop