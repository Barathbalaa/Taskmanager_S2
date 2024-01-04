<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Delete Confirmation Modal</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style >body {
	font-family: 'Varela Round', sans-serif;
}
.modal-confirm {
	color: #636363;
	width: 300px;
}
.modal-confirm .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
	text-align: center;
	font-size: 14px;
}
.modal-confirm .modal-header {
	border-bottom: none;
	position: relative;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -10px;
}
.modal-confirm .close {
	position: absolute;
	top: -5px;
	right: -2px;
}
.modal-confirm .modal-body {
	color: #999;
}
.modal-confirm .modal-footer {
	border: none;
	text-align: center;
	border-radius: 5px;
	font-size: 13px;
	padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
	color: #999;
}
.modal-confirm .icon-box {
	width: 80px;
	height: 80px;
	margin: 0 auto;
	border-radius: 50%;
	z-index: 9;
	text-align: center;
	border: 3px solid #f15e5e;
}
.modal-confirm .icon-box i {
	color: #f15e5e;
	font-size: 46px;
	display: inline-block;
	margin-top: 13px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #60c7c1;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	min-width: 120px;
	border: none;
	min-height: 40px;
	border-radius: 3px;
	margin: 0 5px;
}
.modal-confirm .btn-secondary {
	background: #c1c1c1;
}
.modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
	background: #a8a8a8;
}
.modal-confirm .btn-danger {
	background: #f15e5e;
}
.modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
	background: #ee3535;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}</style>
<div class="text-center">
	<!-- Button HTML (to Trigger Modal) -->
	<a href="#myModal" class="trigger-btn" data-toggle="modal">Click to Open Confirm Modal</a>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>
				<h4 class="modal-title w-100">Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records?</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<form action="{{route('tasks.destroy',$task->id)}}" method="post">
                    @csrf
                    <button type="button" class="btn btn-danger">Delete</button></form>
			</div>
		</div>
	</div>
</div>
</body>
</html>



// loginpage- breeze


<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
<!-- resources/views/tasks/create.blade.php  , i  cut the part from task for remove the user option and also cleard the db-->

<div class="col-md-4">
    <label for="employee">User:</label>
    <select class="form-control" id="user_id" name="user_id" required>
        @foreach($users as $user)
            <option value="{{ $user->name }}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>

<!-- resources/views/modules/indexmodule.blade.php --> deleting

<form action="{{route('delete_module',$singlemodule->id)}}" method="post" >
    @csrf
     <a><button type="submit" class="btn btn-outline-danger btn-sm">
   <i class="material-icons">&#xE872;</i>
</button></a></form>

//from show task delete posion

<form action="{{route('tasks.destroy',$task->id)}}" method="post">
    @csrf<button type="submit" class="btn btn-outline-danger btn-sm">
       <i class="material-icons">&#xE872;</i></button> </form>
// from project delete possion

<form action="{{route('delete_project',$project->id)}}" method="post" >
        @csrf<button type="submit" class="btn btn-outline-danger btn-sm">
            <i class="material-icons">&#xE872;</i></button></form></div>

// from view user delete button

<td>
    <form action="{{route('delete_user',$user->id)}}" method="post" >
      @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm"><i class="material-icons">&#xE872;</i></button></form></td>

        // Delete row on delete button click js old

        $(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
        });

\\\\\\\\\\\\\\\\\\\\\\\\ uplode image
<div class="form-element">
    <input type="file"
    id="file-1">
    <label for="file-1"
    id="file-1-preview">
    <img src="uplode.jepg" alt="iyoo raamaa">
    <div>
    <span>+</span>
    </div>
    </label>
</div>
<script>
    function previewBeforeUpload(id) {
document.querySelector("#" + id).addEventListener("change", function (e) {
if (e.target.files.length == 0) {
  return;
}

let file = e.target.files[0];
let url = URL.createObjectURL(file);

// Update the file name in the preview
document.querySelector("#" + id + "-preview div span").innerText = file.name;

// Update the preview image source
document.querySelector("#" + id + "-preview img").src = url;
});
}

