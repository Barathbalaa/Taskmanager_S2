<!-- resources/views/modules/indexmodule.blade.php -->
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
<script src='https://code.jquery.com/jquery-3.7.0.js'></script>
<script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>


<style type="text/css">
body {
color: #404E67;
background: #F5F7FA;
font-family: 'Open Sans', sans-serif;
}
.table-wrapper {
max-width: auto;
background: #fff;
padding: 20px;
box-shadow: 0 1px 1px rgba(0,0,0,.05);
max-height: 400px;
overflow-y: auto;
}
.table-title {
padding-bottom: 10px;
margin: 0 0 10px;
}
.table-title h2 {
margin: 6px 0 0;
font-size: 22px;
}
.table-title .add-new {
float: right;
height: 30px;
font-weight: bold;
font-size: 12px;
text-shadow: none;
min-width: 100px;
border-radius: 50px;
line-height: 13px;
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
font-size: 13px;
margin: 0 5px;
cursor: pointer;
}
table.table th:first-child {
width: 50px;
}
table.table th:last-child {
width: 120px;
}
table.table td a {
cursor: pointer;
display: inline-block;
margin: 0 5px;
min-width: 24px;
}
table.table td a.add {
color: #3be283;
}
table.table td a.edit {
color: #07c5ff;
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
    <div class="container">
    <div class="table-wrapper">
    <div class="table-title">
    <div class="row">
    <div class="col-sm-10"><h2>{{$Project}}</h2></div>
    <div class="col-sm-2">
        <a href="{{route('create')}}">
    <button type="button" class="btn btn-info add-new"  ><i class="fa fa-plus"></i> Add New Module</button></a>
    </div>
    </div>
    </div>
        <table id="exmod" class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Modules</th>
            <th>Employee</th>
            <th>Status</th>
            <th>Assigned_date</th>
            <th>Submit_date </th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if($Module->count() > 0)

        <?php $count=1 ?>
        @foreach($Module as $singlemodule)
        <tr>
        <td>{{$count}}</td>
        <?php $count++ ?>
        <td hidden>{{ $singlemodule->id }}</td>
        <td><a href={{route('showtask',$singlemodule->Module_name )}}>{{ $singlemodule->Module_name }}</a></td>
        <td>{{ $singlemodule->user_name }}</td>
        <td>{{ $singlemodule->Module_status }}</td>
        <td>{{ $singlemodule->Assigned }}</td>
        <td>{{ $singlemodule->Submission }}</td>
        <td><div style="display: flex; justify-content: center; align-items: center;">
        <a class="add" title="Add" data-toggle="tooltip"> <i class="material-icons">&#xE03B;</i> </a>
        <a class="edit" title="Edit" data-toggle="tooltip"> <i class="material-icons">&#xE254;</i> </a>
        <form action="{{route('delete_module',$singlemodule->id)}}" method="post" >
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">
            <i class="material-icons">&#xE872;</i>
        </button></form>
        <a type="button"  data-toggle="modal" data-target="#Center"> <i class="fa fa-eye" style="color:rgb(190, 131, 188);"></i></a>
        </div>
        </td>
        </tr>
        @endforeach
        @endif
        </tbody>
        </table>
    </div>
    </div>
    </body>
</html>

<script type="text/javascript">
   $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    var actions = $("table td:last-child").html();

    // Add row on add button click
    $(document).on("click", ".add", function(){
        $.ajax({
        url:"{{route('module.edit')}}",
        headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
        method:"post",
        data:$('form').serialize(),
        success:function(data){
            let elm=$('td input');
            $(elm).parents('tr').find('.add').hide();
            $(elm).parents('tr').find('.edit').show();
            elm=$(elm).parents('tr').find('.add');
            $('td:not(:last-child)').find('input[type="text"],select').each((id,elm)=>{
                $(elm).parent().parent().replaceWith("<td>"+$(elm).val()+"</td>");
            });
           let x=$(elm).parent().parent().parent().find("td:nth-child(3)");
           $(x).replaceWith("<td> <a href='/showtask/"+x.text().trim()+"'>"+x.html()+"</a></td>");
          }
         });
         });
    // Edit row on edit button click
    $(document).on("click", ".edit", function(e){
        let count=1;
    $(this).parents("tr").find("td:nth-child(3),td:nth-child(4),td:nth-child(5),td:nth-child(7)").each(function(){
        if(count==3){
            $(this).html('<form method="POST">@csrf<select name="inp'+count+'"><option value="' + $(this).text() + '" selected>' + $(this).text() + '--selected</option><option value="started">Started</option><option value="working">working</option><option value="completed">Completed</option><option value="Clarification">Clarification</option></select></form>');
        }else if(count==2){
            let res='<form method="POST">@csrf<select name="inp'+count+'"><option value="' + $(this).text() + '" selected>' + $(this).text() + '--selected</option>';
            let arr=@json($User);
            arr.forEach(element => {
                res+="<option value='"+element.name+"'>"+element.name+"</option>";

            });
            res+="</select></form>";
            $(this).html(res);
        }
        else{
            $(this).html('<form method="POST">@csrf<input type="text" name="inp'+count+'" class="form-control" value="' + $(this).text() + '"></form>');
        }
        count++;
    });

    $("form").append("<input type='text' name='id' value='"+$(this).parents("tr").find("td:nth-child(2)").text()+"'hidden>");
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
    });

     // model description
    $('body').on('click', '#show', function () {
    var userURL = $(this).data('url');
    $.get(userURL, function (data) {
        $('#module-id').text(data.id );
        $('#description').text(data.Description);
    })
    });
    //delete model
    $('body').on('click', '#del', function (e) {
            let x=$(e.currentTarget).parent().parent().parent().parent().find("td:nth-child(1)").text();
            $('#myModal').find('#id').val(x);
            $('#myModal form').attr('action','/delete_module/'+x);
        });

        //pagination
    $('#exmod').DataTable({
      //disable sorting on last column
      "columnDefs": [
        { "orderable": false, "targets": 7 }
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
    });
    </script>
@endsection
<!-- Modal description -->

<div class="modal fade" id="Center" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="position: absolute;" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLongTitle">Description</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p><strong>ID:</strong> <span id="module-id"></span></p>
            <p><strong>Description:</strong> <span id="description"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
   </div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<h4 class="modal-title w-100">Are you sure?</h4>
			    </div>
			    <div class="modal-body">
				<p>Do you really want to delete this module ? </p>
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

