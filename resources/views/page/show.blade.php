@extends('layouts.app')
@section('content')

<div class="container">
   <h2> {{ $page->title }} </h2>
   <p style="color:grey;"> {{ $page->created_at->format('d-m-Y  h:m:s') }} by {{$page->user->username}} </p>

    <!-- Check auth, access control-->
    @auth
        @if(Auth()->user()->id == $page->user_id)

         <div class="row">
            <div class="col-md-12">
                <!-- Edit and delete buttons -->
                <a href="/page/{{$page->id}}/edit" class="btn btn-sm btn-primary"> Edit </a>
                {!!Form::open(['action' => ['PageController@destroy', $page->id], 'method'=> 'POST', 'style'=>'display:inline;'])!!}
                    {{ Form::hidden('_method', 'DELETE' )}}
                    {{Form::submit ('Delete', ['class' => 'btn btn-sm btn-danger' ] )}}
                  {!!Form::close()!!}
            </div>
         </div>

        @endif
    @endauth

        <!-- Display image (imgs later) ??? --->
        @foreach($page->files as $file)
           <img style="width:80%;" class="my-3" src="/storage/images/{{$file->name}}" />
        @endforeach

   <p class="py-4"> {!! $page->content !!} </p> <hr>



    <!-------------- Comments section ----------->
    <div class="row">
        <div class="col-md-8">
           <h5 class="pb-3">Comments</h5>

            <!-- display comments-->
            @include('page.comments', ['comments' => $page->comments, 'page_id' => $page->id])

            @if(!Auth::guest())
            {!! Form::open(['action' => ['CommentController@store'], 'method' => 'POST'])!!}
                @csrf

                <div class="form-group">
                    {{Form::textarea('comment', '', ['class'=>'form-control', 'rows' => 3, 'placeholder'=>'Add a comment..'])}}
                    {{ Form::hidden('page_id', $page->id ) }}
                </div>

                {{Form::submit('Comment', ['class' => 'btn btn-primary'])}}
           {!! Form::close() !!}
           @endif

        </div>
    </div>

</div>
@endsection
