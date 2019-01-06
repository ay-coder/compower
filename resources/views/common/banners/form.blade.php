<div class="box-body">
    <div class="form-group">
        {{ Form::label('category_id', 'Title :', ['class' => 'col-lg-2 control-label']) }}
        
        <div class="col-lg-10">
            {{ Form::select('category_id', ['' => 'Please Select Category'] + $categories, null, ['class' => 'form-control',  'required' => 'required']) }}
            <em>(Size : 1600 343)</em>
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
        {{ Form::label('image', 'Image :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-6">
            {{ Form::file('image', null, ['class' => 'form-control']) }}
        </div>

        <div class="col-lg-4 text-center">
                    
            @if(isset($item->image))
                {{ Html::image('/uploads/banner/'.$item->image, $item->title, ['width' => 150, 'height' => 150]) }}
            @endif
        </div>
    </div>
</div>