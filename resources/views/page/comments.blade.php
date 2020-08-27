<?php $numberOfComments = (count($comments));            ?>

@if(count($comments) > 0)
    @foreach($comments as $comment)
        <div class="display-comment" >
          <strong>{{ $comment->user->username }} <small> | {{$comment->created_at->format('d F Y  h:m')}} </small> </strong>
          <p>{{ $comment->comment }}</p>
          <hr />
         </div>
    @endforeach
@else
    <p> No comments yet.</p>
@endif

<div class="row justify-content-xl-around mb-3 pagination-sm">
    {{ $comments->links() }}
</div>

