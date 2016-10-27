<li class="nav-header">
    <div class="dropdown profile-element">
        <span>
            <img alt="image" height="75em" width="75em" class="img-responsive img-circle" src="" />
        </span>
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="clear">
                <span class="block m-t-xs">
                    <strong class="font-bold">{{  auth()->user()->email --}}</strong>
                </span>
                <span class="text-muted text-xs block">{{ auth()->user()->name }} <b class="caret"></b></span>
            </span>
        </a>
        <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <li>
                <a href="{{ route('logout') }}">{{ trans('login.general.logout') }}</a>
            </li>
        </ul>
    </div>
    <div class="logo-element">
        {{ trans('general.header.short_title') }}
    </div>
</li>