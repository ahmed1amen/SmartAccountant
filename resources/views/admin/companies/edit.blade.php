@extends('adminlte::page')
@section('title', 'الشركات')

@section('content_header')
    <h1>
        {{__("General.Titles.Companies")}}
    </h1>
@stop

@section('content')


    <div class="row justify-content-center">
        @include('adminlte-templates::common.errors')
        <div class="card box-primary col-12">
            <div class="card-header text-right">
                <h3 class="card-title">{{__("General.Edit")}}</h3>

            </div>
            <div class="card-body">

                {!! Form::model($company, ['route' => ['admin.companies.update', $company->id], 'method' => 'patch']) !!}

                @include('admin.companies.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection
