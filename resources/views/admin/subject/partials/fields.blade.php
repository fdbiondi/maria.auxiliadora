<!-- name -->
<div class="form-group">
    <label>{{ trans('general.label.name') }}:</label>
    <input name="name" id="name" type="text" class="form-control" value="{{ $subject->name }}">
</div>
<!-- description -->
<div class="form-group">
    <label>{{ trans('general.label.description') }}:</label>
    <input name="description" id="description" type="text" class="form-control" value="{{ $subject->description }}">
</div>
