@if(Session::has('message'))
    <p {!! Html::classes(['col-md-8','col-md-offset-2','alert','alert-danger' => Session::get('message')['error'],'alert-success' => !Session::get('message')['error']]) !!}>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {!! Session::get('message')['message'] !!}
    </p>
@endif
