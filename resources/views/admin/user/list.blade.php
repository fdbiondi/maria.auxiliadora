@extends('layouts.app')

@section('styles')
        <!-- DATATABLES PLUGIN-->
{!! Html::style('assets/template/css/plugins/dataTables/datatables.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.user.list.title'),
        'breadcrumbs' => [],
        'previous_url' => route('home'),
        'previous_text' => trans('admin.user.list.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    @include('admin.partials.table.title', [
                        'title'=> trans('admin.user.list.table.title'),
                        'route'=> route('user.create'),
                        'button' => trans('admin.user.list.table.add')])
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
                                @foreach($users as $user)
                                    <tr class="gradeX">
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->dni }}</td>
                                        <td>{{ trans('general.roles.'.$user->role->name) }}</td>
                                        <td>
                                            @include('admin.partials.button.actions', [
                                                'url' => [
                                                    'edit' => route('user.edit', ['id' => $user->id]),
                                                    'delete' => route('user.delete')],
                                                'id' => $user->id,
                                                'name' => $user->name])
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
        var QUESTION_DELETE = "{{ trans('admin.user.question.delete') }}" ;
        ACTION_URL = "{{ url()->current() }}";

        $order = [[ 1, "asc" ]];
        $fileToExportName = "Users";
    </script>
@stop