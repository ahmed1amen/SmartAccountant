@extends('adminlte::page')
@section('title', 'موظفى الفروع')

@section('content_header')
        <h1>{{__('General.Titles.Employees')}}</h1>
@stop

@section('content')
       <div class="row justify-content-center">

        {{-- Cards --}}
        <div class="card col-11">
            <div class="card-header">
                <h3 class="card-title">{{__('General.All')}}</h3>
            </div>
            <div class="card-body card-body table-responsive p-0">
                @include('flash::message')
                @include('admin.employees.table')

                <div class="text-center">

                </div>
            </div>
        </div>
    </div>


@endsection



