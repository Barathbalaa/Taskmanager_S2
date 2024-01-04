<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Pro Manager Dashboard</title>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

        <!-- Custom CSS -->
        <style>
            body {
                font-family: 'Montserrat', sans-serif;
            }

            #sidebar {
                height: 100%;
                width: 14%;
                position: fixed; /* Fixed position */
                margin-top: -15px;
                background-color: #343a40;
                background-size: cover;
                padding-top: 10px;
                padding-left: 10px;
                overflow-y: auto;
            }

            #sidebar a {
                padding: 10px;
                text-decoration: none;
                font-size: 14px;
                color: #f8ffe0;
                display: block;
                transition: 0.3s;
            }

            #sidebar a:hover {
                color: gray;
            }

            #content {
                margin-left: 15%;
                margin-top: 80px; /* Adjusted to match the height of the fixed navbar */
                position: static;
            }

            .dropdown-btn {
                padding: 10px;
                font-size: 16px;
                text-align: left;
                background-color: #343a40;
                color: #818181;
                border: none;
                display: block;
                width: 100%;
                cursor: pointer;
            }

            .dropdown-container {
                display: none;
                padding-left: 15px;
            }

            .show {
                display: block;
            }

            .navbar {
                top: 0;
                height: 80px;
                padding-bottom: 0;
                position: fixed;
                display: flex;
                width: 100%;
                z-index: 1;
                color: #f2f5fa;
                background: #343a40;
                font-family: 'Open Sans', sans-serif;
            }
        </style>
    </head>

<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg position-fixed navbar-light">
    <div class="col-sm-10">
        <img src="\S2PAY.png" style="max-width:180px;">
    </div>
    <div class="col-sm-1.5">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Sidebar -->
<div id="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('admin_index') }}" style="font-size:17px"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        </li>
        <li class="nav-item">
            <button class="dropdown-btn text-light"><i class="fa fa-user" aria-hidden="true"> </i> Users</button>
            <div class="dropdown-container">
                <a href="{{ route('register') }}"> Add User <i class="fa fa-user-plus" style="font-size:20px"></i></a>
                <a href="{{ route('viewuser') }}"> View Users <i class="fa fa-eye" style="font-size:20px"></i></a>
            </div>
        </li>
        <li class="nav-item">
            <button class="dropdown-btn text-light"><i class="fa fa-laptop" aria-hidden="true"> </i> Project</button>
            <div class="dropdown-container nav-item">
                <a href="{{ route('taskcreate') }}">Create Project <i class="fa fa-laptop" aria-hidden="true"></i></a>
                <a href="{{ route('taskindex') }}">View Project <i class="fa fa-bolt" aria-hidden="true"></i></a>
            </div>
        </li>
        <li class="nav-item">
            <button class="dropdown-btn text-light"><i class="fa fa-cogs" aria-hidden="true"> </i> Modules</button>
            <div class="dropdown-container nav-item">
                <a href="{{ route('create') }}">Create Module<i class="fa fa-laptop" aria-hidden="true"></i></a>
                <a href="{{ route('moduleindex') }}">View Module <i class="fa fa-bolt" aria-hidden="true"></i></a>
            </div>
        </li>
        <li class="nav-item">
            <button class="dropdown-btn text-light"><i class="fa fa-tasks" aria-hidden="true"> </i> Task</button>
            <div class="dropdown-container">
                <a href="{{ route('createtasks') }}">Create Task <i class="fa fa-user-plus" style="font-size:20px"></i> </a>
                <a href="{{ route('index') }}">View Task <i class="fa fa-eye" style="font-size:20px"></i> </a>
            </div>
        </li>
        <li class="nav-item">
            <button class="dropdown-btn text-light"><i class="fa fa-id-card-o" aria-hidden="true"> </i> Profile</button>
            <div class="dropdown-container">
                <a href="{{ route('profile.edit') }}"> Update <i class="fa fa-id-card-o" style="font-size:18px"></i></a>
            </div>
        </li>
        <!-- Uncomment the following lines if needed -->
        <!--
        <li class="nav-item">
            <a class="nav-link text-light" href="#"><i class="fa fa-envelope-o " style="font-size:24px"></i> Inbox</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="#"><i class="fa fa-calendar" style="font-size:24px"></i> Calender</a>
        </li>
        -->
        <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('logout') }}"><i class="fa fa-sign-out" style="font-size:24px"></i> Logout</a>
        </li>
    </ul>
</div>
  <!-- Content Area -->
  <div id="content">
  @yield('content')
  </div>
  </body>
</html>
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


