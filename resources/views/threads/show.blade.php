@extends('layouts.app')

@section('title', $thread->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 thread-show">
                <div class="card mb-3">
                    <div class="card-header">
                        <h1 class="thread-title">{{ $thread->title }}</h1>
                        <div class="meta">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            {{ $thread->creator->name }}
                            {{ $thread->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
                <div class="reply-list card mb-3">
                    <div class="card-header">
                        Reply
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group">
                            @foreach ($replies as $key => $reply)
                                @include ('threads._reply')
                            @endforeach
                        </ul>
                    </div>
                </div>
                @if (auth()->check())
                    @include('threads._reply_box')
                @else
                    <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p>
                @endif
            </div>
        </div>
    </div>
@endsection