<?php
session_start();

if(!isset($_SESSION['usuario'])) {
    echo '
            <script>
                alert("Por favor, inicia sesión.");
                window.location = "login&register.php";
            </script>
        ';
        session_destroy();
        header("Location: login&register.php");
    
    die();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sol&Luna</title>
    <link rel="stylesheet" href="css/style-index.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
   
</head>
<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar">
    <div class="navbar-overlay" onclick="toggleMenuOpen()"></div>

        <button type="button" class="navbar-burger" onclick="toggleMenuOpen()">
            <span class="material-icons">menu</span>
        </button>

        <nav class="navbar-title">Sol&Luna</nav>
        <nav class="navbar-menu">
            
            <a href="#sobre-nosotros" type="button" href=""> Sobre Nosotros </a>
            <a href="#reservas" type="button" href=""> Reservas </a>
            <a type="button" href="php/cerrar_sesion.php"> Cerrar Sesión </a>
        </nav>

    </nav>
    <script src="js/index.js"></script>
    </header>

    <!-- Contenido de la página -->
    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Disfruta tus vacaciones a lo grande</h1>
                    <p>Tempor erat elitr rebum at clita diam amet diam et eos erat ipsum lorem sit</p>
                </div>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <div class="feature">
                    <i class="material-icons">beach_access</i>
                    <h2>Playas impresionantes</h2>
                    <p>Descubre nuestras playas paradisíacas y relájate bajo el sol.</p>
                </div>
                <div class="feature">
                    <i class="material-icons">local_dining</i>
                    <h2>Gastronomía única</h2>
                    <p>Deléitate con nuestra deliciosa comida local y experiencias culinarias.</p>
                </div>
                <div class="feature">
                    <i class="material-icons">spa</i>
                    <h2>Relajación total</h2>
                    <p>Relájate en nuestros spas y disfruta de tratamientos de bienestar.</p>
                </div>
            </div>
        </section>
        
    </main>
    <section id= "reservas" class="reservation-options">
    <div class="container">
        <h2>Reserva tu bungalow</h2>
        <p>Elige tu alojamiento ideal y disfruta de unas vacaciones inolvidables.</p>
        <div class="bungalow-options">
            <div class="bungalow-option">
                <img src="images/exterior.jpg" alt="Bungalow 1">
                <p>Bungalow 1</p>
                <a href="reservar.php?bungalow=1">Reservar</a>
            </div>

            <!-- Agrega más opciones de bungalows según sea necesario -->
        </div>
    </div>
</section>

    <section id= "sobre-nosotros">
                <div class="feature">
                 <h2>Sobre Nosotros</h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus bibendum accumsan viverra. Cras at efficitur justo. Nam faucibus eu mauris ac vestibulum. Suspendisse potenti. Vestibulum vitae volutpat quam. Ut vel auctor ipsum. Nullam eget tempus quam. Maecenas dapibus lacus in turpis blandit bibendum. Etiam sit amet lorem tempor, mattis lacus nec, sagittis urna. Maecenas cursus mi eget accumsan condimentum. Nunc quis rutrum enim, a ultrices quam. Maecenas sit amet ultricies diam, a varius elit. Nunc diam purus, posuere ac quam quis, laoreet semper eros. Sed et sagittis urna. Maecenas tristique, ligula eu pulvinar maximus, magna orci cursus augue, eget dictum sem sapien in ex. Aenean lobortis mi id tincidunt dignissim</p>   
             </div> 
    </section>

    <footer>
        <!-- Pie de página y contenido posterior -->
    </footer>

    <script src="js/index.js"></script>
</body>
</html>
    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Sol&Luna. Todos los derechos reservados.</p>
        </div>
    </footer>
        

    <script src="js/index.js"></script> 
</body>
</html>