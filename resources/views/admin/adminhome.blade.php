@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            overflow-y: auto;
            margin-top: auto;
            padding-top: 10px;
        }

        .container {
            max-width: 100%;
            justify: auto;
            padding-top: 10px;
        }

        h3 {
            color: #202020;
            padding-top: 15px;
        }

        .card.project {
            background: linear-gradient(45deg, #75dcee, #ffffff);
            padding-top: 13px;
        }

        .card.modules {
            background: linear-gradient(45deg, #dddf8c, #fcfcfc);
            padding-top: 13px;
        }

        .card.tasks {
            background: linear-gradient(45deg, #f5f5f5, #9bee9e);
            padding-top: 13px;
        }

        .card {
            height: 100px;
            border-radius: 25px;
        }

    </style>
</head>

<body>
    <div class="container">
        <?php
        $started = $working = $completed = $clarification = 0;

        foreach ($Projects as $project) {
            if ($project->status == "Started") {
                $started++;
            } else if ($project->status == "Working") {
                $working++;
            } else {
                $completed++;
            }
        }
        ?>

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

            <!-- Project -->
            <div class="container-fluid ">
                <h3>PROJECT</h3>
                <div class="row">
                    <?php renderCard("STARTED", $started, "project"); ?>
                    <?php renderCard("WORKING", $working, "project"); ?>
                    <?php renderCard("COMPLETED", $completed, "project"); ?>
                </div>
            </div>

            <?php
            $started = $working = $completed = 0;
            foreach ($modules as $module) {
                if ($module->Module_status == "started") {
                    $started++;
                } else if ($module->Module_status == "working") {
                    $working++;
                } else {
                    $completed++;
                }
            }
            ?>
            <!-- Modules -->
            <div class="container-fluid ">
                <h3>MODULES</h3>
                <div class="row">
                    <?php renderCard("STARTED", $started, "modules"); ?>
                    <?php renderCard("WORKING", $working, "modules"); ?>
                    <?php renderCard("COMPLETED", $completed, "modules"); ?>
                </div>
            </div>

            <?php
            $started = $working = $completed = $clarification = 0;
            foreach ($tasks as $task) {
                if ($task->Task_status == "started") {
                    $started++;
                } else if ($task->Task_status == "Working") {
                    $working++;
                } else if ($task->Task_status == "Clarification") {
                    $clarification++;
                } else {
                    $completed++;
                }
            }
            ?>
            <!-- Tasks -->
            <div class="container-fluid ">
                <h3>TASK</h3>
                <div class="row">
                    <?php renderCard("STARTED", $started, "tasks"); ?>
                    <?php renderCard("WORKING", $working, "tasks"); ?>
                    <?php renderCard("CLARIFICATION", $clarification, "tasks"); ?>
                    <?php renderCard("COMPLETED", $completed, "tasks"); ?>
                </div>
            </div>

        </main>
    </div>
</body>

</html>

<?php
function renderCard($title, $count, $bgClass)
{
    echo "
        <div class='col-xl-3 col-sm-6 mb-xl-0 mb-3'>
            <div class='card $bgClass'>
                <div class='card-header p-3 pt-2'>
                    <div class='text-end pt-1'>
                        <p class='text-sm mb-0 text-capitalize'>$title</p>
                        <h4 class='mb-0'>$count</h4>
                    </div>
                </div>

            </div>
        </div>";
}
?>
@endsection
