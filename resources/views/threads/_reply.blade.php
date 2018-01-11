<reply :attributes="{{ $reply }}" inline-template v-cloak>
    <li id="reply-{{ $reply->id }}" class="list-group-item" @mouseover="activeMenu = true" @mouseleave="activeMenu = false">
        <div class="media">
            <img class="avatar rounded-circle mr-3" src="https://i.imgur.com/1fgOYH3.jpg" alt="{{ $reply->owner->name }}">
            <div class="media-body">
                <a href="{{ route('profile', $reply->owner) }}" title="{{ $reply->owner->name }}">
                    {{ $reply->owner->name }}
                </a>
                <span> • </span>
                <span class="meta" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>
                <span class="meta pull-right" v-show="activeMenu">
                    @can ('update', $reply)
                        <button class="btn btn-link btn-sm" @click="editing = !editing">Edit</button>
                    @endcan
                    @can ('delete', $reply)
                        <button class="btn btn-link btn-sm" @click="destroy">Delete</button>
                    @endcan
                </span>
                <div class="reply-body mt-1">
                    <div v-if="editing">
                        <div class="form-group">
                            <textarea class="form-control" v-model="body"></textarea>
                        </div>
                        <button class="btn btn-sm btn-primary" @click="update">Update</button>
                        <button class="btn btn-sm btn-link" @click="editing = false">Cancel</button>
                    </div>
                    <div v-else v-text="body"></div>
                </div>
            </div>
        </div>
    </li>
</reply>
