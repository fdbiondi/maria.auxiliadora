<?php

return [
    'instance' => [
        'list' => [
            'title' => 'Mesas de Exámen',
            'table' => [
                'title' => 'Listado de Mesas de Exámenes',
                'add' => 'Agregar Nueva Mesa de Exámen',
                'header' => [
                    'name' => 'Nombre',
                    'from' => 'Desde',
                    'to' => 'Hasta',
                    'actions' => 'Acciones',
                    //'relation' => ''
                ],
            ],
            'back' => 'Volver al Inicio',
        ],
        'create' => [
            'title' => 'Nueva Mesa de Exámen',
            'subtitle' => 'Datos de la Mesa de Exámen',
            'message' => [
                'success' => 'Se ha creado la Mesa de Exámen :name satisfactoriamente.',
                'error' => 'No se guardaron los datos de la Mesa de Exámen.',
            ],
            'back' => 'Volver a Mesa de Exámenes',
        ],
        'edit' => [
            'title' => 'Editar Mesa de Exámen',
            'message' => [
                'success' => 'Se ha actualizado la Mesa de Exámen :name satisfactoriamente.',
                'error' => 'No se pudieron actualizar los datos de la Mesa de Exámen.',
            ],
        ],
        'delete' => [
            'title' => 'Baja de Mesa de Exámen',
            'message' => [
                'success' => 'Se ha eliminado la Mesa de Exámen :name satisfactoriamente.',
                'error' => 'No se pudo eliminar la Mesa de Exámen :name.',
                'has_relation' => 'No se pudo eliminar la mesa de exámen porque posee examenes asignados.'
            ],
        ],
        'field' => [

        ],
        'question' => [
            'delete' => 'Desea eliminar la Mesa de Exámen :name.',
        ],
    ],
    'act' => [
        'list' => [
            'title' => 'Exámenes',
            'table' => [
                'title' => 'Listado de Exámenes',
                'add' => 'Agregar Exámen',
                'header' => [
                    'act_number' => 'Número de Acta',
                    'classroom' => 'Salón de Clase',
                    'date_time' => 'Fecha y Hora',
                    'exam_instance' => 'Mesa de Exámen',
                    'subject' => 'Materia',
                    'actions' => 'Acciones',
                    //'relation' => ''
                ],
            ],
            'back' => 'Volver al Inicio',
        ],
        'create' => [
            'title' => 'Nuevo Exámen',
            'subtitle' => 'Datos del Exámen',
            'message' => [
                'success' => 'Se ha creado el Exámen :name satisfactoriamente.',
                'error' => 'No se guardaron los datos del Exámen.',
            ],
            'back' => 'Volver a Exámenes',
        ],
        'edit' => [
            'title' => 'Editar Exámen',
            'message' => [
                'success' => 'Se ha actualizado el Exámen :name satisfactoriamente.',
                'error' => 'No se pudieron actualizar los datos del Exámen.',
            ],
        ],
        'delete' => [
            'title' => 'Baja del Exámen',
            'message' => [
                'success' => 'Se ha eliminado el Exámen :name satisfactoriamente.',
                'error' => 'No se pudo eliminar el Exámen :name.',
                'has_relation' => 'No se pudo eliminar el exámen porque posee inscriptos.'
            ],
        ],
        'field' => [

        ],
        'question' => [
            'delete' => 'Desea eliminar el Exámen :name.',
        ],
    ],
    'registration' => [
        'create' => [
            'message' => [
                'success' => 'Se ha registrado la inscripción.',
                'error' =>  'No se ha podido registrar la inscripción.'
            ]
        ],
        'search' => [
            'title' =>  'Buscar alumno',
            'table' => [
                'title' => 'Alumnos',
                'header' => [
                    'name' => 'Nombre',
                    'dni' =>  'DNI',
                    'file_number' => 'legajo',
                    'course' => 'Curso',
                    'actions' => 'Acciones',
                ]
            ]
        ],
        'index' => [
            'title' =>  'Inscribir a examen: :subject',
            'table' => [
                'title' => 'Fechas habilitadas',
                'header' => [
                    'name' => 'Mesa',
                    'date' => 'fecha',
                    'time' => 'Hora',
                    'actions' => 'Acciones',
                ]
            ] 

        ],
        'subjects' => [
            'title' => 'Materias para rendir',
            'table' => [
                'title' => 'Listado de Materias disponibles',
                'register' => 'Inscribirse',
                'view_register' => 'Ver Inscripción',
                'delete_register' => '',
                'header' => [
                    'subject' => 'Materia',
                    'course' => 'Curso',
                    'year' => 'Año',
                    'actions' => 'Acciones',
                    //'relation' => ''
                ],
            ],
            'back' => 'Volver al Inicio',
        ],
        'question' => [
            'confirm_registration' => 'Confirmar inscripcion para :subject en :exam'
        ]
    ],
];