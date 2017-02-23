{{--
    Control => Checkboxes Table
        @include('controls.checkbox', [
            'title' => (string),
            'table_id' => disallow_table || assigned_table,
            'search' => 'disallow' || 'assign',
            'filter' => true || false,
            'model' => (eloquent_model),
            'collection' => (array) or (collection),
            'attribute' => 'attr_show',
            'relation' => (method in model)])
    Add css y js to the view
        {!! Html::style('assets/template/css/plugins/iCheck/custom.css') !!}
        {!! Html::script('assets/plugins/iCheck/icheck.js') !!}
        {!! Html::script('assets/template/js/plugins/iCheck/icheck.min.js') !!}
        {!! Html::script('assets/js/controls/multiples_checkbox.js') !!}
--}}
<div class="ibox float-e-margins">
    @include('admin.partials.title', ['title' => $title])

    @if($filter)
        <div class="ibox-content">
            <div class="row">
                <div class="col-xs-12" style="margin-bottom: 1em;">
                    {!! Form::text("search" , "", ['id' => $control.'_search', 'class'=>'form-control search', 'autocomplete'=>'off', 'placeholder'=> 'Buscar', ]) !!}
                </div>
            </div>
        </div>
    @endif

    <div class="ibox-content">
        <div class="row">
            <div class="col-xs-12 checkbox-table">
                <table class="table table-hover">
                    <tbody id="{{$control}}_table">
                        @if(isset($collection))
                            @foreach($collection as $entity)
                                <tr>
                                    <td>{{ $entity->{$attribute} }}</td>
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