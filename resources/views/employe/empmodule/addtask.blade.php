@extends('employe.empnav')
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
            <form method="POST" action="{{ route('createemptasks') }}" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="col-md-6">
                    <label for="status">Status:</label>
                <select class="form-control"  name="status" required>
                    <option class="dropdown-item" type="button" value="Started">Started</option>
                    <option class="dropdown-item" type="button" value="Working">Working</option>
                    <option class="dropdown-item" type="button" value="Completed">Completed</option>
                </select>
                </div>
                <div class="col-md-12">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="col-md-4">
                    <label for="project_id"><strong>Select Project:</strong></label>
                    <select id="project" class="form-control" name="project_id" required>
                        <option selected>Select</option>
                        @foreach($projects as $project)
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
                    <label for="employee"><strong>User:</strong></label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option selected>Select</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="assigned">Assigned date:</label>
                    <input type="date" class="form-control" id="title" name="assigned" required>
                </div>
                <div class="col-md-6">
                    <label for="submission">Submission date:</label>
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
                            console.log(data);
                            $('#modules').empty();
                            $('#modules').append(data['data']);
                        }
                    });
                })
            });
        </script>
@endsection
