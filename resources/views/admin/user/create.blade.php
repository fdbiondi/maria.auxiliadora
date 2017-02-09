@extends('layouts.app')

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.user.create.title'),
        'breadcrumbs' => [],
        'previous_url' => route('user.list'),
        'previous_text' => trans('admin.user.create.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    @include('admin.partials.title', [
                        'title'=> trans('admin.user.create.subtitle')])
                    <div class="ibox-content">
                        {!! Form::open(['id' => 'admin_form', 'route' => 'user.store', 'method' => 'POST']) !!}
                        @include('admin.user.partials.fields')
                        <div class="form-group">
                            {{ Form::button(trans('general.button.save'), [
                                'class' => 'ladda-button ladda-button-demo btn btn-primary btn-block',
                                'id' => 'btn_save',
                                'data-style' =>'zoom-in'])}}
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
        ACTION_URL = "{{ route('user.create') }}";
    </script>
    <!-- ADMIN VIEWS JS -->
    {!! Html::script('assets/js/admin/admin.js') !!}
@stop