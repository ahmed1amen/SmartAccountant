<!-- Expensescategoryid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ExpensesCategoryID', 'Expensescategoryid:') !!}
    {!! Form::number('ExpensesCategoryID', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.expensesSubCategories.index') }}" class="btn btn-default">Cancel</a>
</div>
