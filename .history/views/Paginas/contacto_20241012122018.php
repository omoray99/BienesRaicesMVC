<main class="contenedor seccion">
        <h1>
            Contacto
        </h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jepg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>
        <h2>Llene el formulario de Contacto</h2>
        <form class="formulario" action="/contacto" method="POST">
            <fieldset><!-- agrupa una serie de campos relacionados -->
                <legend>Informacion personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu email" id="email" name="contacto[email]">
                
                <label for="telefono">telefono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]">

                <label for="mensaje">Mensaje:</label>
                <textarea  id="mensaje" name="contacto[mensaje]"></textarea>
            </fieldset>

            <fieldset>
                <legend> Información sobre la propiedad</legend>
                <label for="opciones">Vende o compra:</label>
                <select id="opciones" name="contacto[tipo]">
                    <option value="" disabled selected>-- seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Precio o Presupuesto" id="presupuesto" name="contacto[precio]">
            </fieldset>

            <fieldset>
                <legend> Contacto</legend>
                <p>Como desea ser contactado?</p>
                <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]"> 

                <label for="contactar-email">E-mail</label>
                <input name="contacto" type="radio" value="email" id="contactar-email" name="contacto[contacto]" > 
                </div>

                <p>Si eligió teléfono, elija la fecha y la hora para ser contactado</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="contacto[fecha]">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>