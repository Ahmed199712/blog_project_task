@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Comments</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Comment</th>
                                    <th>Post</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $index => $comment)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $comment->comment }}</td>
                                        <td>{{ $comment->post->title }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>
                                            {{ $comment->created_at->format('Y-m-d') }} <br>
                                            {{ $comment->created_at->format('h:i A') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('comments.show' , $comment->id) }}" class="btn btn-info">Show</a>
                                            <form action="{{ route('comments.destroy' , $comment->id) }}" method="POST" style="display:inline">
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
