<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1>Cadastro de novo registro</h1>

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

        if (isset($_POST) && count($_POST) > 0) {
            echo "Existem informações submetidas.<br/>";

            if (isset($_POST['fm_name'])) {
                echo "Nome definido: ".$_POST['fm_name']."<br/>";

                $sql = "INSERT INTO x (name) VALUES ('".$_POST['fm_name']."')";

                echo $sql.'<br/>';

                $mysqli->real_query($sql);

                echo 'Registros afetados: '.$mysqli->affected_rows;
                echo '<br/>';
                echo '<br/>';
            }
        }

        ?>
        Informe o nome a cadastrar:
        <br/>
        <br/>

        <form name="formNew" method="post" action="">
            Nome:
            <input type="text" name="fm_name" value=""/>

            <br/>
            <br/>

            <button type="submit">Salvar</button>
        </form>
    </body>
</html>
