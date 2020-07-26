@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
            <h4 class="text-center pb-5"> Create new page </h4>

             {!! Form::open(['action' => ['PageController@store'], 'method' => 'POST', 'enctype'=>'multipart/form-data'])!!}
                @csrf

                <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => '']) }}
                </div>

                <div class="form-group">
                    {{Form::label('content', 'Content')}}
                    {{Form::textarea('content', '', ['class'=>'form-control', 'placeholder'=>''])}}
                </div>

                <div class="form-group">
                    {{Form::file('name')}}
                </div>

                {{Form::submit('Save', ['class' => 'btn btn-primary'])}}

             {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
