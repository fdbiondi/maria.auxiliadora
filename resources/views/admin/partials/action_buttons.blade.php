{{-- Delete and Edit Buttons
        para incluir los botones de accion => @include('admin.partials.action_buttons')
        - pasarle las url => $url = ['edit' => 'edit_route', 'delete' => 'delete_route']
        - pasarle el id y name del item a eliminar => $id, $name --}}
<a href="{{ $url['edit'] }}" title="{{ trans('general.crud.edit') }}" class="btn btn-success btn-sm m-l-t-sm" type="button">
    <i class="fa fa-pencil"></i>
</a>
<a href="{{ $url['delete'] }}" title="{{ trans('general.crud.delete') }}" class="btn btn-danger btn-sm m-l-t-sm delete" data-id="{{ $id }}" data-name="{{ $name }}" type="button">
    <i class="fa fa-trash"></i>
</a>