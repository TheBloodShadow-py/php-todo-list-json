<?php 

$task_list = file_get_contents("./tasks.json", true);


    header("Content-Type: application/json");


    echo $task_list;
