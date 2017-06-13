<!-- name -->
<div class="form-group">
    <label>{{ trans('general.label.name') }}:</label>
    <input name="name" id="name" type="text" class="form-control" value="{{ $plan->name }}">
</div>
<!-- date -->
<div class="form-group">
    <label for="date">{{ trans('general.label.date') }}:</label>
    <div class="input-group date">
        <input type="text" id="date" name="date" class="form-control date" value="{{ $plan->date }}">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    </div>
</div>
<!-- code -->
<div class="form-group">
    <label>{{ trans('general.label.code') }}:</label>
    <input name="code" id="code" type="text" class="form-control" value="{{ $plan->code }}">
</div>
<!-- level -->
@include('controls.select', [
    'title' => trans('general.label.level'),
    'placeholder' => trans('general.label.select_level'),
    'selected_id' => $plan->level_id,
    'collection' => $levels,
    'control_id' => 'level_id',
    'field_id' => 'id',
    'field_value' => 'name',
    'trans' => trans('general.levels'),
    'disabled' => false,
])

<!-- current -->
<div class="form-group">
    <div class="form-group">
        <input name="current" id="current" type="checkbox" class="js-switch" @if($plan->current) checked @endif/>
        <label class="m-l-md check-label">@if($plan->current) {{ trans('general.label.valid') }} @else {{ trans('general.label.no_valid') }} @endif</label>
    </div>
</div>

@section('scripts')
    @parent
    <script type="text/javascript">
        const VALID = "{{ trans('general.label.valid') }}";
        const NO_VALID = "{{ trans('general.label.no_valid') }}";

        $(function () {
            $('.date').datetimepicker({
                viewMode: 'years',
                format: 'DD/MM/YYYY'
            });

            const $booleanCheck = $('input[name=current]');
            const elem = document.querySelector('.js-switch');
            const switchery = new Switchery(elem, { color: '#1AB394' });

            $booleanCheck.on('change', function() {
                $('.check-label').text(this.checked ? VALID : NO_VALID);
            });
        });
    </script>
@stop