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
    'user' => [
        'list' => [
            'title' => 'Usuarios',
            'table' => [
                'title' => 'Listado de Usuarios',
                'add' => 'Agregar Nuevo Usuario',
                'header' => [
                    'name' => 'Nombre',
                    'last_name' => 'Apellido',
                    'email' => 'Email',
                    'address' => 'Dirección',
                    'phone' => 'Teléfono',
                    'dni' => 'DNI',
                    'role' => 'Rol',
                    'actions' => 'Acciones',
                    //'' => '',
                    //'relation' => ''
                ],
            ],
            'back' => 'Volver al Inicio',
        ],
        'create' => [
            'title' => 'Nuevo Usuario',
            'subtitle' => 'Datos del Usuario',
            'message' => [
                'success' => 'Se ha creado el Usuario :name satisfactoriamente.',
                'error' => 'No se guardaron los datos del Usuario.',
            ],
            'back' => 'Volver a Usuarios',
        ],
        'edit' => [
            'title' => 'Editar Usuario',
            'message' => [
                'success' => 'Se ha actualizado el Usuario :name satisfactoriamente.',
                'error' => 'No se pudieron actualizar los datos del Usuario.',
            ],
        ],
        'delete' => [
            'title' => 'Baja de Usuario',
            'message' => [
                'success' => 'Se ha dado de baja el Usuario :name satisfactoriamente.',
                'error' => 'No se pudo dar de baja el Usuario :name.',
                'has_relation' => 'No se pudo dar de baja el usuario porque se encuentra asignado a un curso actualmente.'
            ],
        ],
        'field' => [

        ],
        'question' => [
            'delete' => 'Desea dar de baja el Usuario :name.',
        ],
    ],
    'course' => [
        'list' => [
            'title' => 'Cursos',
            'table' => [
                'title' => 'Listado de Cursos',
                'add' => 'Agregar Nuevo Curso',
                'header' => [
                    'level' => 'Año',
                    'division' => 'División',
                    'date' => 'Fecha',
                    'actions' => 'Acciones',
                ],
            ],
            'back' => 'Volver al Inicio',
        ],
        'create' => [
            'title' => 'Nuevo Curso',
            'subtitle' => 'Datos del Curso',
            'message' => [
                'success' => 'Se ha creado el Curso :name satisfactoriamente.',
                'error' => 'No se guardaron los datos del Curso.',
            ],
            'back' => 'Volver a Cursos',
        ],
        'edit' => [
            'title' => 'Editar Curso',
            'message' => [
                'success' => 'Se ha actualizado el Curso :name satisfactoriamente.',
                'error' => 'No se pudieron actualizar los datos del Curso.',
            ],
        ],
        'delete' => [
            'title' => 'Baja de Curso',
            'message' => [
                'success' => 'Se ha dado de baja el Curso :name satisfactoriamente.',
                'error' => 'No se pudo dar de baja el Curso :name.',
                'has_relation' => 'No se pudo dar de baja el usuario porque se encuentra asignado a un curso actualmente.'
            ],
        ],
        'field' => [

        ],
        'question' => [
            'delete' => 'Desea dar de baja el Curso :name.',
        ],
    ],
];