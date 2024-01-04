
@extends('layouts.app')

@section('content')
<!-- resources/views/calendar.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
</head>
<body>
    <h3>Calendar</h3>
    <h4> Date and Time<br><h4>
       <h5>  {{ $currentDateTime }}</h5>
</body>
</html>
@endsection