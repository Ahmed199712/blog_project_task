@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Posts</h4>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Post Title</th>
                                    <th>Post Author</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $index => $post)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <img style="width:40px" src="{{ asset($post->image) }}" alt="">
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->comments->count() }}</td>
                                        <td>
                                            {{ $post->created_at->format('Y-m-d') }} <br>
                                            {{ $post->created_at->format('h:i A') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('posts.show' , $post->id) }}" class="btn btn-info">Show</a>
                                            <a href="{{ route('posts.edit' , $post->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('posts.destroy' , $post->id) }}" method="POST" style="display:inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button title="{{ trans('backend.edit') }} {{ trans('backend.record') }}" type="submit"  class="btn btn-danger delete" style="cursor:pointer">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
