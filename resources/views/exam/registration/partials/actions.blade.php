<a href="{{ $url['register'] }}" title="{{ trans('general.crud.edit') }}" class="btn btn-success btn-sm m-l-t-sm" type="button">
    <i class="fa fa-pencil"></i>
</a>
<a href="{{ $url['delete'] }}" title="{{ trans('general.crud.delete') }}" class="btn btn-danger btn-sm m-l-t-sm delete" data-id="{{ $id }}" data-name="{{ $name }}" type="button">
    <i class="fa fa-trash"></i>
</a>