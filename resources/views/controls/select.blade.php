{{-- Control => Select =>
        @include('controls.select',[
            'title'=>'(required)',
            'placeholder'=>'(required)',
            'empty_field'=> 'SETS WHEN HAVE TO SHOW A FIELD WITH VALUE 0 (optional)',
            'selected_id' => 'ID TO ASSIGN VALUE TO THE CONTROL (required)',
            'collection'=> 'Eloquent Model Collection or Array([key, value]) (required)',
            'control_id'=> 'NAME OF CONTROL (required)',
            'field_id'=> 'PROPERTY THATS REFERENCES TO id ON MODEL(optional)',
            'field_value'=> 'PROPERTY THATS REFERENCES TO value ON MODEL(optional, require field_id)',
            'trans'=> 'ARRAY WITH TRANSLATIONS TO SHOW INSTEAD OF field_value (optional, require field_value)',
            'default_value' => 'SETS WHEN ID AND VALUE ARE THE SAME (optional)',
            'disabled' => '(optional)'
            ])
    Add css y js to the view
    {!! Html::style('assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') !!}
    {!! Html::script('assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') !!} --}}
<div class="form-group">
    <label>{{ $title }}:</label>
    <div class="input-group">
        <select name="{{$control_id}}" id="{{$control_id}}" title="{{ $placeholder }}..." class="selectpicker" data-live-search="true" @if($disabled) disabled @endif>
            @if(isset($empty_field) && $empty_field==true)
                <option value="0" {!! ($selected_id == null) ? "selected" : "" !!}>{{$placeholder}}</option>
            @endif

            @if(isset($collection))
                @foreach($collection as $key => $model)
                    @if(isset($field_id))
                        <option value="{{ $model->{$field_id} }}" {!! ($selected_id == $model->{$field_id})? "selected":"" !!}>
                            @if (isset($trans))
                                {{ $trans[$model->{$field_value}] }}
                            @else
                                {{ $model->{$field_value} }}
                            @endif
                        </option>
                    @elseif(isset($default_value))
                        <option value="{{ $model->{$default_value} }}" {!! ($selected_id == $model->{$default_value})? "selected":"" !!}>{{ $model->{$default_value} }}</option>
                    @else
                        <option value="{{ $key }}" {!! ($selected_id == $key)? "selected":"" !!}>{{ $model }}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>
</div>