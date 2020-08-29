<?php $numberOfComments = (count($comments)); ?>

@if(count($comments) > 0)
<p> {{$numberOfComments}} comments</p>
    @foreach($comments as $comment)
        <div class="display-comment" >
          <strong>{{ $comment->user->username }} <small> | {{$comment->created_at}} </small> </strong>
          <p>{{ $comment->comment }}</p>
          <hr />
         </div>
    @endforeach
@else
    <p> No comments yet.</p>
@endif
