@extends('layouts.app')

@section('styles')
    <!-- DATATABLES PLUGIN-->
    {!! Html::style('assets/template/css/plugins/dataTables/datatables.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.course.list.title'),
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
                        'title'=> trans('admin.course.list.table.title'),
                        'route'=> route('course.create'),
                        'button' => trans('admin.course.list.table.add')])
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-list" >
                                <thead>
                                <tr>
                                    @include('admin.partials.table.header', [
                                        'headers' => trans('admin.course.list.table.header')])
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr class="gradeX">
                                        <td>{{ trans('general.levels.'.$course->level->name) }}</td>
                                        <td>{{ $course->division->name }}</td>
                                        <td>{{ $course->year }}</td>
                                        <td>
                                            @include('admin.partials.button.actions', [
                                                'url' => [
                                                    'edit' => route('course.edit', ['id' => $course->id]),
                                                    'delete' => route('course.delete')],
                                                'id' => $course->id,
                                                'name' => $course->name])
                                            <a
                                                href="{{ route('course.show', ['course_id'=>$course->id]) }}"
                                                class="btn btn-primary btn-sm m-l-t-sm"
                                                title="{{ trans('admin.course.show.action.detail') }}"
                                                type="button">
                                                <i class="fa fa-bars"></i>
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
        app.question.delete = "{{ trans('admin.course.question.delete') }}" ;
        app.url.action = "{{ url()->current() }}";

        dataTableConfig.order = [[ 2, 'desc' ]];
        dataTableConfig.fileToExportName = 'Courses';
    </script>
@stop