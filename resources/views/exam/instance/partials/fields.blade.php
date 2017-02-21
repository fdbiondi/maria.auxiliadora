<!-- name -->
<div class="form-group">
    <label for="name">{{ trans('general.label.name') }}:</label>
    <input name="name" id="name" type="text" class="form-control" value="{{ $examInstance->name }}">
</div>
<!-- from -->
<div class="form-group">
    <label for="from">{{ trans('general.label.from') }}:</label>
    <div class="input-group date">
        <input type="text" id="from" name="from" class="form-control date" value="{{ $examInstance->from }}">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    </div>
</div>
<!-- to -->
<div class="form-group">
    <label for="to">{{ trans('general.label.to') }}:</label>
    <div class="input-group date">
        <input type="text" id="to" name="to" class="form-control date" value="{{ $examInstance->to }}">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    </div>
</div>