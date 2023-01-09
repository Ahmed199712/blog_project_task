@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Posts</div>

                <div class="card-body">
                    
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-4">
                                <div class="card text-center mb-5">
                                    <div class="card-image">
                                        <img style="width:100%" src="{{ asset($post->image) }}" alt="">
                                    </div>
                                    <div class="card-body">
                                        <h4 style="margin:0">{{ $post->title }}</h4>
                                        <p>{{ str_limit($post->content,20) }}</p>
                                        <div class="bottom" style="display:flex;flex-direction:column">
                                            <span><b>Date:</b> {{ $post->created_at->format('Y-m-d h:i A') }}</span>
                                            <span><b>Comments:</b> {{ $post->comments->count() }}</span>
                                            <span><b>By:</b> {{ $post->user->name }}</span>
                                        </div>
                                        <a href="{{ route('frontend.posts.show' , $post->id) }}" class="btn btn-info">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
