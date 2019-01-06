<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Name :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => 'required']) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('company', 'Company :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('company', null, ['class' => 'form-control', 'placeholder' => 'Company', 'required' => 'required']) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('email', 'Email :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required']) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('location', 'Location :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location', 'required' => 'required']) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('rate', 'Rate :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::select('rate', [
                'Good'          => 'Good!',
                'Average'       => 'Average',
                'Not so Good'   => 'Not so Good',
                'Bad'           => 'Bad!',
                'Really Bad'    => 'Really Bad'
            ], null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>
</div><div class="box-body">
    <div class="form-group">
        {{ Form::label('description', 'Description :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::textarea('description', null, ["rows" => 4, "cols" => 40, 'class' => 'form-control', 'placeholder' => 'Description', 'required' => 'required']) }}
        </div>
    </div>
</div>