<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            @include('partials.menu.header')

{{--            @if ( currentUser()->isAdmin() ) --}}
                @include('navigation.admin')
{{--            @elseif( currentUser()->isSecretary() ) --}}
                @include('navigation.secretary')
{{--            @elseif( currentUser()->isPreceptor() ) --}}
                @include('navigation.preceptor')
{{--            @elseif( currentUser()->isProfessor() ) --}}
                @include('navigation.professor')
{{--            @elseif( currentUser()->isStudent() ) --}}
                @include('navigation.student')
{{--            @elseif( currentUser()->isTutor() ) --}}
                @include('navigation.tutor')
{{--            @endif --}}

            @include('navigation.shared')

        </ul>
    </div>
</nav>