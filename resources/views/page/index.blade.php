@extends('layouts.app')

@section('content')
<div class="container">

	@if(count($pages)>0)
		@foreach($pages as $page)
			<div class="row">
                <div class="col-md-5">
                    <!-- Display image (imgs later)  ?? !! --->
                    @foreach($page->files as $file)
                      <img src="/storage/images/{{$file->name}}" style="width:100%;" />
                    @endforeach
                </div>

               <div class="col-md-7">
			        <h2><a href="{{route('page.show', $page)}}"> {{ $page->title }} </a></h2>
                   <p style="color:grey;"> {{ $page->created_at->format('d-m-Y h:m:s') }} </p>
                   <p> {!! Str::limit($page->content, 200) !!} </p>
               </div> 
			</div><hr/>
		@endforeach
	@else
		<p> No news yet. </p>
	@endif
        <div class="row justify-content-center my-4"> {{ $pages->links() }} </div>

</div>
@endsection
