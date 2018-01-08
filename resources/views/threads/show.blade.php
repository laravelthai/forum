@extends('layouts.app')

@section('title', $thread->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 thread-show">
                <div class="card">
                    <div class="card-header">
                        <h1 class="thread-title">{{ $thread->title }}</h1>
                        <div class="thread-meta">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            {{ $thread->creator->name }}
                            {{ $thread->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection