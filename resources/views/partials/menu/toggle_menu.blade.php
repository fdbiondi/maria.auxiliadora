{{-- Toggle Menu =>
        receive -> $title, $icon, $items => array(), $sections => array() --}}

<li {!! Menu::isActive($items, $sections) !!}>
    <a href="#">
        <i class="fa {{ $icon }}"></i>
        <span class="nav-label">{{ $title }}</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        @foreach($items as $item => $content)
            @include('partials.menu.item', [
                'toggle' => true,
                'route' => route($content['route']),
                'icon' => $content['icon'],
                'text' => $content['text'],
                'subitems' => isset($content['subitems']) ? $content['subitems']: []
            ])
        @endforeach
    </ul>
</li>