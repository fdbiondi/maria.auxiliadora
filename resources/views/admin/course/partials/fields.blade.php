<div class="col-md-6">
    <!-- level -->
    @include('controls.select', [
        'title' => trans('general.label.level'),
        'placeholder' => trans('general.label.select_level'),
        'selected_id' => $course->level_id,
        'collection' => $levels,
        'control_id' => 'level_id',
        'field_id' => 'id',
        'field_value' => 'name',
        'trans' => trans('general.levels'),
        'disabled' => count($course->users) > 0,
    ])

    <!-- division -->
    @include('controls.select', [
        'title' => trans('general.label.division'),
        'placeholder' => trans('general.label.select_division'),
        'selected_id' => $course->division_id,
        'collection' => $divisions,
        'control_id' => 'division_id',
        'field_id' => 'id',
        'field_value' => 'name',
        'disabled' => count($course->users) > 0,
    ])
</div>
<div class="col-md-6">
    <!-- year_of_study -->
    <div class="form-group">
        <label for="year">{{ trans('general.label.year_of_study') }}:</label>
        <div class="input-group date">
            <input type="text" id="year" name="year" class="form-control date" value="{{ $course->year }}" @if(count($course->users) > 0) readonly @endif>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
    </div>
</div>