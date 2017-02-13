<div class="col-md-6">
    <!-- name -->
    <div class="form-group">
        <label for="name">{{ trans('general.label.name') }}:</label>
        <input name="name" id="name" type="text" class="form-control" value="{{ $user->name }}">
    </div>
    <!-- last_name -->
    <div class="form-group">
        <label for="last_name">{{ trans('general.label.last_name') }}:</label>
        <input name="last_name" id="last_name" type="text" class="form-control" value="{{ $user->last_name }}">
    </div>
    <!-- email -->
    <div class="form-group">
        <label for="email">{{ trans('general.label.email') }}:</label>
        <input name="email" id="email" type="text" class="form-control" value="{{ $user->email }}">
    </div>
    <!-- password -->
    <div class="form-group">
        <label for="password">{{ trans('general.label.password') }}:</label>
        <input name="password" id="password" type="password" class="form-control" value="{{-- $user->password --}}">
    </div>
    <!-- password_confirmation -->
    <div class="form-group">
        <label for="password_confirmation">{{ trans('general.label.password_confirmation') }}:</label>
        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" value="{{-- $user->password --}}">
    </div>
    <!-- phone -->
    <div class="form-group">
        <label for="phone">{{ trans('general.label.phone') }}:</label>
        <input name="phone" id="phone" type="text" class="form-control" value="{{ $user->phone }}">
    </div>
</div>
<div class="col-md-6">
    <!-- address -->
    <div class="form-group">
        <label for="address">{{ trans('general.label.address') }}:</label>
        <input name="address" id="address" type="text" class="form-control" value="{{ $user->address }}">
    </div>
    <!-- dni -->
    <div class="form-group">
        <label for="dni">{{ trans('general.label.dni') }}:</label>
        <input name="dni" id="dni" type="text" class="form-control" value="{{ $user->dni }}">
    </div>

    <!-- role -->
    @include('controls.select', [
        'title' => trans('general.label.role'),
        'placeholder' => trans('general.label.select_role'),
        'selected_id' => $user->role_id,
        'models'=> $roles,
        'control_id'=> 'role_id',
        'field_id' => 'id',
        'field_value' => 'name',
        'trans' => trans('general.roles'),
    ])

    <!-- city -->
    @include('controls.select', [
        'title' => trans('general.label.city'),
        'placeholder' => trans('general.label.select_city'),
        'selected_id' => $user->city_id,
        'models'=> $cities,
        'control_id'=> 'city_id',
        'field_id' => 'id',
        'field_value' => 'name',
    ])
</div>
