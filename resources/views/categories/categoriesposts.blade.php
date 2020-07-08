@extends('layouts.app')

@section('title', '| Categories Post')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="card shadow-lg mastercard border-lg text-center">
                <div class="card-header regitrationcardheader shadow-sm text-center">Post View <i class="fa fa-eye color  fa-1x" aria-hidden="true"></i></div>

                <div class="row card-body">

                    <div class="col-md-4">
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
                            @endforeach
                        @else
                            <p>No Post Available!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
