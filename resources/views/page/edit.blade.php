@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-md-8">
            <h4 class="text-center pb-5"> <b>EDIT PAGE:</b> {{$page->title}} </h4>

        {!! Form::open(['action' => ['PageController@update', $page->id ], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
          @csrf

        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $page->title, ['class'=>'form-control', 'placeholder'=>'Tutorial title..'])}}
        </div>

        <div class="form-group">
            {{Form::label('content', 'Content')}}
            {{Form::textarea('content', $page->content, ['class'=>'form-control', 'placeholder'=>'Content..'])}}
        </div>

        <div class="form-group">
            {{Form::file('name')}}
        </div>

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

       {!! Form::close() !!}
          </div>
      </div>
    </div>
@endsection
