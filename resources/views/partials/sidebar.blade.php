<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            @include('partials.menu.header')

                @include('navigation.admin')
                @include('navigation.secretary')
                @include('navigation.preceptor')
                @include('navigation.professor')
                @include('navigation.student')
                @include('navigation.tutor')

            @include('navigation.shared')

        </ul>
    </div>
</nav>