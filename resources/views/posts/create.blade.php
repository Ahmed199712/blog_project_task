@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Create Post</h4>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
                </div>

                <div class="card-body">
                    <form  method="POST" action="{{ route('posts.store') }}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <!-- <input type="hidden" name="author" value="{{ auth()->user()->id }}"> -->

                        <div class="form-group">
                            <label for=""><b>Post Title</b></label>
                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for=""><b>Post Content</b></label>
                            <textarea name="content" id="content" rows="5" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}">{{ old('content') }}</textarea>
                            @if ($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label><b>Image</b></label>
                            <input type="file" name="image" style="padding: 10px;height:45px" class="form-control image {{ $errors->has('image') ? 'is-invalid' : '' }}">
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                            <div class="imagePreview">
                                <img style="width:300px;height:260px;margin-top:5px;object-fit:cover" class="image-preview img-thumbnail" src="{{ asset('uploads/posts/default.png') }}" alt="">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">Save Post</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
