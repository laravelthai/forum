@extends('layouts.app')

@section('title', 'All Threads')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 thread-index">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">All Threads</h5>
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
        </div>
    </div>
@endsection