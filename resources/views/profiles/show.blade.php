@extends('layouts.app')

@section('title', $profileUser->name)

@section('content')
    <div class="profile-card py-3">
        <div class="container">
            <div class="media text-center text-sm-left">
                <div class="media-body">
                    <img class="img-thumbnail rounded-circle mr-sm-3 float-sm-left" src="https://i.imgur.com/1fgOYH3.jpg">
                    <h2>{{ $profileUser->name }}</h2>
                    <ul class="user-info list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-clock-o "></i> 44 minutes ago
                        </li>
                        <li class="list-inline-item">Joined {{ $profileUser->created_at->diffForHumans() }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="sidebar col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
                <div class="card">
                    <div class="card-body">
                        5
                    </div>
                </div>
            </div>

            <div class="main-content col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thread</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group">
                            @foreach ($threads as $thread)
                                <li class="list-group-item">
                                    <a href="{{ url($thread->path()) }}">
                                        {{ $thread->title }}
                                    </a>
                                    <span class="meta pull-right">
                                        {{ $thread->created_at->diffForHumans() }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{ $threads->links() }}
    </div>
@endsection