<div class="box-body">
    <div class="form-group">
        {{ Form::label('country_id', 'Country Title :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::select('country_id', ['' => 'Please Select Country'] + $countries, null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('title', 'Title :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title', 'required' => 'required']) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('contact', 'Contact :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('contact', null, ['class' => 'form-control', 'placeholder' => 'Contact', 'required' => 'required']) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('phone', 'Phone :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('fax', 'Fax :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('fax', null, ['class' => 'form-control', 'placeholder' => 'Fax']) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('address_line_one', 'Address Line One :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('address_line_one', null, ['class' => 'form-control', 'placeholder' => 'Address Line One', 'required' => 'required']) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('address_line_two', 'Address Line Two :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('address_line_two', null, ['class' => 'form-control', 'placeholder' => 'Address Line Two']) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('city', 'City :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'City' ]) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('state', 'State :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('state', null, ['class' => 'form-control', 'placeholder' => 'State' ]) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('zip', 'Zip :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('zip', null, ['class' => 'form-control', 'placeholder' => 'Zip' ]) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('country', 'Country :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Country' ]) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('website', 'Website :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'Website' ]) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('email', 'Email :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email' ]) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('skype', 'Skype :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('skype', null, ['class' => 'form-control', 'placeholder' => 'Skype']) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('description', 'Description :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description' ]) }}
        </div>
    </div>
</div>