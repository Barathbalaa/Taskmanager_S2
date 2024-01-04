<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container" style="margin-left:30%;" >
        <h3>Edit Modules</h3>

        <form method="POST" action="{{ route('update') }}">
            @csrf
            <div  style="max-width:40%;">
            <input type="text" name="id" value="{{$module->id}}" hidden>
            <div class="form-group input-group-sm">
                <label for="title">Module Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ ( $modules->Task_name) }}" placeholder="{{ ( $modules-->title) }}">
            </div>

            <div class="form-group input-group-sm">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" value="{{ ( $modules->Description) }}"rows="3" >{{ ($modules->Description) }}</textarea>
            </div>

            <div class="form-group input-group-sm">
                <label for="title">Status:</label>
                <input type="text" class="form-control" id="title" name="status" value="{{ ($modules->Task_status) }}" >
            </div>

            <div class="form-group input-group-sm">
                <label for="employee">User:</label>
                <select class="form-control" id="user_id" name="user_id" >
                @foreach($users as $user)
                    @if($user->id==$modules->user_id){
                        <option style="background-color:green;" value="{{ $user->id }}" selected >{{ $user->name }}</option>
                    }
                    @else{
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    }
                     @endif
                @endforeach
                </select>
            </div>
            </div>
            <div  style="max-width:40%;">
            <div class="form-group input-group-sm">

            <div class="form-group input-group-sm">
                <label for="assigned">Assigned date</label>
                <input type="date" class="form-control" id="assigned" name="assigned" value="{{(date('Y-m-d', strtotime($modules->Assigned)))}}">
            </div>
            <div class="form-group input-group-sm">
                <label for="submission">Submission date</label>
                <input type="date" class="form-control" id="title" name="submission" value="{{(date('Y-m-d', strtotime($modules->Submission)))}}" >
            </div></div>
            <br>



            <button type="submit" class="btn btn-primary">Update Module</button>
            <a href="{{ route('index') }}" class="btn btn-secondary">Cancel</a>
        </form>

    </div>
@endsection
