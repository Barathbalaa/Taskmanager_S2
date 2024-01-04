<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
    <style type="text/css">
        body {
        color: #404E67;
        background: #F5F7FA;
        font-family: 'Open Sans', sans-serif;
        }
        .container{
        max-height: 400px;
        max-width:90%;
        justify:auto;
         }
        .table-wrapper {
        width: fit-content;
        margin: auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
        }
        .table-title h2 {
        margin: 6px 6px 0;
        font-size: 24px;
        }
        .table-title .add-new i {
        margin-right: 4px;
        }
        table.table {
        table-layout: fixed;
        }
        table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        }
        table.table th i {
        font-size: 14px;
        margin: 0 5px;
        cursor: pointer;
        }
        table.table th:last-child {
        width: 130px;
        }
        table.table th:first-child {
        width: 50px;
        }
        table.table td a {
        cursor: pointer;
        display: inline-block;
        margin: 0 5px;
        min-width: auto;
        }
        table.table td a.add {
        color: #27C46B;
        }
        table.table td a.edit {
        color: #FFC107;
        }
        table.table td a.delete {
        color: #E34724;
        }
        table.table td i {
        font-size: 19px;
        }
        table.table td a.add i {
        font-size: 24px;
        margin-right: -1px;
        position: relative;
        top: 3px;
        }
        table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
        }
        table.table .form-control.error {
        border-color: #f50000;
        }
        table.table td .add {
        display: none;
        }
        </style>
</head>
<body>
    <div class="container" style="">
    <div class="table-wrapper">
    <div class="table-title">
    <div class="row">
    <div class="col-sm-10"><h2>{{$Tasks}}</b></h2></div>
    <div class="col-sm-2">
    <a href="{{ route('createtasks') }}">
    <button type="button" class="btn btn-info add-new" ><i class="fa fa-plus"></i> Add new Task</button></a>
    </div>
    </div>
    </div>
    <table   id="example" class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
        <tr>
        <td>{{ $task->id }}</td>
        <td>{{ $task->Task_name }}</td>
        <td>{{ $task->Description}}</td>
        <td>{{ $task->Task_status }}</td>
        <td><div style= "display:flex; justify-content:center; align-items:center;">
            <a class="edit" title="Edit" href="{{route('tasks.edit',$task->id)}}" ><i class="material-icons">&#xE254;</i></a>
            <a href="#myModal" class="trigger-btn" data-toggle="modal">
            <button id="del" type="submit" class="btn btn-outline-danger btn-sm">
                <i class="material-icons">&#xE872;</i></button></a>
            <a class="eye" type="button"  data-toggle="modal" data-target="#MCenter"data-url="{{ route('taskdes', $task->id ) }}"  id="show-task"> <i class="fa fa-eye" style="color:rgb(0, 255, 191);"></i></a>
            </div>
            </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    </div>

</body>
</html>

<script type="text/javascript">
    function openMediaInNewTab() {
    var filePath = document.getElementById('media').innerText.trim();
    window.open('/view-media/' + encodeURIComponent(filePath), '_blank');
    }
    $(document).ready(function(){
    // pagination
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
        $('#description').html(data.Description);
        $('#remarks').html(data.remarks);
        $('#media').html(data.media)
    })
    });
    // delete model
    $('body').on('click', '#del', function (e) {
        let x=$(e.currentTarget).parent().parent().parent().parent().find("td:nth-child(1)").text();
        $('#myModal').find('#id').val(x);
        $('#myModal form').attr('action','/tasks/'+x);
    });

    });
</script>
@endsection
<!-- Modal HTML  for desription-->
<div class="modal fade" id="MCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="position: absolute;" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Discription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p><strong>ID:</strong> <span id="task-id"></span></p>
            <p><strong>Description:</strong> <span id="description"></span></p>
            <p><strong>Remarks:</strong> <span id="remarks"></span></p>
            <p><strong>File:</strong> <span id="media"></span></p>
            <a href="#" onclick="openMediaInNewTab()">Click to Open Media</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
</div>
<!-- Modal HTML  for delete-->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">

			<div class="modal-header flex-column">
				<div class="icon-box">
					<h4 class="modal-title w-100">Are you sure?</h4>
			    </div>
			    <div class="modal-body">
		    		<p>Do you really want to delete this task ? </p>
			    </div>
			</div>
	    	<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<form  method="post">
                    @csrf<button type="submit"  class="btn btn-danger">Delete</button></form>
			</div>
		</div>
	</div>
</div>

