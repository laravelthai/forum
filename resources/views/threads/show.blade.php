@extends('layouts.app')

@section('title', $thread->title)

@section('content')
    <thread-view :thread="{{ $thread }}" inline-template>
        <div class="container">
            <div class="row">
                <div class="col-md-9 main-content thread-show">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h1 class="thread-title">{{ $thread->title }}</h1>
                            <div class="meta">
                                <i class="fa fa-folder" aria-hidden="true"></i>
                                <a href="{{ route('profile', $thread->creator) }}">
                                    {{ $thread->creator->name }}
                                </a>
                                {{ $thread->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $thread->body }}
                        </div>
                    </div>

                    <replies :replies-count="repliesCount" @added="repliesCount++" @removed="repliesCount--"></replies>
                </div>
            </div>
        </div>
    </thread-view>
@endsection