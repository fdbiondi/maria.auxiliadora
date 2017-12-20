@extends('layouts.app')

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.subject.edit.title'),
        'breadcrumbs' => [],
        'previous_url' => url()->previous(),
        'previous_text' => trans('general.button.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    @include('admin.partials.title', [
                        'title'=> trans('admin.subject.create.subtitle')])
                    <div class="ibox-content">
                        {!! Form::open(['id' => 'admin_form', 'route' => ['subjects.update', $subject], 'method' => 'POST']) !!}
                            @include('admin.subject.partials.fields')
                            <div class="form-group">
                                @include('admin.partials.button.save')
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        app.url.action = "{{ route('subjects.list') }}";
    </script>
    <!-- ADMIN VIEWS JS -->
    {!! Html::script('assets/js/admin/admin.js') !!}
@stop