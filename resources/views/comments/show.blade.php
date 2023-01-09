@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Show Comment</h4>
                    <a href="{{ route('comments.index') }}" class="btn btn-secondary">Back</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image">
                                <img style="width:100%" src="{{ asset($comment->post->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3><b>Comment :</b> {{ $comment->comment }}</h3>
                            <h3><b>Post:</b> {{ $comment->post->title }}</h3>
                            <h3><b>Commented By:</b> {{ $comment->user->name }}</h3>
                            <h3><b>Created Date:</b> {{ $comment->created_at->format('Y-m-d') }} | {{ $comment->created_at->format('h:i A') }}</h3>
                            <h3><b>Updated Date:</b> {{ $comment->updated_at->format('Y-m-d') }} | {{ $comment->updated_at->format('h:i A') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
