<div class="col-xs-4 col-sm-4 col-md-4">
    <div class="form-group">
        <strong>Navigation Title:</strong>
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
    <div class="form-group">
        <strong>Fav Icon:</strong>
        {!! Form::text('icon', null, array('class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
    <div class="form-group">
        <strong>Sub Nav:</strong>
        <select name="sub_nav" id="sub_nav" class="form-control" onchange="hiden(value)">
            <option value="1" >Yes</option>
            <option value="0" selected="selected">No</option>
        </select>
    </div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
    <div class="form-group">
        <strong>Is Show?:</strong>
        {!! Form::select('is_show', array('1' => 'Yes', '0' => 'No'), '1', array('class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4" id="route">
    <div class="form-group">
        <strong>Route:</strong>
        {!! Form::text('route', null, array('class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
    <div class="form-group">
        <strong>Status:</strong>
        {!! Form::select('status', array('1' => 'Active', '0' => 'Deactive'), '1', array('class' => 'form-control')) !!}
    </div>
</div>