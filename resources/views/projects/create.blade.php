<!-- resources/views/projects/create.blade.php -->
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
    <form action="{{ route('projects.store') }}" method="post"  class="row g-3">
        @csrf
        <h5>CREATE NEW PROJECT</h5>
        <div class="col-md-4">
            <label for="title"><b>Project name:</b></label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div  class="col-md-4">
            <label for="status"><b>Status:</b></label>
            <select class="form-control"  name="status" required>
            <option class="dropdown-item" type="button" value="Started">Started</option>
            <option class="dropdown-item" type="button" value="Working">Working</option>
            <option class="dropdown-item" type="button" value="Completed">Completed</option>
            </select>
        </div>
        <div  class="col-md-4">
            <label for="assigned"><b>Assigned date:</b></label>
            <input type="date" class="form-control" id="title" name="assigned" required>
        </div>
        <div  class="col-md-12">
            <label for="description"><b>Description:</b></label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>
        <div  class=" col-md-9">
                <button type="submit" style="width:240px;" class="btn btn-outline-primary btn-m">Create Project</button>
        </div>
        <div class="col-md-3">
                <a href=''  style="width:220px; " class="btn btn-outline-secondary btn-m" >Cancel</a>
        </div>

    </form>
</div>
</div>
@endsection
