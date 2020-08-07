@extends('layouts.app')
@section('content')

<div class="category container">
    <div class="row justify-content-start my-4">

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-header">
                    <h5 class="card-title my-1">Categories</h5>
                </div>

                @if(count($categories) > 0)
                  @foreach($categories as $category)
                    <ul class="list-group list-group-flush px-2">
                      <li class="list-group-item">
                         <div class="float-left">
                            {{$category->category}}
                         </div>

                         <div class="float-right">
                            <a href="/category/{{$category->id}}/edit" class="btn btn-sm btn-secondary">Edit</a>

                            {!!Form::open(['action' => ['CategoryController@destroy', $category->id], 'method'=> 'POST', 'style'=>'display:inline;'])!!}
                                {{ Form::hidden('_method', 'DELETE' )}}
                                {{Form::submit ('Delete', ['class' => 'btn btn-sm btn-danger'] )}}
                                {!!Form::close()!!}
                         </div>
                      </li>
                   </ul>
                 @endforeach
               @else
                <p>No categories yet.</p>
               @endif
           </div>
        </div>



        <!-- create new category -->
        <div class="col-md-5 ml-5">
            <div class="category-create-form">
            <h5 class="text-center"> Create new category </h5>

            {!! Form::open(['action' => ['CategoryController@store'], 'method' => 'POST'])!!}
                @csrf

            <div class="form-group">
                    {{ Form::label('', '') }}
                    {{ Form::text('category', '', ['class' => 'form-control', 'placeholder' => 'Category name..']) }}
            </div>

            {{Form::submit('Save', ['class' => 'btn btn-primary my-3'])}}
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>



@endsection
