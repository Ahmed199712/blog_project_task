@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Show Post</h4>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image">
                                <img style="width:100%" src="{{ asset($post->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3><b>Post Title:</b> {{ $post->title }}</h3>
                            <h3><b>Post Content:</b> {{ $post->content }}</h3>
                            <h3><b>Post Author:</b> {{ $post->user->name }}</h3>
                            <h3><b>Comments:</b> {{ $post->comments->count() }}</h3>
                            <h3><b>Post Created Date:</b> {{ $post->created_at->format('Y-m-d') }} | {{ $post->created_at->format('h:i A') }}</h3>
                            <h3><b>Post Created Date:</b> {{ $post->updated_at->format('Y-m-d') }} | {{ $post->updated_at->format('h:i A') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
