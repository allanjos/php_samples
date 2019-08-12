<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1>Lista de cadastrados</h1>

        <a href="new.php">Cadastrar novo registro</a>
        <br/>
        <br/>

        <?php

        // Conexão

        $mysqli = new mysqli("localhost", "root", "mysql", "test");

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        // Consulta

        if ($result = $mysqli->query("SELECT name FROM x")) {
            printf("Número de registros cadastrados: %d<br/><br/>", $result->num_rows);

            echo '<table border="1">';
            echo '<tr>';
            echo '<th>Nome</th>';
            echo '<th>Opções</th>';
            echo '</tr>';
            while ($row = $result->fetch_array()){
                echo '<tr>';
                echo '<td>'.$row[0].'</td>';
                echo '<td><a href="del.php?name='.$row[0].'">Excluir</a></td>';
                echo '</tr>';
            }
            echo '</table>';

            /* free result set */
            $result->close();
        }

        ?>
    </body>
</html>

