<div class="form-group">
    <label>{{ trans('general.label.date') }}:</label>
    <div class="input-group date">
        <input type="text" id="date" name="date" class="form-control date" value="">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    </div>
</div>

<!-- level -->
@include('controls.select', [
    'title' => trans('general.label.level'),
    'placeholder' => trans('general.label.select_level'),
    'selected_id' => $course->level_id,
    'models'=> $levels,
    'control_id'=> 'level_id',
    'field_id' => 'id',
    'field_value' => 'name',
    'trans' => trans('general.levels'),
])

<!-- division -->
@include('controls.select', [
    'title' => trans('general.label.division'),
    'placeholder' => trans('general.label.select_division'),
    'selected_id' => $course->division_id,
    'models'=> $divisions,
    'control_id'=> 'division_id',
    'field_id' => 'id',
    'field_value' => 'name',
])
