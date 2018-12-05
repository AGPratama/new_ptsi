<div class='form-group form-datepicker {{$header_group_class}} {{ ($errors->first($name_column))?"has-error":"" }}' id='form-group-{{$name_column}}'
     style="{{@$col['style']}}">
    
    <div class="{{$col_width?:'col-sm-10'}}">
        <div class="input-group">
            <span class="input-group-addon open-datetimepicker"><a><i class='fa fa-calendar '></i></a></span>
            <input type='text' title="{{$col['label']}}" readonly
                   {{$required}} {{$readonly}} {!!$placeholder!!} {{$disabled}} class='form-control notfocus input_date' name="{{$name_column}}" id="{{$name_column}}"
                   value='{{$value}}'/>
        </div>
        <div class="text-danger">{!! $errors->first($name_column)?"<i class='fa fa-info-circle'></i> ".$errors->first($name_column):"" !!}</div>
        <p class='help-block'>{{ @$col['help'] }}</p>
    </div>
</div>
