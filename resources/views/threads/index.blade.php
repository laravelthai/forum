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
                            <a href="{{ $thread->path() }}">
                                {{ $thread->title }}
                            </a>
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