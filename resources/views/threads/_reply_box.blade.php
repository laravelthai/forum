<div class="reply-box">
    <form action="{{ $thread->path() . '/replies' }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <textarea class="form-control" rows="3" placeholder="Have something to say?" name="body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share"></i> Post</button>
    </form>
</div>
<hr>