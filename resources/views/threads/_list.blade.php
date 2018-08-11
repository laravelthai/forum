@forelse ($threads as $thread)
<li class="list-group-item">
    <div class="media">
        <a href="{{ route('profile', $thread->creator->id) }}">
            <img class="pull-left rounded-circle mt-1 mr-2" width="32" src="{{ $thread->creator->avatar_path }}" alt="">
        </a>
        <div class="media-body">
            <a class="text-dark" href="{{ $thread->path() }}">
                @if ($thread->hasUpdatesFor(auth()->user()))
                <strong>{{ $thread->title }}</strong>
                @else
                {{ $thread->title }}
                @endif
            </a>
            <p class="text-xs-muted mb-0">{{ $thread->creator->name }} started {{ $thread->created_at->diffForHumans() }}</p>
        </div>
    </div>
</li>
@empty
<li class="list-group-item text-center">
    There are no relevant results at this time.
</li>
@endforelse
