{{--
    Control => Select =>
    NOTA: if pass on $model a simple array of elements => don't have to pass $field_id and $field_value
        if pass a $default_value => then
        @include('controls.select',[
            'title'=>'',
            'placeholder'=>'',
            'empty_field'=> 'SHOW A FIELD WITH VALUE 0 (optional)',
            'selected_id' => 'ID TO ASIGN VALUE TO THE CONTROL',
            'model'=> Array OF Eloquent Model or Array(of elements with key and value),
            'control_id'=> NAME FOR THE SELECT CONTROL
            'field_id'=> 'PROPERTY THATS REFERENCES TO id ON MODEL(optional)',
            'field_value'=> 'PROPERTY TO SHOW ON THE LIST(optional)'
            'trans'=> ARRAY WITH TRANSLATIONS TO SHOW INSTEAD TO SHOW field_value (optional,required field_value)
            'default_value' => 'SET WHEN ID AND VALUE ARE EQUALS' (optional, boolean)
            ])

    Add css y js to the view
    {!! Html::style('assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') !!}
    {!! Html::script('assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') !!}
--}}

<div class="form-group">
    <label>{{ $title }}:</label>
    <div class="input-group">
        <select name="{{$control_id}}" id="{{$control_id}}" title="{{ $placeholder }}..." class="selectpicker" data-live-search="true" >
            @if(isset($empty_field) && $empty_field==true)
                <option value="0" {!! ($selected_id == null) ? "selected" : "" !!}>{{$placeholder}}</option>
            @endif

            @if(isset($models))
                @foreach($models as $key => $model)
                    @if(isset($field_id))
                        <option value="{{ $model->{$field_id} }}" {!! ($selected_id == $model->{$field_id})? "selected":"" !!}>
                            @if (isset($trans))
                                {{ $trans[$model->{$field_value}] }}
                            @else
                                {{ $model->{$field_value} }}
                            @endif
                        </option>
                    @elseif(isset($default_value))
                        <option value="{{ $model }}" {!! ($selected_id == $model)? "selected":"" !!}>{{ $model }}</option>
                    @else
                        <option value="{{ $key }}" {!! ($selected_id == $key)? "selected":"" !!}>{{ $model }}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>
</div>