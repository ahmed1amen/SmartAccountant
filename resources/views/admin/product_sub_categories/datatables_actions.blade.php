{!! Form::open(['route' => ['admin.productSubCategories.destroy', $id ], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.productSubCategories.show', $id ) }}" class='btn btn-warning btn-sm p-1'>
        <i class="fas fa-2x fa-eye"></i>
    </a>
    <a href="{{ route('admin.productSubCategories.edit', $id ) }}" class='btn btn-primary btn-sm p-1'>
        <i class="fas fa-2x fa-edit"></i>
    </a>
    @php
        $ProductSubCategory = \App\Models\ProductSubCategory::find($id)
    @endphp
    <a  class="btn {{$ProductSubCategory->favourite == 1 ? 'btn-success' : 'btn-warning'}}" href="{{ route('admin.productSubCategories.favourites', [$id, $ProductSubCategory->favourite == 1 ? 0 : 1]) }}">
        <i class="fa {{$ProductSubCategory->favourite == 1 ? 'fa-toggle-on' : 'fa-toggle-off'}}" ></i>
    </a>
    {!! Form::button('<i class="fas fa-2x fa-trash text-white"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
