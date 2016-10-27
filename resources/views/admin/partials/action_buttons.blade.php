{{-- Delete and Edit Buttons
        para incluir los botones de accion => @include('admin.partials.action_buttons')
        - pasarle las url => $url = ['edit' => 'edit_route', 'delete' => 'delete_route']
        - pasarle el id y name del item a eliminar => $id, $name --}}
<a href="{{ $url['edit'] }}" class="btn btn-success btn-xs m-l-t-xs" type="button">
    {{ trans('general.crud.edit') }}
</a>
<a href="{{ $url['delete'] }}" class="btn btn-danger btn-xs m-l-t-xs delete" data-id="{{ $id }}" data-name="{{ $name }}" type="button">
    {{ trans('general.crud.delete') }}
</a>