{{-- Table Ibox Title
        para incluir el titulo para la tabla => @include('admin.partials.table.title')
        - pasarle la ruta => $route
        - pasarle el titulo => $title
        - pasarle el nombre para el boton => $button --}}
<div class="ibox-title">
    <h5>{{ $title }}</h5>
    <div class="ibox-tools">
        <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
        </a>
        <a href="{{ $route }}" class="btn btn-xs btn-primary">{{ $button }}</a>
    </div>
</div>