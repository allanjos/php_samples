<?php

$data = [
            ['id' => '1', 'name' => 'Item 01'],
            ['id' => '2', 'name' => 'Item 02']
        ];

header('Access-Control-Allow-Origin: *');
header('Content-type:application/json;charset=utf-8');

echo json_encode($data);

?>