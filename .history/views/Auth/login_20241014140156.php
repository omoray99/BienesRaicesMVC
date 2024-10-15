<main class="contenedor seccion contenido-centrado">
    <h1>
        Iniciar Sesión
    </h1>
    <?php foreach($errores as $error):?>
        <div class="alerta error">
            <?php echo $error;  ?>
        </div>
    
    <?php  endforeach;  ?>

    <form method="POST" class="formulario">
        <fieldset><!-- agrupa una serie de campos relacionados -->
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu email" id="email" >

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu password" id="password" >
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

    </form>
</main>