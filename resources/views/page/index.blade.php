@extends('layouts.app')

@section('content')

    @foreach($pages as $page)
        <div class="container">

           <h2><a href="{{route('page.show', $page)}}"> {{ $page->title }} </a></h2>

          <hr>
        </div>
    @endforeach

@endsection
