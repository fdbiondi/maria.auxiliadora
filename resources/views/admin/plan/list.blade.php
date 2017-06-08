@extends('layouts.app')

@section('styles')
        <!-- DATATABLES PLUGIN-->
{!! Html::style('assets/template/css/plugins/dataTables/datatables.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.plan.list.title'),
        'breadcrumbs' => [],
        'previous_url' => route('home'),
        'previous_text' => trans('admin.plan.list.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    @include('admin.partials.table.title', [
                        'title'=> trans('admin.plan.list.table.title'),
                        'route'=> route('plan.create'),
                        'button' => trans('admin.plan.list.table.add')])
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-list" >
                                <thead>
                                <tr>
                                    @include('admin.partials.table.header', [
                                        'headers' => trans('admin.plan.list.table.header')])
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($plans as $plan)
                                    <tr class="gradeX">
                                        <td>{{ $plan->name }}</td>
                                        <td>{{ $plan->date}}</td>
                                        <td>
                                            @include('admin.partials.button.actions', [
                                                'url' => [
                                                    'edit' => route('plan.edit', ['id' => $plan->id]),
                                                    'delete' => route('plan.delete')],
                                                'id' => $plan->id,
                                                'name' => $plan->name])
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
        var QUESTION_DELETE = "{{ trans('admin.plan.question.delete') }}" ;
        ACTION_URL = "{{ url()->current() }}";

        $order = [[ 0, "asc" ]];
        $fileToExportName = "Plans";
    </script>
@stop