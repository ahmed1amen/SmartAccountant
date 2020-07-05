<!-- Userid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('UserID', 'Userid:') !!}
    {!! Form::number('UserID', null, ['class' => 'form-control']) !!}
</div>

<!-- Marketplacesid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('MarketplacesID', 'Marketplacesid:') !!}
    {!! Form::number('MarketplacesID', null, ['class' => 'form-control']) !!}
</div>

<!-- Productcategoryid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ProductCategoryID', 'Productcategoryid:') !!}
    {!! Form::number('ProductCategoryID', null, ['class' => 'form-control']) !!}
</div>

<!-- Productsubcategoryid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ProductSubCategoryID', 'Productsubcategoryid:') !!}
    {!! Form::number('ProductSubCategoryID', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Quantity', 'Quantity:') !!}
    {!! Form::number('Quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantitytypeid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('QuantityTypeID', 'Quantitytypeid:') !!}
    {!! Form::number('QuantityTypeID', null, ['class' => 'form-control']) !!}
</div>

<!-- Purchasingprice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PurchasingPrice', 'Purchasingprice:') !!}
    {!! Form::number('PurchasingPrice', null, ['class' => 'form-control']) !!}
</div>

<!-- Sellingprice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SellingPrice', 'Sellingprice:') !!}
    {!! Form::number('SellingPrice', null, ['class' => 'form-control']) !!}
</div>

<!-- Lowprice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('LowPrice', 'Lowprice:') !!}
    {!! Form::number('LowPrice', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Image', 'Image:') !!}
    {!! Form::text('Image', null, ['class' => 'form-control']) !!}
</div>

<!-- Expirydate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ExpiryDate', 'Expirydate:') !!}
    {!! Form::text('ExpiryDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Barcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Barcode', 'Barcode:') !!}
    {!! Form::text('Barcode', null, ['class' => 'form-control']) !!}
</div>

<!-- Unlimitedquantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('UnlimitedQuantity', 'Unlimitedquantity:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('UnlimitedQuantity', 0) !!}
        {!! Form::checkbox('UnlimitedQuantity', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.products.index') }}" class="btn btn-default">Cancel</a>
</div>