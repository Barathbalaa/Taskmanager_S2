<!-- resources/views/projects/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="list-group" style="width:400px; margin-left:30%;">
    <h3 style="text-align: center;">Completed Project</h3>
    @if($projects->count()>=1)
        @foreach($projects as $project)
            <a class="list-group-item list-group-item-action">{{ $project->name}}
            <p>Assigned date: {{ $project->assigned }}</p></a>
        @endforeach
    @endif<hr>
    <div style="width:200px;margin:auto;">
    <a href="{{ route('projects.index') }}" class="btn btn-primary">Back to Projects</a>
    </div>
</div>

@endsection

