<!-- Productcategoryid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ProductCategoryID', __('Models/Product.ProductCategoryID')) !!}
    {!! Form::select('ProductCategoryID',$categories, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', __('Models/Product.Name')) !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::  submit(__('Buttons.Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.productSubCategories.index') }}" class="btn btn-default">{{ __('Buttons.Cancel') }}</a>
</div>
