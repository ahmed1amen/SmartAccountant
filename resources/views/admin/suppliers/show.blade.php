@extends('adminlte::page')
@section('title', 'Suppliers')

@section('content_header')
    <h1>Suppliers</h1>
@stop



@section('content')

    <div class="row justify-content-center">



        <div class="card card-primary col-12">
            <div class="card-header">
                <h3 class="card-title">Suppliers</h3>
            </div>


            <div class="card-body">

                <form >
                    @include('admin.suppliers.show_fields')
                    <a href="{{ route('admin.suppliers.index') }}" class="btn btn-warning"><i class="fas fa-backward" style="cursor: pointer;"></i>Back</a>
                </form>


            </div>



        </div>



    </div>
@endsection
