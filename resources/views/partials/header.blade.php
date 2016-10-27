<div class="row border-bottom">
    <nav {!! Html::classes(['navbar','navbar-static-top','gray-bg' => $use_header, 'white-bg' => !$use_header]) !!} role="navigation" style="margin-bottom: 0; z-index: 0;">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">{{ trans('general.header.title') }}</span>
            </li>
            {{--<li>
                <span class="m-r-sm text-muted welcome-message"><strong>{{ auth()->user()->name }}</strong></span>
            </li>--}}
            <li>
                <a href="{{ route('logout') }}">
                    <i class="fa fa-sign-out"></i> {{ trans('login.general.logout') }}
                </a>
            </li>
        </ul>
    </nav>
</div>