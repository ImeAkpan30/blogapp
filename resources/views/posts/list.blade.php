@extends('layouts.app')

@section('title', '| Post List')

@section('content')
<div class="container">
    <section class="content">
    <div class="row justify-content-around">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Post List</h3>

          <div class="card-tools">
              <button class="btn btn-primary pull-right">
                  {{-- <router-link to="/post" style="color:#fff; text-decoration:none">Add New Post</router-link> --}}
                  <a href="/post" style="color:#fff; text-decoration:none">Add New Post</a>
                  </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                
              <th>S/N</th>
              <th>Title</th>
              <th>Description</th>
              <th>Category</th>
              <th>Photo</th>
              <th>Action</th>
              
              
              
            </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->post_title}}</td>
                        <td>{{ substr(strip_tags($post->post_body), 0, 150) }}{{ strlen(strip_tags($post->post_body)) > 50 ? "..." : "" }}</td>
                        <td>{{$post->category_id}}</td>
                        <td>{{$post->post_image}}</td>
                        <td>
                            <a href='{{ url("/edit/{$post->id}") }}'><i class="fa fa-pencil-square-o"></i>  </a>
                            <a href='{{ url("/delete/{$post->id}") }}'><i class="fa fa-trash" style="color:red;"></i></a>
                        </td>
                    </tr>
                @endforeach
            
            </tbody>   
            </table>
        </div>
        <!-- /.card-body -->
      </div>
     
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>

@endsection