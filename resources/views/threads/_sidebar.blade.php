<a href="{{ url('threads/create') }}" class="btn btn-primary btn-block px-3 mb-3" aria-label="Left Align">
    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> New Thread
</a>
@if (count($trending))
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Trending Threads</h3>
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($trending as $thread)
            <li class="list-group-item">
                <a href="{{ url($thread->path) }}">
                    {{ $thread->title }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endif
<div class="py-3 px-2">
    <ul class="menu-list list-group">
        @foreach ($channels as $channel)
            <li class="list-group-item bg-transparent border-none border-b px-0">
                <a href="/threads/channels/{{ $channel->id }}">
                    <i class="fa fa-circle-o text-primary" aria-hidden="true"></i> {{ $channel->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
