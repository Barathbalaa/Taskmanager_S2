<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" ></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">

    <!-- Custom CSS -->
<style>
    body {
        font-family: 'Nunito', sans-serif;

    }
    #sidebar {
      height: 100%;
      width: 14%;
      position:fixed;
      background-color: #afb3a4;
      background-size:cover;
      padding-top: 10px;
      padding-left: 10px;
    }
    #sidebar a {
      padding: 10px;
      text-decoration: none;
      font-size: 16px;
      color: #f8ffe0;
      display: block;
      transition: 0.3s;
    }
    #sidebar a:hover {
       color: #bdf70e;
     }
    #content {
      margin-left: 16%;
      margin-top:80px;
      position:relative;
    }
    .dropdown-btn {
      padding: 10px;
      font-size: 16px;
      text-align: left;
      background-color:  #afb3a4;
      color: #818181;
      border: none;
      display: white;
      width: 100%;
      cursor: pointer;
    }
    .dropdown-container {
        display: none;
        padding-left: 15px;
    }
</style>
</head>
<body>

<!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg position-fixed navbar-light " style="width:100%; z-index:1; background-color: #afb3a4; margin-top:-80px;">
  <a class="navbar-brand" href="#"><i class="fa fa-tv" style="font-size:24px"></i> USER Dashboard</a>
  <img src="S2PAY.png" style="max-width:150px;  margin: 0% 0% 0% 60%;"><span>  . </span>
  <i class="fa fa-user-circle" style="font-size:26px;color:black"></i>
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{ Auth::user()->name }}</button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <li><a class="dropdown-item" href="{{route('empprofile')}}">Profile</a></li>
      <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
    </ul>
    </div>
</nav>

<!-- Sidebar -->
<div id="sidebar">

  <ul class="nav flex-column">

    <li class="nav-item">
      <a class="nav-link text-light" href="{{route('indexemp')}}">Home</a>
    </li>
    <!--<li class="nav-item">
      <a class="nav-link text-light" href="#">Inbox</a>
    </li>-->
    <!--<button class="dropdown-btn  text-light">Project</button>
    <div class="dropdown-container nav-item">
        <a href="">Create Project <i class="fa fa-laptop" aria-hidden="true"></i></a>
        <a href="">View Project <i class="fa fa-bolt" aria-hidden="true"></i></a>
    </div>-->

    <li class="nav-item">
        <a  class="nav-link text-light" href="{{route('empproshow')}}">Project<i class="fa fa-bolt" aria-hidden="true"></i></a>
    </li>
    <li class="nav-item">
        <a  class="nav-link text-light" href="{{route('empmodule')}}">Module<i class="fa fa-bolt" aria-hidden="true"></i></a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light" href="{{route('emptask')}}">Task</a>
      </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="{{route('empprofile')}}">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="{{ route('logout') }}">Logout</a>
    </li>

    <!-- Add more menu items as needed -->
  </ul>

</div>

<!-- Content Area -->
<div id="content">
    @yield('content')

</div>
<script>
    // JavaScript to toggle dropdowns
    var dropdowns = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdowns.length; i++) {
        dropdowns[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
</body>
</html>
