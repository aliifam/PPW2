@if($comments)
    @foreach($comments as $comment)
        <div class="mr-4">
            <srong>{{ $comment->user->name }}</strong>
            <p>{{ $comment->body }}</p>
            <a href="" id="reply"></a>
            <form method="post" action="{{ route('reply.store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="body" class="form-control" />
                    <input type="hidden" name="post_id" value="{{ $post_id }}" />
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Reply" />
                </div>
            </form>
            @include('partials._comment_replies', ['comments' => $comment->replies])
        </div>
    @endforeach
@endif
