@extends('employe.empnav')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <style>
    body {
        font-family: 'Roboto', sans-serif;

    }
    h1 {
      color: #333;
    }

    /* Colorful CSS for Cards with Linear Gradient */
    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .card-header {
      border-radius: 10px 10px 0 0;
      padding: 10px;
      text-align: center;
      font-weight: bold;
    }
    .started {
      background: linear-gradient(to right, #8cbcdb, #245a7e); /* Blue Gradient */
      color: white;
    }
    .working {
      background: linear-gradient(to right, #e4b56a, #eca15f); /* Orange Gradient */
      color: white;
    }
    .completed {
      background: linear-gradient(to right, #2ee97c, #a8d8bc); /* Green Gradient */
      color: white;
    }
    .clarification {
      background: linear-gradient(to right, #da948d, #eb2c17); /* Red Gradient */
      color: white;
    }
    .horizontal {
      border-top: 2px solid #bdc3c7; /* Silver */
    }
  </style>
</head>
<body>

<h3>Module Count</h3>
<?php
  $started=0;
  $working=0;
  $completed=0;
  foreach ($modules as $module) {
    if($module->Module_status=="started"){
      $started++;
    }
    else if($module->Module_status=="working"){
      $working++;
    }
    else{
      $completed++;
    }
  }
?>

<div class="container-fluid py-4">
  <div class="row">
    <?php displayCard("STARTED", $started, "started"); ?>
    <?php displayCard("WORKING", $working, "working"); ?>
    <?php displayCard("COMPLETED", $completed, "completed"); ?>
  </div>
</div>

<h3>Task Count</h3>
<?php
  $started=0;
  $working=0;
  $completed=0;
  $clarification=0;
  foreach ($tasks as $task) {
    if($task->Task_status=="Started"){
      $started++;
    }
    else if($task->Task_status=="Working"){
      $working++;
    }
    else if($task->status=="Clarification"){
      $clarification++;
    }
    else{
      $completed++;
    }
  }
?>

<div class="container-fluid py-4">
  <div class="row">
    <?php displayCard("STARTED", $started, "started"); ?>
    <?php displayCard("WORKING", $working, "working"); ?>
    <?php displayCard("COMPLETED", $completed, "completed"); ?>
    <?php displayCard("CLARIFICATION", $clarification, "clarification"); ?>
  </div>
</div>

</body>
</html>

<?php
function displayCard($status, $count, $class) {
  echo <<<HTML
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card $class">
      <div class="card-header">
        <p class="text-capitalize mb-0">$status</p>
        <h4 class="mb-0">$count</h4>
      </div>
      <hr class="horizontal my-0">
    </div>
  </div>
HTML;
}
?>
@endsection
