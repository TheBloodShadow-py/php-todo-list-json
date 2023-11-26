<?php 

$change_task_index = $_POST["change_task_index"];

$task_list = json_decode(file_get_contents("./tasks.json"), true);


if ($task_list[$change_task_index]["taskStatus"]) {
    $task_list[$change_task_index]["taskStatus"] = false;
}
else {
    $task_list[$change_task_index]["taskStatus"] = true;
}

file_put_contents("./tasks.json", json_encode($task_list));

header("Content-Type: application/json");
echo json_encode($task_list);