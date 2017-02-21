{{--
    $title = string,
    $subtitle = string,
    $breadcrumbs = array(),
    $previous_url = url,
    $previous_text = string --}}
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><strong>{{ $title }}</strong>
            <div style="font-size: 0.7em;display: inline;">
                @if(isset($subtitle)) - {{ $subtitle }} @endif
            </div>
        </h2>
        <ol class="breadcrumb">
            @foreach($breadcrumbs as $breadcrumb)
                <li><a href="{{ $breadcrumb['link'] }}">{{ $breadcrumb['text'] }}</a></li>
            @endforeach
        </ol>
    </div>
    <div class="col-lg-2">
        @if(isset($previous_url))
            <div class="ibox float-e-margins">
                <div class="mail-tools tooltip-demo m-t-md">
                    <div class="btn-group pull-right">
                        <a class="btn btn-white btn-sm" href="{{ $previous_url }}"><i class="fa fa-arrow-left"></i>
                            {{ $previous_text }} </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>