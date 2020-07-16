@extends('layouts.app')

@section('content')

    <div class="container">
        <h2> {{ $page->title }} </h2>
        <p style="color:grey"> {{ $page->created_at }} </p>
        <p> {{ $page->content }} </p>
        <hr>

        <a href="/page/{{$page->id}}/edit" class="btn btn-primary" > Edit </a>

        {!!Form::open(['action' => ['PageController@destroy', $page->id], 'method'=> 'POST'])!!}
            {{ Form::hidden('_method', 'DELETE' )}}
            {{Form::submit ('Delete', ['class' => 'btn btn-danger'] )}}
        {!!Form::close()!!}
    </div>
@endsection
