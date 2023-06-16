<?php
session_start();
ini_set('display_errores',1);
?>

<!DOCTYPE html>
<html>
    <body>
    <?php
    
        $usuario = $_POST ["usernam"];
        $contra = $_POST ["passwor"];
       
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "respaldo";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}
     $sql = ("SELECT id, nombre, usernam, passwor FROM usuariosss
      WHERE usernam='$usuario'AND passwor='$contra'");
      $result = $conn->query($sql);

     if ($result->num_rows > 0) {
     $row=$result->fetch_assoc();  
        if ($usuario==$row["usernam"] && $contra==$row["passwor"])

{
    $_SESSION["favcolor"] ="Azul";
    $_SESSION["favanimal"] = "Gato";
    $_SESSION["token"] = "SI";

    echo "Se inicio sesion. ";
} else {
    $_SESSION["token"] = "NO";
    echo "contraseña incorrecta NO se inicio sesion.";
}
}else{
    echo "no existe el usuario";
}

?>

