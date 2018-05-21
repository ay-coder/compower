<div class="box-body">
    <div class="form-group">
        {{ Form::label('category_id', 'Select Category:', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
             {{ Form::select('category_id', $categoryRepository->getSelectOptions('id', 'title') , null, ['class' => '  form-control', 'required']) }}
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
        {{ Form::label('model', 'Model :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'Model', 'required' => 'required']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('qty', 'Qty :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::number('qty', null, ['min' => 0, 'step' => 1, 'class' => 'form-control', 'placeholder' => 'Qty']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('price', 'Price :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::number('price', null, ['min' => 0, 'step' => 0.1, 'class' => 'form-control', 'placeholder' => 'Price', 'required' => 'required']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('stock', 'Stock :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::number('stock', null, ['min' => 0, 'step' => 1, 'class' => 'form-control', 'placeholder' => 'Stock', 'required' => 'required']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('description', 'Description :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('features', 'Features :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::textarea('features', null, ['class' => 'form-control', 'placeholder' => 'Features']) }}
        </div>
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        {{ Form::label('specifications', 'Specifications :', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::textarea('specifications', null, ['class' => 'form-control', 'placeholder' => 'Specifications']) }}
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Product Charts</div>
    <div class="panel-body">

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('chart_1', 'Chart 1 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-6">
                    {{ Form::file('chart_1', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4 text-center">
                    
                    @if(isset($item->chart_1))
                        {{ Html::image('/uploads/charts/'.$item->chart_1, 'Image', ['width' => 150, 'height' => 150]) }}
                    @endif
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('chart_2', 'Chart 2 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-6">
                    {{ Form::file('chart_2', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4 text-center">
                    
                    @if(isset($item->chart_2))
                        {{ Html::image('/uploads/charts/'.$item->chart_2, 'Image', ['width' => 150, 'height' => 150]) }}
                    @endif
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('chart_3', 'Chart 3 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-6">
                    {{ Form::file('chart_3', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4 text-center">
                    
                    @if(isset($item->chart_3))
                        {{ Html::image('/uploads/charts/'.$item->chart_3, 'Image', ['width' => 150, 'height' => 150]) }}
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Product PDFs</div>
    <div class="panel-body">

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('pdf_title_1', 'Pdf Title 1 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::text('pdf_title_1', null, ['class' => 'form-control', 'placeholder' => 'Pdf Title 1', 'required' => 'required']) }}
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('pdf_1', 'PDF 1 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-6">
                    {{ Form::file('pdf_1', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4 text-center">
                    @if(isset($item->pdf_1))
                        <a target="_blank" href="{{ url('/uploads/pdf/'.$item->pdf_1) }}">
                            <i class="fa fa-download" style="font-size:48px;"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('pdf_title_2', 'Pdf Title 2 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::text('pdf_title_2', null, ['class' => 'form-control', 'placeholder' => 'Pdf Title 2']) }}
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('pdf_2', 'PDF 2 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-6">
                    {{ Form::file('pdf_2', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4 text-center">
                    
                    @if(isset($item->pdf_2))
                        <a target="_blank" href="{{ url('/uploads/pdf/'.$item->pdf_2) }}">
                            <i class="fa fa-download" style="font-size:48px;"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('pdf_title_3', 'Pdf Title 3 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::text('pdf_title_3', null, ['class' => 'form-control', 'placeholder' => 'Pdf Title 3']) }}
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('pdf_3', 'PDF 3 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-6">
                    {{ Form::file('pdf_3', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4 text-center">
                    
                    @if(isset($item->pdf_3))
                        <a target="_blank" href="{{ url('/uploads/pdf/'.$item->pdf_3) }}">
                            <i class="fa fa-download" style="font-size:48px;"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Product Images</div>
    <div class="panel-body">
    
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('image_1', 'Image 1 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-6">
                    {{ Form::file('image_1', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4 text-center">
                    
                    @if(isset($item->image_1))
                        {{ Html::image('/uploads/products/'.$item->image_1, 'Image', ['width' => 150, 'height' => 150]) }}
                    @endif
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('image_2', 'Image 2:', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-6">
                    {{ Form::file('image_2', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4 text-center">
                    
                    @if(isset($item->image_2))
                        {{ Html::image('/uploads/products/'.$item->image_2, 'Image', ['width' => 150, 'height' => 150]) }}
                    @endif
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('image_3', 'Image 3 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-6">
                    {{ Form::file('image_3', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4 text-center">
                    
                    @if(isset($item->image_3))
                        {{ Html::image('/uploads/products/'.$item->image_3, 'Image', ['width' => 150, 'height' => 150]) }}
                    @endif
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('image_4', 'Image 4 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-6">
                    {{ Form::file('image_4', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4 text-center">
                    
                    @if(isset($item->image_4))
                        {{ Html::image('/uploads/products/'.$item->image_4, 'Image', ['width' => 150, 'height' => 150]) }}
                    @endif
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('image_5', 'Image 5 :', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-6">
                    {{ Form::file('image_5', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-lg-4 text-center">
                    
                    @if(isset($item->image_5))
                        {{ Html::image('/uploads/products/'.$item->image_5, 'Image', ['width' => 150, 'height' => 150]) }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


