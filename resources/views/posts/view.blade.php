@extends('layouts.app')

@section('title', '| View Post')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                   <strong>Success:</strong> {{ session('status') }}
                </div>
            @endif
            
            <div class="card text-center shadow-lg mastercard border-lg">
                <div class="card-header regitrationcardheader shadow-sm ">Post View <i class="fa fa-eye color  fa-1x" aria-hidden="true"></i></div>

                <div class="row card-body">

                    <div class="col-md-4">
                        <div id="categories-2" class="widget widget_categories">
                            <h4 class="widget-title">Categories</h4>
                        </div>
                       <ul class="list-group">
                           @if(count($categories) > 0)
                                @foreach($categories->all() as $category)
                                    <li class="list-group-item"><a href='{{ url("category/{$category->id}") }}' class="cat" style="color:indigo;">{{ $category->category }}</a></li>
                                @endforeach
                           @else
                                <p>No Category Found!</p>
                           @endif
                           
                       </ul>
                    </div>
                    <div class="col-md-8">
                        @if(count($posts) > 0)
                            @foreach($posts->all() as $post)
                                <h4>{{ $post->post_title }}</h4>
                                <img src="{{ $post->post_image }}" alt="" style="margin-bottom:10px">
                                <p>{{ $post->post_body }}</p>

                                <ul class="nav nav-pills">
                                    <li role="presentation" style="margin-right:30px; padding-left:15px;">
                                        <a href='{{ url("/like/{$post->id}") }}'>
                                            <span class="fa fa-thumbs-up"> Like ({{ $likeCtr }})</span>
                                        </a>
                                    </li>
                                    <li role="presentation" style="margin-right:30px;">
                                        <a href='{{ url("/dislike/{$post->id}") }}'>
                                            <span class="fa fa-thumbs-down"> Dislike ({{ $dislikeCtr }})</span>
                                        </a>
                                    </li>
                                    <li role="presentation" style="margin-right:30px;">
                                        <a href='{{ url("/comment/{$post->id}") }}'>
                                            <span class="fa fa-comments"> COMMENTS ({{ $commentCtr }})</span>
                                        </a>
                                    </li>
                                </ul>

                                
                            @endforeach
                        @else
                            <p>No Post Available!</p>
                        @endif
                        <br>

                        <form method="POST" action='{{ url("/comment/{$post->id}") }}'>
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12 col-md-offset-2">
                                    <textarea id="comment" rows="6" class="form-control"   name="comment" required autofocus></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 col-md-offset-2">
                                    <button type="submit" class="btn allbtn1 rounder-1 rounded-pill btn-lg btn-block">
                                        {{ __('POST COMMENT') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br>

                        <h3 class="text-muted">Comments</h3>
                        @if(count($comments) > 0)
                            @foreach($comments->all() as $comment)
                                <p> {{ $comment->comment }}</p>
                                <p class="text-muted"><i>Posted by: {{ $comment->name }}</i></p>
                                <hr>
                            @endforeach
                        @else
                            <p>No Comments Available!</p>
                        @endif
                    </div>
                </div>
                <div class="card-footer footerheader ">
                    &copy; Copyright Ime Akpan 2020, All Rights Reserved
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
