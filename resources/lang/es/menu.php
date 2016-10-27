<?php

return [
    'admin' => [
        'title' => 'Administrador',
        'icon' => 'fa-th-large',
        'items' => [
            'subject' => [
                'icon' => 'fa-building-o',
                'route' => 'subject.list',
                'text' => 'Materias',
            ],
            /*'countries' => [ //FIXME example
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
    'others' => [
        'title' => '',
        'items' => [
            /*'products' => [ // FIXME example
                'icon'=>'fa-building-o',
                'route' => 'products.list',
                'text' => 'Productos'
            ],*/
        ],
        'sections' => [
            'list' => '.list',
            'create' => '.create',
            'edit' => '.edit',
            'view' => '.view',
        ],
    ],
];