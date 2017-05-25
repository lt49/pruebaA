<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            echo "Hola Mundo PHP xD";
            echo '<BR>';
            echo '<BR>';
            //MySQL esta descontinuada -----------------------------------------
            /*$con = mysql_connect("localhost:3306","root","admin");
            if ($con) {
                mysql_select_db("tsisadb",$con);
                $sql_statement = "select * from usuario";
                $query = mysql_query($sql_statement, $con);
                while ($row = mysql_fetch_array($query,MYSQL_ASSOC)) {
                    echo "Usuario ID: {$row['idusuario']} <br>".
                         "Usuario: {$row['usuario']} <br>".
                         "Clave: {$row['clave']} <br>";
                }
                echo 'Exito';
            }else{
                echo 'Error';
            }*/
           //---------------------------------------------------------------------
        //MySQLI---- CRUD----------------------------------------------------------------
            $con = new mysqli("localhost", "root", "admin", "tsisadb");
            $myArray = array();
            if($con->connect_error){
                echo "No hay Conexion. Error: ".$con->connect_error;
                exit();// sirve para el servidor no siga leendo el resto del codigo de la parte de abajo
            }else{
                echo  "Conexion exitosa MySQLI";
            }
            echo '<br>';
            //$con->query("insert into usuario (idterminal,usuario, clave, rol) values(1,'php',123,'admin')") or die("No se puede crear la conexion");
            //$con->query("update usuario set usuario='mysqli' where 1 order by idusuario desc limit 1") or die("No se puede crear la conexion"); //modifica el ultimo registro
            //$con->query("update usuario set usuario='mysqli2' where idusuario = 3") or die("No se puede crear la conexion");
            //$con->query("delete from usuario where 1 order by idusuario desc limit 1;") or die("No se puede crear la conexion");//Elimina le ultimo registro insertado
            $con->query("delete from usuario where idusuario = 4") or die("No se puede crear la conexion");


            $sql_statement = "select * from usuario";
            $query = $con->query($sql_statement) or die("No se puede crear la conexion");
                while ($row = $query->fetch_assoc()) {
                    $myArray[] = $row;
                    echo "Usuario ID: {$row['idusuario']} <br>".
                         "Usuario: {$row['usuario']} <br>".
                         "Clave: {$row['clave']} <br>";
                }
                echo json_encode($myArray);
            //$con = null;// se cierra la conexion;
            $con->close();

        //---------------------------------------------------------------------
        //PDO--------------------------------------------------------------------


//            try{
//                $scon = new PDO("mysql:host=localhost:3306;dbname=tsisadb","root","admin");
//                echo "Conexion Exitosa PDO";
//                echo "<br>";
//                $sql = "select * from usuario";
//                foreach ($scon->query($sql) as $row) {
//                    echo $row["usuario"];
//                }
//            }catch(PDOException $e){
//                echo "Error: ".$e->getMessage();
//            }

        //---------------------------------------------------------------------
        ?>
    </body>
</html>
