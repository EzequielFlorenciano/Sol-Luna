<?php 

session_start();


include 'conexion_be.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo' and contrasena='$contrasena'");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $correo;
    header("location: ../index.php");
    exit;
} else {
    echo '
     <script>
          alert("Usuario no encontrado, verifica los datos o registrate si no tenés cuenta.");
         window.location = "../login&register.php";
    </script>
            ';
        exit;
    }

?>