<div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Navigation:</strong>
            <select class="form-control" id="navigation" name="navigation">
                <option value="">Select Navigation</option>
                @foreach($navigations as $nav)
                <option value="{{ $nav->uuid }}">{{ $nav->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Sub Navigation:</strong>
            <select class="form-control" name="sub_navigation" id="sub_navigation">
            </select>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Permission Name:</strong>
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Route Name:</strong>
            {!! Form::text('route', null, array('class' => 'form-control')) !!}
        </div>
    </div>