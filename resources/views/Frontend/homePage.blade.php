@extends('layouts.frontend_layout')
@section('frontent')
  


  <!-- Hero Section -->

  <div class="hero"  >
    
    <h1>Simple Blog Application</h1>
    <p>Your daily dose of insightful articles</p>
   
  </div>


  <div class="container mt-5" id="blog">
    <div class="row">
      <div class="col-md-12">
      @foreach ($posts as $post )
 
        <div class="card mb-4">
          <img  style="height:200px object-fit:cover;obect-position:center;" 
          src="{{asset('storage/post/'.$post->image)}}" class="card-img-top"  alt="Post Image" loading="lazy">
         
          <div class="card-body"  id="short-content">
            <li class="list-inline-item">{{$post->user->name}}</li>
            <h3 class="card-title">{{$post->title}}</h3>
            <p class="card-text">{!! Str::length($post->content) > 100 ? substr($post->content,0,100).'.......' : $post->content !!}</p>
            <a href="javascript:void(0)" class="btn btn-outline-primary mt-2" onclick="loadFullContent({{ $post->id }})">Read More</a>
          </div>
        </div>

        @endforeach			
      </div>




      @push('content')
      
      <script>
        function loadFullContent(postId) {
         // Sending an AJAX request to fetch the full content
          fetch(`/posts/${postId}/full-content`)
            .then(response => response.json())
            .then(data => {
              // Replacing the short content with the full content
              document.getElementById('short-content').innerHTML = data.content;
            })
            .catch(error => console.error('Error:', error));
        }
      </script> 
      @endpush
   

      
@endsection


   

 
 

    