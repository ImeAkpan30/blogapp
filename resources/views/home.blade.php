@extends('layouts.app')

@section('title', '| Home')
<style type="text/css">
    .avatar{
        border-radius: 100%;
        max-width: 100px;
        
    }
</style>
@section('content')
<div class="container">
    <marquee style="color:orangered; font-weight:700; opacity:80%;"><h1>WELCOME TO IME AKPAN'S BLOG!</h1></marquee>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            @if (session('successs'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card shadow-lg mastercard border-lg text-center">
                <div class="card-header regitrationcardheader shadow-sm">
                    <div class="row">
                        <div class="col-md-4">Dashboard <i class="fa fa-dashboard fa-2x" aria-hidden="true"></i></div>
                        <div class="col-md-8">
                            <form method="POST" action='{{ url("/search") }}'>
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                                    <div class="input-group-append">
                                      {{-- <button class="btn btn-outline-secondary allbtn" type="submit">Go!</button> --}}
                                      <button class="fa fa-search fa-lg allbtn" aria-hidden="true" type="submit" style="padding-left:10px; padding-right:10px;"></button>
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
                        <p class="lead">{{ $profile->designation }}</p>
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
                                                <span class="fa fa-trash" type="submit" onclick="removeItem(index)"> DELETE</span>
                                                
                                            </a>
                                        </li>
                                    @endif
                                    
                                </ul>

                                <cite style="float:left; padding-left:15px;" class="text-muted">Posted on: <i class="fa fa-calendar"></i> {{ date('M j, Y H:ia', strtotime($post->updated_at->diffForHumans())) }}</cite>
                                <br>
                                <hr>
                            @endforeach
                        @else
                            <p>No Post Available!</p>
                        @endif
                                
                        {{ $posts->links() }}
                    </div>
                </div>
                <div class="card-footer footerheader ">
                    &copy;Copyright Ime Akpan 2020, All Rights Reserved
                    <div class="social-buttons">
                        <a href="https://www.facebook.com/MOSCOLYF">
                           <i class="fa fa-facebook-official"></i>
                        </a>
                        <a href="https://twitter.com/@ImeAkpan50">
                            <i class="fa fa-twitter-square"></i>
                        </a>
                        <a href="https://instagram.com/imeobongakpan?igshid=1alrnn6tflpi6">
                           <i class="fa fa-instagram"></i>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

