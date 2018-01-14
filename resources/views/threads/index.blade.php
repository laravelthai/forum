@extends('layouts.app')

@section('title', 'All Threads')

@section('content')
    <div class="container">
        <div class="row">
            <div class="main-content col-md-9 mb-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Threads</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse ($threads as $thread)
                        <li class="list-group-item">
                            <div class="media">
                                <a href="{{ route('profile', $thread->creator->id) }}">
                                    <img class="pull-left rounded-circle mt-1 mr-2" width="32"
                                         src="{{ $thread->creator->avatar_path }}" alt="">
                                </a>
                                <div class="media-body">
                                    <a class="text-dark" href="{{ $thread->path() }}">
                                        {{ $thread->title }}
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
                    </ul>
                </div>
                {{ $threads->links() }}
            </div>
            <div class="sidebar col-md-3">
                @include('threads._sidebar')
            </div>
        </div>
    </div>
@endsection