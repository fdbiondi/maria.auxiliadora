<?php

return [
    'administration' => [
        'title' => 'Administración',
        'icon' => 'fa-cogs',
        'items' => [
            'course' => [
                'icon'=>'fa-building',
                'route' => 'course.list',
                'text' => 'Cursos',
            ],
            'course_registration' => [
                'icon'=>'fa-building',
                'route' => 'course_registration.list',
                'text' => 'Inscripción a cursado'
            ],
            'subject' => [
                'icon' => 'fa-book',
                'route' => 'subject.list',
                'text' => 'Materias',
            ],
            'level' => [
                'icon' => 'fa-book',
                'route' => 'level.list',
                'text' => 'Niveles',
            ],
            'plan' => [
                'icon' => 'fa-book',
                'route' => 'plan.list',
                'text' => 'Planes',
            ],
            'user' => [
                'icon'=>'fa-users',
                'route' => 'user.list',
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
            /*'inscription' => [
                'icon'=>'fa-building',
                'route' => 'course.list',
                'text' => 'Inscribir a Curso',
                'sections' => [
                    '' => '',
                ],
            ],*/
            'exam_instance' => [
                'icon'=>'fa-building',
                'route' => 'exam_instance.list',
                'text' => 'Mesas de Exámen',
            ],
            'exam_act' => [
                'icon'=>'fa-building',
                'route' => 'exam_act.list',
                'text' => 'Exámenes',
            ],
            'exam_registration' => [
                'name' => 'exam_registration',
                'icon'=>'fa-user',
                'route' => 'exam_registration.search',
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
            'profile' => [
                'name' => 'profile',
                'icon'=>'fa-user',
                'route' => 'profile.view',
                'text' => 'Perfil',
            ],
            /*'change_password' => [
                'name' => 'profile',
                'icon' => 'fa-building-o',
                'route' => 'profile.change_password',
                'text' => 'Cambiar Contraseña',
            ],*/
        ],
        'sections' => [
            'view' => '.view',
            'change_password' => '.change_password',
        ],
    ],
    'others' => [
        'title' => '',
        'items' => [
            '' => [
                'icon'=>'fa-building-o',
                'route' => 'profile.view',
                'text' => '',
            ],
        ],
        'sections' => [
            'list' => '.list',
            'view' => '.view',
        ],
    ],
];