@extends('employe.empnav')

 @section('content')
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <style type="text/css">
     body {
     color: #404E67;
     background: #F5F7FA;
     font-family: 'Open Sans', sans-serif;
     }
     .table-wrapper {
     width: auto;
     margin: auto;
     background: #fff;
     padding: 20px;
     box-shadow: 0 1px 1px rgba(0,0,0,.05);
     }
 </style>

</head>
<body>
 <div  class="container" style="max-width:95%;">
     <div class="table-wrapper">
              <h5>CREATE MODULES</h5>
             <form method="POST" action="{{ route('moduleempcreate') }}" class="row g-3">
                 @csrf
                 <div class="col-md-4">
                     <label for="title">Module Title:</label>
                     <input type="text" class="form-control" id="title" name="title" required>
                 </div>
                 <div class="col-md-4">
                  <label for="project_id">Select Project:</label>
                     <select class="form-control" name="project_id" required>
                         @foreach($projects as $project)
                             <option value="{{ $project->id }}">{{ $project->name }}</option>
                         @endforeach
                     </select>
                 </div>
                 <div class="col-md-4">
                     <label for="dept" class="form-label">Select Department:</label>
                     <select class="form-select" name="dept" id="dept" required>
                         <option value="Administrator">Administrator</option>
                         <option value="Development">Development</option>
                         <option value="Technical">Technical</option>
                         <option value="QA/Test">QA/Test</option>
                         <option value="Human Resource">Human Resource</option>
                     </select>
                 </div>
                 <div class="col-12">
                     <label for="description">Description:</label>
                     <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                 </div>

                 <div class="col-md-3">
                     <label for="employee">User:</label>
                     <select class="form-control" id="user_id" name="user_id" required>
                         @foreach($users as $user)
                             <option value="{{ $user->id }}">{{ $user->name }}</option>
                         @endforeach
                     </select>
                 </div>
                 <div class="col-md-3">
                     <label for="status">Status:</label>
                 <select class="form-control"  name="status" required>
                     <option class="dropdown-item" type="button" value="Started">Started</option>
                     <option class="dropdown-item" type="button" value="Working">Working</option>
                     <option class="dropdown-item" type="button" value="Completed">Completed</option>
                 </select>
                 </div>

                 <div class="col-md-3">
                     <label for="assigned">Assigned date:</label>
                     <input type="date" class="form-control" id="title" name="assigned" required>
                 </div>
                 <div class="col-md-3">
                     <label for="submission">Submission date:</label>
                     <input type="date" class="form-control" id="title" name="submission" required>
                 </div>
                 <br>
                 <div class="col-md-9">
                 <button type="submit" style="width:240px;" class="btn btn-primary">Create Module</button>
                 </div>
                 <div class="col-md-3">
                 <a href="#"  style="width:240px; align:right;"class="btn btn-secondary">Cancel</a>
                 </div>

             </form>
         </div>
 </div>
</body>

<script>
    $(document).ready(function(){
        $("#dept").change(function(){

            $.ajax({
                url:"/getusers",
                headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                method:"post",
                data:{"dept":$("#dept").val()},
                success:function(data){
                    let arr=data["users"];
                    let res="";
                    $.each(arr,(id,user)=>{
                        res+="<option value='"+user.id+"'>"+user.name+"</option>";
                    });
                    $("#user_id").html(res);
                    console.log(arr);
                }
            });
        });
    });
</script>

@endsection
