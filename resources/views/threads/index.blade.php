@extends('layouts.app')

@section('title', 'All Threads')

@section('content')
    <div class="container">
        <div class="row">
            <div class="main-content col-md-9 mb-3 mb-md-0">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Threads</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group thread-list">
                        @foreach ($threads as $thread)
                            <li class="list-group-item">
                                <a href="{{ $thread->path() }}">
                                    {{ $thread->title }}
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="sidebar col-md-3">
                @include('threads._sidebar')
            </div>
        </div>
    </div>
@endsection