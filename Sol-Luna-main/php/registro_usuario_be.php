<?php 

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO usuario(nombre_completo, correo, nombre_usuario, contrasena) 
            VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    //Evitar repetición de correo en la base de datos.
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0) {
        echo '
        <script>
            alert("Este correo ya está asignado a una cuenta, intenta con otro diferente.");
            window.location =  "../login&register.php";       
        </script>
         ';

         exit();
    } 

    //Evitar repetición de nombre de usuario en la base de datos.
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE nombre_usuario='$usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0) {
        echo '
        <script>
            alert("Este nombre de usuario ya está asignado a una cuenta, intenta con otro diferente.");
            window.location =  "../login&register.php";       
        </script>
         ';

         exit();
    } 


    $ejecutar = mysqli_query($conexion, $query);

        if($ejecutar){
            echo '
            <script>
                alert("Te registraste exitosamente");
                window.location.href = "../index.php";
            </script>
            ';

        } else{
            echo '
            <script>
                alert("Intentelo nuevamente, no se pudo registrar");
                window.location.href = "../index.php";
            </script>
            ';
        }
        mysqli_close($conexion);
?>