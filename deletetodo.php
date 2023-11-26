<?php 

$delete_task_index = $_POST["delete_task_index"];

$task_list = json_decode(file_get_contents("./tasks.json"), true);

unset($task_list[$delete_task_index]);


file_put_contents("./tasks.json", json_encode($task_list));

header("Content-Type: application/json");
echo json_encode($task_list);