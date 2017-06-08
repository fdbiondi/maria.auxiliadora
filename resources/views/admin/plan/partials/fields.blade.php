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
<!-- current -->
<div class="form-group">
    <div class="checkbox-wrapper" data-toggle="popover" title="{{ trans('general.label.validation') }}" data-content="Seleccione si el plan se encuentra activo">
        <input title="{{ trans('general.label.validation') }}" name="current" id="current" type="checkbox" class="js-switch" value="{{ $plan->current }}"/>
    </div>
</div>
