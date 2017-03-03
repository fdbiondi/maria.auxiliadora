@include('partials.menu.item', [
    'sections' => trans('menu.exams.sections'),
    'route' => route(trans('menu.exams.items.exam_register.route')),
    'icon' => trans('menu.exams.items.exam_register.icon'),
    'text' => trans('menu.exams.items.exam_register.text'),
    'item' => trans('menu.exams.items.exam_register.name')
])
