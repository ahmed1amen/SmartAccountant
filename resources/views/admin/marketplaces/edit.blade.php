@extends('adminlte::page')
@section('title', ' المتاجر')

@section('content_header')
     <h1>
            {{__("menu.Marketplaces")}}
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

                   {!! Form::model($marketplace, ['route' => ['admin.marketplaces.update', $marketplace->id], 'method' => 'patch']) !!}

                        @include('admin.marketplaces.fields')

                   {!! Form::close() !!}

           </div>
       </div>
   </div>
@endsection
