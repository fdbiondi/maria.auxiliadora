<!-- last_name -->
<div class="form-group">
    <label>{{ trans('general.label.name') }}:</label>
    <input name="name" id="name" type="text" class="form-control" value="{{ $user->name }}">
</div>
<!-- last_name -->
<div class="form-group">
    <label>{{ trans('general.label.last_name') }}:</label>
    <input name="last_name" id="last_name" type="text" class="form-control" value="{{ $user->last_name }}">
</div>