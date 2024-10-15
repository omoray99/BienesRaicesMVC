<fieldset>
    <legend>Informacion General </legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="titulo" name="vendedor[nombre]" placeholder="Nombre vendedor(a)"
    value="<?php echo s($vendedor->nombre);  ?>">

    <label for="nombre">Apellido:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido vendedor(a)"
    value="<?php echo s($vendedor->apellido);  ?>">

</fieldset>      

<fieldset>

    <legend>Información Extra</legend>

    <label for="telefono">Telefono:</label>
    <input type="text" id="apellido" name="vendedor[telefono]" placeholder="Telefono vendedor(a)"
    value="<?php echo s($vendedor->telefono);  ?>">

</fieldset>