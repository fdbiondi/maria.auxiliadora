{{-- menu admin FIXME examples
            @if(currentUser()->isAdmin())
                @include('partials.menu.toggle_menu',
                    ['title' => trans('menu.admin.title'),
                     'icon' => trans('menu.admin.icon'),
                     'items' => trans('menu.admin.items'),
                     'sections' => trans('menu.admin.sections')])
            @else {{-- others --}}
{{--@foreach(trans('menu.others.items') as $item => $content)
    @include('partials.menu.item', [
        'sections' => trans('menu.others.sections'),
        'route' => route($content['route'], currentUser()->subjectSelected()->id),
        'icon' => $content['icon'],
        'text' => $content['text']
        ])
@endforeach
@endif--}}

@include('partials.menu.header')

@if ( currentUser()->isAdmin() )
    @include('partials.menu.toggle_menu',
            ['title' => trans('menu.admin.title'),
             'icon' => trans('menu.admin.icon'),
             'items' => trans('menu.admin.items'),
             'sections' => trans('menu.admin.sections')])
@elseif( currentUser()->isSecretary() )

@elseif( currentUser()->isPreceptor() )

@elseif( currentUser()->isProfessor() )

@elseif( currentUser()->isStudent() )

@elseif( currentUser()->isTutor() )

@else
    {{-- shared stuff like PROFILE --}}
@endif
