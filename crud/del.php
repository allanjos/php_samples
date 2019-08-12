<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
        <a href="index.php">Voltar para a listagem</a>
        <br/>
        <br/>

        <?php

        // Conexão

        $mysqli = new mysqli("localhost", "root", "mysql", "test");

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        #echo $mysqli->host_info . "<br/>";

        if (isset($_GET) && count($_GET) > 0) {
            echo "Existem informações submetidas.<br/>";

            if (isset($_GET['name'])) {
                echo "Nome definido: ".$_GET['name']."<br/>";

                $sql = "DELETE FROM x WHERE name='".$_GET['name']."'";

                echo $sql.'<br/>';

                $mysqli->real_query($sql);

                echo 'Registros excluídos: '.$mysqli->affected_rows;
            }
        }
        else {
            echo 'O nome não foi informado.<br/>';
        }

        ?>
    </body>
</html>

