<!-- act_number -->
<div class="form-group">
    <label for="act_number">{{ trans('general.label.act_number') }}:</label>
    <input name="act_number" id="act_number" type="text" class="form-control" value="{{ $examAct->act_number }}">
</div>
<!-- classroom -->
<div class="form-group">
    <label for="classroom">{{ trans('general.label.classroom') }}:</label>
    <input name="classroom" id="classroom" type="text" class="form-control" value="{{ $examAct->classroom }}">
</div>
<!-- date_time -->
<div class="form-group">
    <label for="date_time">{{ trans('general.label.date_time') }}:</label>
    <div class="input-group date">
        <input type="text" id="date_time" name="date_time" class="form-control date" value="{{ $examAct->date_time }}">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    </div>
</div>

<!-- subject_id -->
@include('controls.select', [
    'title' => trans('general.label.subject'),
    'placeholder' => trans('general.label.select_subject'),
    'selected_id' => $examAct->subject_id,
    'collection'=> $subjects,
    'control_id'=> 'subject_id',
    'field_id' => 'id',
    'field_value' => 'name',
])

<!-- exam_instance_id -->
@include('controls.select', [
    'title' => trans('general.label.exam_instance'),
    'placeholder' => trans('general.label.select_exam_instance'),
    'selected_id' => $examAct->exam_instance_id,
    'collection'=> $examInstances,
    'control_id'=> 'exam_instance_id',
    'field_id' => 'id',
    'field_value' => 'name',
])
