{{-- shared stuff --}}
@foreach(trans('menu.shared.items') as $content)
    @include('partials.menu.item', [
        'sections' => trans('menu.shared.sections'),
        'route' => route($content['route']),
        'icon' => $content['icon'],
        'text' => $content['text'],
        'item' => $content['name']
    ])
@endforeach