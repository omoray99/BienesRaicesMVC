
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="icon" href="../public/build/img/casa.jpeg">
    <link rel="stylesheet" href="/build/css/app.css">

</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header"> <!-- es para centrar el contenido de header -->
            <div class="barra">
                <a href="/">
                    <img class="logo-header" src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>
                <div class="mobile-menu" >
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="">
                    <nav class="navegacion" >
                        <a href="nosotros.php">Nosotros</a>  <!-- a*4-->
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php"> Contacto</a>
                        <?php if(!$auth):  ?>
                            <a href="login.php"> Iniciar Sesión</a>
                        <?php endif; ?>
                        <?php if($auth):  ?>
                            <a href="cerrar-sesion.php"> Cerrar Sesión  </a>
                        <?php endif; ?>
                    </nav>
                </div>
               
            </div> <!-- Cierre de la barra-->

            <?php if($inicio) { ?>   
                <h1>Venta de casas y Departamentos exclusivos de lujos </h1>
            <?php  } ?>
        </div>

    </header> 

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion" >
                <a href="nosotros.html">Nosotros</a>  <!-- a*4-->
                <a href="anuncios.html">Anuncios</a>
                <a href="blog.html">Blog</a>
                <a href="contacto.html"> Contacto</a>
            </nav>

            <p class="copyright"> Todos los derechos reservados Por Osvaldo Moray <?php  echo date('d-m-Y');   ?> &copy;</p>
        </div>
    </footer>

    <script src="/build/js/bundle.min.js" ></script>
</body>
</html>