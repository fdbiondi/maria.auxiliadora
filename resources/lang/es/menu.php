<?php

return [
    'administration' => [
        'title' => 'Administración',
        'icon' => 'fa-cogs',
        'items' => [
            'courses' => [
                'icon'=>'fa-building',
                'route' => 'courses.list',
                'text' => 'Cursos',
            ],
            'courses_registration' => [
                'icon'=>'fa-building',
                'route' => 'courses_registration.list',
                'text' => 'Inscripción a cursado'
            ],
            'subjects' => [
                'icon' => 'fa-book',
                'route' => 'subjects.list',
                'text' => 'Materias',
            ],
            'levels' => [
                'icon' => 'fa-book',
                'route' => 'levels.list',
                'text' => 'Niveles',
            ],
            'plans' => [
                'icon' => 'fa-book',
                'route' => 'plans.list',
                'text' => 'Planes',
            ],
            'users' => [
                'icon'=>'fa-users',
                'route' => 'users.list',
                'text' => 'Usuarios',
            ],
            /*'country' => [            // example
                'icon'=>'fa-globe',
                'route' => 'country.index',
                'text' => 'Países',
                'subitems' => [ 'state' => 'state' ],
                'sections' => [ 'view' => '.view' ],
            ],*/
        ],
        'sections' => [
            'index' => '.index',
            'list' => '.list',
            'create' => '.create',
            'edit' => '.edit',
            'students' => '.students'
        ],
    ],
    'exams' => [
        'title' => 'Exámenes',
        'icon' => 'fa-cogs',
        'items' => [
            'exam_instances' => [
                'icon'=>'fa-building',
                'route' => 'exam_instances.list',
                'text' => 'Mesas de Exámen',
            ],
            'exam_acts' => [
                'icon'=>'fa-building',
                'route' => 'exam_acts.list',
                'text' => 'Exámenes',
            ],
            'exam_registration' => [
                'icon'=>'fa-user',
                'route' => 'exam_registration.list',
                'text' => 'Inscripción a Examen',
            ],
        ],
        'sections' => [
            'list' => '.list',
            'search' => '.search',
            'create' => '.create',
            'edit' => '.edit',
        ],
        
    ],
    'students' => [
        'items' => [
            'exam_registration' => [
                'name' => 'exam_registration',
                'icon'=>'fa-user',
                'route' => 'exam_registration.subjects',
                'text' => 'Inscripción a Examen',
            ],
        ],
        'sections' => [
            'subjects' => '.subjects'
        ]
    ],
    'shared' => [
        'items' => [
            'profiles' => [
                'name' => 'profiles',
                'icon'=>'fa-user',
                'route' => 'profiles.view',
                'text' => 'Perfil',
            ],
            /*'change_password' => [
                'name' => 'profiles',
                'icon' => 'fa-building-o',
                'route' => 'profiles.change_password',
                'text' => 'Cambiar Contraseña',
            ],*/
        ],
        'sections' => [
            'view' => '.view',
            'change_password' => '.change_password',
        ],
    ],
    'others' => [
        'title' => 'Otros',
        'items' => [
            'profiles' => [
                'icon'=>'fa-building-o',
                'route' => 'profiles.view',
                'text' => '',
            ],
        ],
        'sections' => [
            'list' => '.list',
            'view' => '.view',
        ],
    ],
];