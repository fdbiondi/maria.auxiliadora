{{-- Toggle Menu =>
        receive -> $item, $sections => array(), $route, $icon, $text --}}

<li {!! Menu::isSelectRoute($item, $sections) !!}
    @if(isset($subitems))
        {!! Menu::isActive($subitems, $sections) !!}
    @endif
>
    <a href="{{ $route }}">
        <i class="fa {{ $icon }}"></i>
        <span class="nav-label">{{ $text }}</span>
    </a>
</li>