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
                        @include ('threads._list')
                    </ul>
                </div>
                {{ $threads->render() }}
            </div>
            <div class="sidebar col-md-3">
                @include('threads._sidebar')
            </div>
        </div>
    </div>
@endsection
