<!-- resources/views/tasks/tedit.blade.php -->
@extends('layouts.app')

@section('content')
    <style type="text/css">
    body {
    color: #404E67;
    background: #F5F7FA;
    font-family: 'Open Sans', sans-serif;

    }
    .table-wrapper {
    overflow-y: scroll;
    max-height: 100%;
    width: auto;
    margin: auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }

    </style>

    <div class="container"  style="max-width:95%;" >
        <div class="table-wrapper">
        <h3>EDIT TASK</h3>

        <form method="POST" action="{{route('update_task_content')}}" enctype="multipart/form-data" class="row g-3">
            @csrf
            <input type="text" name="id" value="{{$task->id}}" hidden>
            <div  class="col-md-4">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->Task_name }}" placeholder="{{ $task->title }}">
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
                <label for="employee">User:</label>
                <select class="form-control" id="user_id" name="user_id" >
                @foreach($users as $user)
                    @if($user->id==$task->user_id){
                        <option style="background-color:green;" value="{{ $user->id }}" selected >{{ $user->name }}</option>
                    }
                    @else{
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    }
                     @endif
                @endforeach
                </select>
            </div>

            <div  class="col-md-4">
                <label for="status"><b>Status:</b></label>
                <select class="form-control"  name="status"  value="{{ $task->Task_status }}">
                <option class="dropdown-item" type="button" value="Started">Started</option>
                <option class="dropdown-item" type="button" value="Working">Working</option>
                <option class="dropdown-item" type="button" value="Completed">Completed</option>
                <option class="dropdown-item" type="button" value="Clarification">Clarification</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $task->Description }}</textarea>
            </div>

            <!-- New Input for Remark -->
            <div class="col-md-6" >
                <label for="remark">Remark:</label>
                <textarea class="form-control" id="remark" name="remark" rows="3">{{ $task->remarks }}</textarea>
            </div>
            <!-- New Input for Photo/Video -->

            <div class="col-md-6" >
                <label for="media">Photo/Video:</label>
                <input type="file" class="form-control" id="media" name="media">
            </div>
            <div class="col-md-6">
                <label for="submission">Submission date:</label>
                <input type="date" class="form-control" id="submission" name="submission" value="{{ date('Y-m-d', strtotime($task->Submission)) }}">
            </div>
            <br>
            <div  class=" col-md-9">
                <button type="submit" style="width:240px;" class="btn btn-outline-primary btn-m">Update Task</button>
            </div>
            <div class="col-md-3">
                  <a href="{{ route('index') }}" style="width:230px;" class="btn btn-outline-secondary btn-m" >Cancel</a>
            </div>
        </form>
    </div>
    </div>
<script >
    $('document').ready(()=>{
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
