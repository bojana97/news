@extends('layouts.app')

@section('content')
    <div class="container">
    <h2><b>EDIT PAGE:</b> {{$page->title}}</h2>
    {!! Form::open(['action' => ['PageController@update', $page->id ], 'method' => 'POST']) !!}
        @csrf
        <div class="form-group">
            {{Form::label('User', 'User')}}
            {{Form::text('user_id', $page->user_id, ['class'=>'form-control', 'placeholder'=>'User..'])}}
        </div>

        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $page->title, ['class'=>'form-control', 'placeholder'=>'Tutorial title..'])}}
        </div>

        <div class="form-group">
            {{Form::label('created_at', 'Created at')}}
            {{Form::text('created_at', $page->created_at, ['class'=>'form-control', 'placeholder'=>'Created at..'])}}
        </div>

        <div class="form-group">
            {{Form::label('content', 'Content')}}
            {{Form::textarea('content', $page->content, ['class'=>'form-control', 'placeholder'=>'Content..'])}}
        </div>

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}
    </div>
@endsection
