{{--
    Control => Checkboxes Table
        @include('controls.checkbox', [
            'title' => (string),
            'table_id' => (string),
            'filter' => (bool),
            'model' => eloquent_model,
            'collection' => (array) or (collection),
            'relation' => method in model(string)])
    Add css y js to the view
        {!! Html::style('assets/template/css/plugins/iCheck/custom.css') !!}
        {!! Html::script('assets/plugins/iCheck/iCheck.js') !!}
        {!! Html::script('assets/template/js/plugins/iCheck/icheck.min.js') !!}
    If use filter then add these files to the view
        {!! Html::style('assets/plugins/list/list.css')!!}
        {!! Html::script('assets/plugins/list/list.min.js')!!}
    And define
        var options = { valueNames: [ '$filter' ] };
        var list = new List('$filter', options);
--}}
<div id="{{isset($filter) ? $filter: ""}}" class="ibox float-e-margins">
    @include('admin.partials.title', ['title' => $title])

    @if(isset($filter))
        <div class="ibox-content">
            <div class="row">
                <div class="col-xs-12" style="margin-bottom: 1em;">
                    {!! Form::text("search" , "", ['class'=>'form-control search', 'autocomplete'=>'off', 'placeholder'=> 'Buscar', ]) !!}
                </div>
            </div>
        </div>
    @endif

    <div class="ibox-content">
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover">
                    <tbody id="{{$table_id}}" class="list">
                        @if(isset($collection))
                            @foreach($collection as $key => $entity)
                                <tr>
                                    <td class="{{ isset($filter) ? $filter : "" }}">{{ $entity->id . "-". $entity->name }}</td>
                                    <td style="width: 10%">
                                        <div class="i-checks">
                                            <input type="checkbox" name="{{ $relation }}" class="{{ $relation }}" @if($model->{$relation}->contains($entity->id)) checked="" @endif value="{{ $entity->id }}">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>