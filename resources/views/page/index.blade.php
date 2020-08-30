@extends('layouts.app')

@section('content')
<div class="container pages" style="overflow-wrap: break-word; word-wrap:break-word;">
        @if(count($pages)>0)
		        @foreach($pages as $page)
                    <div class="row">

                        <!---- Image ---->
                        <div class="col-lg-5">
                            @foreach($page->files as $file)
                                  <img src="/storage/images/{{$file->name}}" style="width:100%; height:100%;" />
                            @endforeach
                        </div>


                        <div class="col-lg-7">
                            <h2 class="my-2"> <a href="{{route('page.show', $page)}}"> {{ $page->title }} </a> </h2>
                            <p class="page-date"> Posted on {{ $page->created_at->format('d F Y  h:m') }}  by {{$page->user->username}} </p>

                                <!-- Categories -->
                                @foreach($page->categories as $category)
                                     <a href="{{url('category', $category)}}" class="btn btn-outline-info page-category"> {{ucfirst($category->category).' '}} </a>
                                @endforeach

                            <p> {!! Str::of($page->content)->limit(350) !!} </p>
                        </div>
                    </div>
                <hr />
                @endforeach
	      @else
             <p class="text-center"> No news yet. </p>
          @endif

    <div class="row justify-content-center my-4">   {{ $pages->links() }}   </div>
</div>

@endsection
