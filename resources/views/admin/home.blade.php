@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        {{ __('You are logged in!') }}
                    </div>
                        <a class="btn btn-light" href="{{ route('admin.posts.index') }}">All Posts</a>
                        <a class="btn btn-light" href="{{ route('admin.posts.create') }}">New Post</a>
                    {{-- <a href="{{ route(admin.post.create) }}">Create a post</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection