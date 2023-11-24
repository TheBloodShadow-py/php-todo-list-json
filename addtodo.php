<?php 

$new_task = [
    "taskTitle"=> $_POST["todo_title"] ?? "",
    "taskDescription"=> $_POST["todo_description"] ?? "",
    "taskStatus" => false,
];

$task_list = json_decode(file_get_contents("./tasks.json"), true);

if ($new_task["taskTitle"] !== "" && $new_task["taskDescription"] !== "") {
    array_push($task_list, $new_task);  
    file_put_contents("./tasks.json", json_encode($task_list));
}

header("Content-Type: application/json");
echo json_encode($task_list);