@extends('adminlte::page')
@section('title', 'موظفى الإدارة')
@section('content_header')
        <h1>
            {{__("menu.Supervisors")}}
        </h1>
@stop
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="card box-primary">
        <div class="card-header">
                    <h3 class="card-title">
                        {{__('General.Create')}}
                    </h3>
                </div>
            <div class="card-body" style="padding: 20px !important;">
                    {!! Form::open(['route' => 'admin.supervisors.store']) !!}
                        @include('admin.supervisors.fields')
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
