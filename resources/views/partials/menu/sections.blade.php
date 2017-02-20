@if ( currentUser()->isAdmin() )
    @include('partials.menu.toggle_menu',[
        'title' => trans('menu.admin.title'),
        'icon' => trans('menu.admin.icon'),
        'items' => trans('menu.admin.items'),
        'sections' => trans('menu.admin.sections')
    ])
@elseif( currentUser()->isSecretary() )

@elseif( currentUser()->isPreceptor() )

@elseif( currentUser()->isProfessor() )

@elseif( currentUser()->isStudent() )

@elseif( currentUser()->isTutor() )

@endif
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