// Call the function with the provided ID
previewBeforeUpload("file-1");

</script>
<style type="text/css">

    .form-element {
     position: relative;
     margin: 20px;
    }

    #file-1 {
    display: none; /* Hide the default file input */
    }

    #file-1-preview {
    cursor: pointer;
    display: block;
    position: relative;
    }

    #file-1-preview img {
    max-width:300px;
    height: auto;
    border: 1px solid #ccc;
    }

    #file-1-preview div {
    position: absolute;
    top: 0;
    left: 0;
    width:auto;
    height: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black overlay */
    color: #fff;
    font-size: 18px;
    }

    #file-1-preview div span {
    margin-right: 4px;
    }
    </style>

///// from adduser- register
<div class="col-md-6">
    <!-- Dept -->
    <div class="mt-4">
        <x-input-label for="dept" :value="__('Department')" />
        <select id="dept" name="dept" class="form-control" required autofocus autocomplete="name">
            <option value="Administrator" @if(old('dept') === 'Admin') selected @endif>Administrator</option>
            <option value="Development" @if(old('dept') === 'Developer') selected @endif>Developer</option>
            <option value="Technical" @if(old('dept') === 'Developer') selected @endif>Technical</option>
            <option value="QA/Test" @if(old('dept') === 'Tester') selected @endif>QA/Test</option>
            <option value="Human Resource" @if(old('dept') === 'HR') selected @endif>Human Resource</option>
        </select>
        <x-input-error :messages="$errors->get('dept')" class="mt-2" />
    </div>
</div>
//////////////////////from showtask/////// online edit
<script type="text/javascript">
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    var actions = $("table td:last-child").html();
    // Append table with add row form on add new button click

    // Add row on add button click
    $(document).on("click", ".add", function(e){
        $.ajax({

        headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
        method:"post",
        data:$('form').serialize(),
        success:function(data){

        }
        });
    var empty = false;
    var input = $(this).parents("tr").find('input[type="text"]');
    input.each(function(){
    if(!$(this).val()){
    $(this).addClass("error");
    empty = true;
    } else{
    $(this).removeClass("error");
    }
    });
    $(this).parents("tr").find(".error").first().focus();
    if(!empty){
    input.each(function(){
    $(this).parent("td").html($(this).val());
    });
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").removeAttr("disabled");
    }
    });
    // Edit row on edit button click
    $(document).on("click", ".edit", function(){
        let count=1;
    $(this).parents("tr").find("td:not(:last-child)").each(function(){
    $(this).html('<form method="POST">  @csrf <input type="text" name="inp'+count+'" class="form-control" value="' + $(this).text() + '"></form>');
    count++;
    });
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
    });

    //pagination
    $('#example').DataTable({
    //disable sorting on last column
    "columnDefs": [
      { "orderable": false, "targets": 4 }
    ],
    language: {
      //customize pagination prev and next buttons: use arrows instead of words
      'paginate': {
        'previous': '<span class="fa fa-chevron-left"></span>',
        'next': '<span class="fa fa-chevron-right"></span>'
      },
      //customize number of elements to be displayed
      "lengthMenu": 'Display <select class="form-control input-sm">'+
      '<option value="10">10</option>'+
      '<option value="20">20</option>'+
      '<option value="30">30</option>'+
      '<option value="40">40</option>'+
      '<option value="50">50</option>'+
      '<option value="-1">All</option>'+
      '</select> results'
    }
    })
    // model description
    $('body').on('click', '#show-task', function () {
    var userURL = $(this).data('url');
    $.get(userURL, function (data) {
        $('#task-id').text(data.id );
        $('#description').text(data.Description);
    })
    });
        // Delete row on delete button click
    $('body').on('click', '#del', function (e) {
        let x=$(e.currentTarget).parent().parent().parent().parent().find("td:nth-child(1)").text();
        $('#myModal').find('#id').val(x);
        $('#myModal form').attr('action','/tasks/'+x);
    });
    });


    </script>
