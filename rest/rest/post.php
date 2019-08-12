<?php

//trigger_error("Trigger message to error log", E_USER_ERROR);

$file_content = file_get_contents('php://input');

error_log($file_content);

$json_obj = json_decode($file_content, true);

if (json_last_error() != JSON_ERROR_NONE) {
    $data = ['error' => 'Error in JSON content.'];
}
else if ($json_obj['name']) {
    $name = $json_obj['name'];

    $data = [
        ['id' => '1', 'name' => $name]
    ];
}
else {
    $data = ['error' => 'No name in JSON data.'];
}

header('Access-Control-Allow-Origin: *');
header('Content-type:application/json;charset=utf-8');

echo json_encode($data);

?>