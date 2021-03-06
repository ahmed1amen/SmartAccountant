@extends('adminlte::page')
@section('title', 'المتاجر')

@section('content_header')
        <h1>{{__("menu.Marketplaces")}}</h1>
@stop

@section('content')
       <div class="row justify-content-center">

        {{-- Cards --}}
        <div class="card col-11">
            <div class="card-header">
                <h3 class="card-title">{{__("General.All")}}</h3>
            </div>
            <div class="card-body card-body table-responsive p-0">
                @include('flash::message')
               @include('admin.marketplaces.table')

                <div class="text-center">

                </div>
            </div>
        </div>
    </div>


@endsection

