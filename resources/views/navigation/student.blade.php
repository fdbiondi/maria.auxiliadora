@include('partials.menu.item', [
    'sections' => trans('menu.students.sections'),
    'route' => route(trans('menu.students.items.exam_registration.route')),
    'icon' => trans('menu.students.items.exam_registration.icon'),
    'text' => trans('menu.students.items.exam_registration.text'),
    'item' => trans('menu.students.items.exam_registration.name')
])
