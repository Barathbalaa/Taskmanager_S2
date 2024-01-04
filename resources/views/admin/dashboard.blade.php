<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Task Management Statistics</h5>
                <p class="card-text">Total Tasks: {{ $totalTasks }}</p>
                <p class="card-text">Completed Tasks: {{ $completedTasks }}</p>
                <!-- Add more statistics as needed -->
            </div>
        </div>
    </div>
@endsection
