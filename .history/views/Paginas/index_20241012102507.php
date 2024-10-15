<main class="contenedor seccion">
        <h1>
            Más sobre Nosotros
        </h1>
        <?php  include 'iconos.php' ?>


<!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-community" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
  <path d="M13 7l0 .01" />
  <path d="M17 7l0 .01" />
  <path d="M17 11l0 .01" />
  <path d="M17 15l0 .01" />
</svg>  -->

    </main>
    <section class="seccion contenedor">
        <h2>Casas y depas en venta En todo el Pais </h2>
            <?php
                include 'listado.php';
            
            ?>
        <div class="alinear-derecha" >
            <a href="/propiedades" class="boton-verde">Ver todas</a>
        </div>
        
    </section>

    <section class="imagen-contacto" >
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo en la brevedad</p>
        <a href="contacto.html" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp"  type="image/webp">
                        <source srcset="build/img/blog1.jpg"  type="image/jpeg">

                        <img  loading="lazy" src="build/img/blog1.jpg" alt="texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>10/07/2024 </span>por: <span>Admin</span></p>
                        <p>
                            consejos para construir una terraza en el techo de tu casa con los mejores materiales
                            y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp"  type="image/webp">
                        <source srcset="build/img/blog2.jpg"  type="image/jpeg">

                        <img  loading="lazy" src="build/img/blog2.jpg" alt="texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>10/07/2024 </span>por: <span>Admin</span></p>
                        <p>
                            Maximizar el espacio de tu casa con esta guia, aprende a combinar muebles y
                            colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3> Testimoniales</h3>
            
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me
                    ofrecieron cumple con todas mis expectativas, Excelente!
                </blockquote>
                <p> -Osvaldo Moray</p>
            </div>
        </section>
    </div>