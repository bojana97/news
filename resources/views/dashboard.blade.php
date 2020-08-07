@extends('layouts.app')

@section('content')
<div class="container">
    
    <a href="/categories" class="btn btn-outline-primary">Categories</a>

    <!-- Create new page link -->
    <a class="btn btn-outline-success" href="/page/create"> New page </a>

    @if(count($userPages) > 0)
    <table class="table table-hover table-bordered mt-4">
        <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th class="text-center" scope="col"> Title </th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>

        @foreach($userPages as $i => $userPage)
            <tr> <!--- ?? !! -->
                <th scope="row">{{ $i+1 }}</th>
                <td><h5>{{ $userPage->title }}</h5> </td>

                <td class="text-center">
                    <a href="/page/{{$userPage->id}}" class="btn btn-sm btn-primary">Show</a>
                    <a href="/page/{{$userPage->id}}/edit" class="btn btn-sm btn-secondary">Edit</a>

                    {!!Form::open(['action' => ['PageController@destroy', $userPage->id], 'method'=> 'POST', 'style'=>'display:inline;'])!!}
                    {{ Form::hidden('_method', 'DELETE' )}}
                    {{Form::submit ('Delete', ['class' => 'btn btn-sm btn-danger'] )}}
                    {!!Form::close()!!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
         <h4 class="text-center">You have no posts yet.</h4>
    @endif
</div>

@endsection
