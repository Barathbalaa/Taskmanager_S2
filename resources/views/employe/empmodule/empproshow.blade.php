<!--emp pro which show list project on employe side-->
@extends('employe.empnav')
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
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
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
.container{
    max-height: auto;
    max-width: auto;
    overflow-y: auto;
    justify:auto;
}
.table-wrapper {
width: auto;
margin: auto;
background: #fff;
padding: 20px;
box-shadow: 0 4px 4px rgb(89, 153, 190);
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
font-size: 16px;
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
table.table td a {
cursor: pointer;
display: inline-block;
margin: 0 5px;
min-width: 24px;
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

<h2>Projects <b>Details</b></h2>

</div>
    <table  id="Example" class="table table-bordered">
    <thead>
    <tr>
        <th>Sl.No</th>
        <th>Name</th>
        <th>Status</th>
        <th>Description</th>
        <th>Created Date</th>
    </tr>
    </thead>
    <tbody>
        <?php $count=1;?>
        @foreach($projects as $project)<tr>
        <td>{{$count}}</td>
        <?php $count++?>
        <td hidden> {{ $project->id }}</td>
        <td><a href={{route('empmodule',$project->id )}}> {{ $project->name }}</a></td>
        <td> {{ $project->status }}</td>
        <td> {{ $project->description}}</td>
        <td> {{ $project->assigned}}</td>

    </tr>
    @endforeach
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
    // edit
    $(document).on("click", ".add", function(e){
        $.ajax({
        url:"{{route('edit_project')}}",
        headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
        method:"post",
        data:$('form').serialize(),
        success:function(data){
            $('td input[type="text"]').each((id,elm)=>{
                $(elm).parent().parent().parent().find(".add").hide();
                $(elm).parent().parent().parent().find(".edit").show();
                $(elm).parent().parent().replaceWith("<td>"+$(elm).val()+"</td>");
            });

          }
         });
         });


        //pagination
        $('#Example').DataTable({
        //disable sorting on last column
        "columnDefs": [
            { "orderable": true, "targets":5 }
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

<!-- Modal HTML  for delete-->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">

			<div class="modal-header flex-column">
				<div class="icon-box">
					<h4 class="modal-title w-100">Are you sure?</h4>
			    </div>
			    <div class="modal-body">
				<p>Do you really want to delete this Project ? </p>
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

