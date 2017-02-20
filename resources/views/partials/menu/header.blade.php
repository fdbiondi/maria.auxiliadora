<li class="nav-header">
    <div class="dropdown profile-element">
        <span>
            <img alt="María Auxiliadora" class="img-responsive img-circle logo-image" src="{{ asset(config('constants.LOGO_IMAGE_TEXT')) }}" />
        </span>
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="clear">
                <span class="block m-t-xs">
                    <strong class="font-bold"></strong>
                </span>
                <span class="text-muted text-xs block">{{ currentUser()->email }}</span>
            </span>
        </a>
    </div>
    <div class="logo-element">
        {{ trans('general.header.short_title') }}
    </div>
</li>