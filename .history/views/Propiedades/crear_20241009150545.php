<main class="contenedor seccion">
    <h1> crear </h1>

    foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    
    <form class="formulario" method="POST">

        <?php include __DIR__ . '/formulario.php'   ?>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>


</main>