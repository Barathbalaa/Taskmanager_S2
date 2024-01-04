<!-- resources/views/tasks/create.blade.php -->
@extends('layouts.app')
@section('content')
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


<div  class="container" style="max-width:95%;">
    <div class="table-wrapper">
         <h4>CREATE TASK</h4>
            <form method="POST" action="{{ route('createtasks') }}" class="row g-3">
                @csrf
                <div class="col-md-4">
                    <label for="title"><strong>Task Title:</strong></label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="col-md-4">
                    <label for="project_id"><strong>Select Project:</strong></label>
                    <select id="project" class="form-control" name="project_id" required>
                        <option selected>Select</option>
                        @foreach($Projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="project_id"><strong>Select Module:</strong></label>
                    <select id="modules" class="form-control" name="module_id" required>
                        <option value="Select">Select</option>

                    </select>
                </div>
                <div class="col-md-4">
                    <label for="status"><strong>Status:</strong></label>
                <select class="form-control"  name="status" required>
                    <option class="dropdown-item" type="button" value="Started">Started</option>
                    <option class="dropdown-item" type="button" value="Working">Working</option>
                    <option class="dropdown-item" type="button" value="Completed">Completed</option>
                </select>
                </div>
                <div class="col-md-4">
                    <label for="dept" class="form-label"><strong>Select Department:</strong></label>
                    <select class="form-select" name="dept" id="dept" required>
                        <option value="Administrator">Administrator</option>
                        <option value="Development">Development</option>
                        <option value="Technical">Technical</option>
                        <option value="QA/Test">QA/Test</option>
                        <option value="Human Resource">Human Resource</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="employee"><strong>User:</strong></label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option selected>Select</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="description"><strong>Description:</strong></label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>



                <div class="col-md-6">
                    <label for="assigned"><strong>Assigned date:</strong></label>
                    <input type="date" class="form-control" id="title" name="assigned" required>
                </div>
                <div class="col-md-6">
                    <label for="submission"><strong>Submission date:</strong></label>
                    <input type="date" class="form-control" id="title" name="submission" required>
                 </div>
                <div  class=" col-md-9">
                <button type="submit" style="width:240px;" class="btn btn-outline-primary btn-m">Create Task</button>
                 </div>
                 <div class="col-md-3">
                <a href="{{ route('create') }}"  style="width:230px; " class="btn btn-outline-secondary btn-m" >Cancel</a>
                 </div>
            </form>
        </div>
</div>
<script >
    $('document').ready(()=>{
        $('#project').change(function(){
            $.ajax({
                url:'{{route("get_modules")}}',
                method:"post",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{"data":$('#project').val()},
                success:(data)=>{
                    $('#modules').empty();
                    $('#modules').append(data['data']);
                }
            });
        })

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
                }
            });
        });
    });
</script>
@endsection
