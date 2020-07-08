@extends('layouts.app')

@section('title', '| Search Post')
<style type="text/css">
    .avatar{
        border-radius: 100%;
        max-width: 100px;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card text-center shadow-lg mastercard border-lg">
                <div class="card-header regitrationcardheader shadow-sm">
                    <div class="row">
                        <div class="col-md-4">Dashboard <i class="fa fa-dashboard fa-2x" aria-hidden="true"></i></div>
                        <div class="col-md-8">
                            <form method="POST" action='{{ url("/search") }}'>
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary allbtn" type="submit">Go!</button>
                                      </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row card-body">

                    <div class="col-md-4">
                        @if(!empty($profile))
                            <img src="{{ $profile->profile_pic }}" class="avatar" alt="">
                        @else
                            <img src="{{ url('images/avatar.png') }}" class="avatar" alt="">
                        @endif

                        @if(!empty($profile))
                            <p class="lead">{{ $profile->name }}</p>
                        @else
                            <p></p>
                        @endif

                        @if(!empty($profile))
                            <p class="text-muted">{{ $profile->designation }}</p>
                        @else
                            <p></p>
                        @endif
                        
                    </div>
                    <div class="col-md-8">
                        @if(count($posts) > 0)
                            @foreach($posts->all() as $post)
                                <h4>{{ $post->post_title }}</h4>
                                <img src="{{ $post->post_image }}" alt="" style="margin-bottom:10px">
                                <p>{{ substr(strip_tags($post->post_body), 0, 150) }}{{ strlen(strip_tags($post->post_body)) > 50 ? "..." : "" }}</p>

                                <ul class="nav nav-pills">
                                    <li role="presentation" style="margin-right:30px; padding-left:15px;">
                                        <a href='{{ url("/view/{$post->id}") }}'>
                                            <span class="fa fa-eye"> VIEW</span>
                                        </a>
                                    </li>
                                    @if(Auth::id() == 1)
                                        <li role="presentation" style="margin-right:30px;">
                                            <a href='{{ url("/edit/{$post->id}") }}'>
                                                <span class="fa fa-pencil-square-o"> EDIT</span>
                                            </a>
                                        </li>
                                        <li role="presentation" style="margin-right:30px;">
                                            <a href='{{ url("/delete/{$post->id}") }}'>
                                                <span class="fa fa-trash"> DELETE</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>

                                <cite style="float:left; padding-left:15px;" class="text-muted">Posted on: {{ date('M j, Y H:i', strtotime($post->updated_at->diffForHumans())) }}</cite>
                                <br>
                                <hr>
                            @endforeach
                        @else
                            <p>No Post Available!</p>
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
