
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'الإسم:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::  submit(__('Buttons.Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.productCategories.index') }}" class="btn btn-default">{{ __('Buttons.Cancel') }}</a>
</div>
