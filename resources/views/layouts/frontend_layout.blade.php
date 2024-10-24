<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/styel.css')}}">
  <title>Laravel Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    


<style>
   .hero {
   background-image: url("{{ asset('frontend/images/pic2.jpg') }}"); 
    background-size: cover;
    background-position: center;
    color: rgb(66, 64, 64);
    text-align: center;
    padding: 100px 0;
   }
</style>
<body>

<!-- ======================================Navigation Bar================================================= -->
    <nav class="navbar navbar-expand-lg navStyle">
        <a class="brand-navbar" href="#">Laravel Blog</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#mainMenu">
            <span><i class="fas fa-align-right iconStyle"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav ml-auto navList">
                <li class="nav-item active"><a href="#" class="nav-link">HOME<span class="sr-only">(current)</span></a></li>
                <li class="nav-item">
                    <a href="{{route('Post.create')}}" class="nav-link">Create Post</a>
                </li>
             

                 
                 @auth 

                 <li class="nav-item">
                   <a class="nav-link" href="{{ route('login') }}">{{ auth()->user()->name}}</a>
                 </li>
                 @endauth
                 @guest
                 <li class="nav-item">
                   <a class="nav-link" href="{{ route('login') }}">Login</a>
                 </li>

                 @endguest
                 
                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link">Registration</a>
                </li>
               
            </ul>
        </div>
    </nav>
  </head>




{{-- main content --}}
 @yield('frontent')
 



 <!-- Footer -->
 <footer class="text-center">
  <div class="container">
    <p>&copy; 2024 Laravel Blog. All Rights Reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
@stack('content')

</body>
</html>


