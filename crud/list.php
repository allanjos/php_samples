<?php

// Conexão

$mysqli = new mysqli("localhost", "root", "mysql", "test");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $mysqli->host_info . "<br/>";

// Consulta

if ($result = $mysqli->query("SELECT name FROM x")) {
    printf("Select returned %d rows.<br/>", $result->num_rows);

    while ($row = $result->fetch_array()){
        printf("Nome: " . $row[0] . '<br/>');
    }

    /* free result set */
    $result->close();
}

?>
