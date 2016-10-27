{{--
TODO - crear en admin.partials un template con todos los fields posibles al cual se le pase
TODO - un array con los campos que se utilizaran, este array puede guardarse en los archivos de lang --}}
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