@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Show Post</h4>
                    <a href="{{ route('frontend.index') }}" class="btn btn-secondary">Back</a>
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
                            <h3><b>Post Created Date:</b> {{ $post->created_at->format('Y-m-d') }} | {{ $post->created_at->format('h:i A') }}</h3>
                            <h3><b>Post Created Date:</b> {{ $post->updated_at->format('Y-m-d') }} | {{ $post->updated_at->format('h:i A') }}</h3>
                        </div>
                    </div>

                    <!-- Posts Comments  -->
                    <hr>
                    <h3>Comments:-</h3>
                    <div class="add-comment">
                        @if( auth()->check() )
                            <form action="{{ route('frontend.comments.store') }}" method="POST">
                                {{ csrf_field() }}
                                
                                <input type="hidden" name="post_id" value="{{ $post->id }}">

                                <textarea name="comment" id="comment" rows="5" required class="form-control"></textarea>
                                <button type="submit" class="btn btn-warning mt-2">Add Comment</button>

                            </form>
                        @else
                            <div class="alert alert-danger"><a href="{{ route('login') }}">Login</a> First</div>
                        @endif
                    </div>
                    <div class="comments">
                        <hr>
                        <h3>All Comments</h3>
                        <div class="comments">
                            @foreach($post->comments as $comment)
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="image text-center">
                                            <img style="width:50%" src="{{ asset($comment->post->image) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <p>
                                            <span><b>Date:</b> {{ $comment->created_at->format('Y-m-d h:i A') }} </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span><b>By:</b> {{ $comment->user->name }} </span>
                                        </p>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>


                </div>
                
                
                

            </div>
            
        </div>
    </div>
</div>
@endsection
