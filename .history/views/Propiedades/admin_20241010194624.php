<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
        <?php
            if($resultado){
                $mensaje = mostrarNotificacion(intval($resultado));
                if($mensaje) { ?>
                    <p class="alerta exito" > <?php echo s($mensaje) ?>   </p>
                    <?php
                }
                
            }
        ?>      
         

    <a href="/propiedades/crear" class="boton boton-verde"> Nueva Propiedad</a>
    <a href="/vendedores/crear" class="boton boton-amarillo"> Nuevo Vendedor</a>
    <h2> Propiedades   </h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!--  Mostrar resultados -->
            <?php foreach( $propiedades as $propiedad ): ?>
                <tr class="lista">
                    <td><?php echo $propiedad->id; ?> </td>
                    <td><?php echo $propiedad->titulo; ?> </td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen; ?> " class="imagen-tabla" alt=""></td>
                    <td>Gs <?php echo $propiedad->precio; ?> </td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id;  ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <h2> Vendedores</h2>


    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!--  Mostrar resultados -->
            <?php foreach( $vendedores as $vendedor ): ?>
                <tr class="lista">
                    <td><?php echo    $vendedor->id; ?> </td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?> </td>
                    <td> <?php echo $vendedor->telefono; ?> </td>
                    <td>
                        <form method="POST" class="w-100">

                            <input type="hidden" name="id" value="<?php echo $vendedor->id;  ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="admin/Vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</main>