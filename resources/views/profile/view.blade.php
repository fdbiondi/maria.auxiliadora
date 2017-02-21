@extends('layouts.app')

@section('styles')
@parent
        <!-- BOOTSTRAP SELECT -->
{!! Html::style('assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') !!}
@endsection

@section('content-header')
    @include('partials.content-header', [
        'title'=>trans('admin.profile.title'),
        'breadcrumbs' => [],
        'previous_url' => route('home'),
        'previous_text' => trans('admin.profile.back')])
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @include('partials.errors')
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    @include('admin.partials.title', [
                        'title'=> trans('admin.profile.subtitle')])

                    <div class="ibox-content">
                        <div class="row">
                            {!! Form::open(['id' => 'admin_form', 'route' => ['profile.update'], 'method' => 'POST']) !!}
                                @include('profile.partials.fields')
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        @include('admin.partials.save_button')
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        ACTION_URL = "{{ route('profile.view') }}";
    </script>
    <!-- BOOTSTRAP SELECT -->
    {!! Html::script('assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') !!}
            <!-- ADMIN VIEWS JS -->
    {!! Html::script('assets/js/admin/admin.js') !!}
@stop