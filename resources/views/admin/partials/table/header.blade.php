{{-- Table Headers
        para incluir cabecera de tabla => @include('admin.partials.table.header')
        - pasarle los nombres de columnas(th) de la tabla => $headers --}}
@foreach($headers as $header)
    <th>{{ $header }}</th>
@endforeach