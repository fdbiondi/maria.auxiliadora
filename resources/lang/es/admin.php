<?php 

return [
    'subject' => [
        'list' => [
            'title' => 'Materias',
            'table' => [
                'title' => 'Listado de Materias',
                'add' => 'Agregar Nueva Materia',
                'header' => [
                    'name' => 'Nombre',
                    'description' => 'Descripción',
                    'actions' => 'Acciones',
                    //'relation' => ''
                ],
            ],
            'back' => 'Volver al Inicio',
        ],
        'create' => [
            'title' => 'Nueva Materia',
            'subtitle' => 'Datos de la Materia',
            'message' => [
                'success' => 'Se ha creado la Materia :name satisfactoriamente.',
                'error' => 'No se guardaron los datos de la Materia.',
            ],
            'back' => 'Volver a Materias',
        ],
        'edit' => [
            'title' => 'Editar Materia',
            'message' => [
                'success' => 'Se ha actualizado la Materia :name satisfactoriamente.',
                'error' => 'No se pudieron actualizar los datos de la Materia.',
            ],
        ],
        'delete' => [
            'title' => 'Baja de Materia',
            'message' => [
                'success' => 'Se ha dado de baja la Materia :name satisfactoriamente.',
                'error' => 'No se pudo dar de baja la Materia :name.',
                'has_relation' => 'No se pudo dar de baja la materia porque se encuentra asignada a un curso actual.'
            ],
        ],
        'field' => [

        ],
        'question' => [
            'delete' => 'Desea dar de baja la Materia :name.',
        ],
    ],
];