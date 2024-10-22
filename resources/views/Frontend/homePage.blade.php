@extends('layouts.frontend_layout')
@section('frontent')
  


  <!-- Hero Section -->




  <div class="hero"  >
 
    <h1>Welcome to Laravel Blog</h1>
    <p>Your daily dose of insightful articles</p>
   
  </div>

  <div class="container mt-5" id="blog">
    <div class="row">
   
      <div class="col-md-12">
      @foreach ($posts as $post )
 
        <div class="card mb-4">
          <img  style="height:200px object-fit:cover;obect-position:center;" 
          src="{{asset('storage/post/'.$post->image)}}" class="card-img-top" alt="Post Image">
          <div class="card-body">
            <li class="list-inline-item">{{$post->user->name}}</li>
            <h3 class="card-title">{{$post->title}}</h3>
            <p class="card-text">{!! Str::length($post->content) > 100 ? substr($post->content,0,100).'.......' : $post->content !!}</p>
            {{-- <p class="card-text">{!! $post->content!!}</p> --}}
            <a  class="btn btn-outline-primary mt-2">Read More</a>
            
          </div>
        </div>
        @endforeach
      
				
				
      </div>





@endsection


   

 
 

    