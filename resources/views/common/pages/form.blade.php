<div class="box-body">
    <div class="form-group">
        {{ Form::label('data_key', 'Identity :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('data_key', null, ['class' => 'form-control', 'placeholder' => 'Identity', 'required' => 'required']) }}
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
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('slug', 'Slug :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug', 'required' => 'required']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('meta_title', 'Meta Title :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => 'Meta Title', 'required' => 'required']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('meta_description', 'Meta Description :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::textarea('meta_description', null, ['class' => 'form-control', 'placeholder' => 'Meta Description']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('short_description', 'Short Description :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::textarea('short_description', null, ['class' => 'form-control tiny-mce', 'placeholder' => 'Short Description']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('full_description', 'Full Description :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::textarea('full_description', null, ['class' => 'form-control tiny-mce', 'placeholder' => 'Full Description']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('icon', 'Font Icon :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('icon', null, ['class' => 'form-control', 'placeholder' => 'Icon']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('image', 'Image :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-4">
            {{ Form::file('image', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>

        <div class="col-lg-4 text-center">
                    
            @if(isset($item->image))
                {{ Html::image('/uploads/pages/'.$item->image, $item->title, ['width' => 150, 'height' => 150]) }}
            @endif
        </div>
    </div>
</div>


<div class="box-body">
    <div class="form-group">
        {{ Form::label('status', 'Status :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>
</div>
