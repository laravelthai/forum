<li id="reply-{{ $reply->id }}" class="list-group-item">
    <div class="media">
        <img class="avatar rounded-circle mr-3" src="https://i.imgur.com/1fgOYH3.jpg" alt="{{ $reply->owner->name }}">
        <div class="media-body">
            <a href="#" title="{{ $reply->owner->name }}">
                {{ $reply->owner->name }}
            </a>
            <span> • </span>
            <span class="meta" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>
            <div class="reply-body mt-1">
                {!! $reply->body !!}
            </div>
        </div>
    </div>
</li>
