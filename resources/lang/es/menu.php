<?php

return [
    'administration' => [
        'title' => 'Administración',
        'icon' => 'fa-cogs',
        'items' => [
            'subject' => [
                'icon' => 'fa-book',
                'route' => 'subject.list',
                'text' => 'Materias',
            ],
            'user' => [
                'icon'=>'fa-users',
                'route' => 'user.list',
                'text' => 'Usuarios',
            ],
            'course' => [
                'icon'=>'fa-building',
                'route' => 'course.list',
                'text' => 'Cursos',
            ],
            /*
            'countries' => [ 
                'icon'=>'fa-globe',
                'route' => 'countries.list',
                'text' => 'Países', 
                'subitems' => [
                    'states' => 'states',
                    'cities' => 'cities',
                ],
            ],*/
        ],
        'sections' => [
            'list' => '.list',
            'create' => '.create',
            'edit' => '.edit',
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
            'exam_register' => [
                'name' => 'exam_register',
                'icon'=>'fa-user',
                'route' => 'exam_register.view',
                'text' => 'Inscripción a Examen',
            ],
        ],
        'sections' => [
            'list' => '.list',
            'create' => '.create',
            'edit' => '.edit',
        ],
        
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