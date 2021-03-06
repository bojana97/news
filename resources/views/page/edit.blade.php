@extends('layouts.app')

@section('js')
<script>
    $(document).ready(function () {
        $('#categories').select2({
            tags: true
        });
    });
</script>

@endsection


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
            {{Form::label('category', 'Categories')}}
            {{Form::select('category[]', $categories, old('category') ? old('category') : $page->categories->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple'=>'multiple', 'id'=>'categories' ])}}
        </div>

        <div class="form-group">
            {{Form::label('content', 'Content')}}
            {{Form::textarea('content', $page->content, ['id'=>'content-textarea', 'class'=>'form-control', 'placeholder'=>'Content..'])}}
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
