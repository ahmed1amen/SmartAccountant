
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', __('Models/Marketplace.Name')) !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Country', __('Models/Marketplace.Country')) !!}
    {!! Form::text('Country', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('City', __('Models/Marketplace.City')) !!}
    {!! Form::text('City', null, ['class' => 'form-control']) !!}
</div>

<!-- Supervisorphonenumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SupervisorPhoneNumber', __('Models/Marketplace.SupervisorPhoneNumber')) !!}
    {!! Form::text('SupervisorPhoneNumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Address', __('Models/Marketplace.Address')) !!}
    {!! Form::text('Address', null, ['class' => 'form-control']) !!}
</div>

<!-- Taxnumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TaxNumber', __('Models/Marketplace.TaxNumber')) !!}
    {!! Form::text('TaxNumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Email', __('Models/Marketplace.Email')) !!}
    {!! Form::email('Email', null, ['class' => 'form-control']) !!}
</div>



<!-- Safebalance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SafeBalance', __('Models/Marketplace.SafeBalance')) !!}
    {!! Form::number('SafeBalance', null, ['class' => 'form-control']) !!}
</div>

<!-- Companyregisterimage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('CompanyRegisterImage', __('Models/Marketplace.CompanyRegisterImage')) !!}
    {!! Form::file('CompanyRegisterImage', ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('Attachment', __('Models/Marketplace.Attachment')) !!}
    {!! Form::file('Attachment', ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('CommercialRegister', __('Models/Marketplace.CommercialRegister'))  !!}
    {!! Form::file('CommercialRegister', ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('LeaseContract', __('Models/Marketplace.LeaseContract')) !!}
    {!! Form::file('LeaseContract', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::  submit(__('Buttons.Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.marketplaces.index') }}" class="btn btn-default"> {{ __('Buttons.Cancel') }}</a>
</div>
