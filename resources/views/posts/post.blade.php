@extends('layouts.app')

@section('title', '| Add Post')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>    
                </div>
            @endif
            
            <div class="card shadow-lg mastercard border-lg">
                <div class="card-header regitrationcardheader shadow-sm text-center">Add Post</div>

                <div class="card-body">

                        <form method="POST" action="{{ url('/addPost') }}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group row">
                                <label for="post_title" class="col-md-4 registertext col-form-label text-md-right">{{ __('Title') }}</label>
    
                                <div class="col-md-6">
                                    <input id="post_title" type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" value="{{ old('post_title') }}" required autocomplete="post_title" autofocus>
    
                                    @error('post_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="post_body" class="col-md-4 registertext col-form-label text-md-right">{{ __('Post Body') }}</label>
    
                                <div class="col-md-6">
                                    <textarea id="post_body" rows="8" class="form-control @error('post_body') is-invalid @enderror" name="post_body" value="{{ old('post_body') }}" required autocomplete="post_body"></textarea>
    
                                    @error('post_body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 registertext col-form-label text-md-right">{{ __('Category') }}</label>
    
                                <div class="col-md-6">
                                    <select id="category_id" type="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" required autocomplete="category_id">
                                        <option value="">Select</option>
                                        @if(count($categories) > 0)
                                            @foreach($categories->all() as $category)
                                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="post_image" class="col-md-4 registertext col-form-label text-md-right">{{ __('Featured Image') }}</label>
    
                                <div class="col-md-6">
                                    <input id="post_image" type="file" class="form-control @error('post_image') is-invalid @enderror" name="post_image" required autocomplete="post_image">
    
                                    @error('post_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn allbtn1 rounder-1 rounded-pill btn-block">
                                        {{ __('Publish Post') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
