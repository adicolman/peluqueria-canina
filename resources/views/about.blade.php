<x-layouts.main>
    <x-slot:title>Nosotros</x-slot:title>
    <header class="container pagina-titulo">
        <h1>Sobre nosotros</h1>
        <p>
            PelUñas es una peluquería de mascotas nacida con una misión simple:
            que cada perro y gato se sienta cómodo, limpio y feliz.
        </p>
    </header>
    <section class="container nosotros-historia">
        <figure class="nosotros-historia__media">
            <img src="{{ asset('img/nuestra-historia.jpg') }}" alt="El local de PelUñas, con espacios de estética y guardería">
        </figure>
        <div class="nosotros-historia__texto">
            <p class="etiqueta-seccion">Nuestra historia</p>
            <h2>Empezamos con una tijera, una bañera y mucha paciencia</h2>
            <p>
                PelUñas abrió sus puertas hace más de diez años con una idea en la
                cabeza: que ninguna mascota debía tener miedo de ir a la peluquería.
                Por eso armamos un espacio tranquilo, con turnos sin apuro y
                profesionales que respetan el ritmo de cada animal.
            </p>
            <p>
                Ofrecemos baño, corte de pelo, limpieza de oídos, corte de uñas y
                tratamientos estéticos, siempre con productos naturales y un trato
                amable. Y entre visita y visita seguimos cerca a través del
                <a href="{{ route('blog.index') }}">blog</a>, donde compartimos
                consejos de higiene, alimentación y bienestar para que puedas cuidar
                a tu compañero en casa.
            </p>
        </div>
    </section>
    <section class="pt-3 pb-2">
        <div class="seccion-titulo">
            <h2>En qué creemos</h2>
            <p>Los cuatro compromisos que guían cada turno de la peluquería.</p>
        </div>
        <div class="container valores-grid">
            <article class="valor-card">
                <span class="valor-card__icono">
                    <i class="bi bi-clock" aria-hidden="true"></i>
                </span>
                <h3>Cariño sin apuro</h3>
                <p>Cada turno tiene el tiempo que tu mascota necesita: sin estrés y sin presión.</p>
            </article>
            <article class="valor-card">
                <span class="valor-card__icono">
                    <i class="bi bi-leaf" aria-hidden="true"></i>
                </span>
                <h3>Productos naturales</h3>
                <p>Fórmulas hipoalergénicas, amables con la piel y el pelaje de tu mejor amigo.</p>
            </article>
            <article class="valor-card">
                <span class="valor-card__icono">
                    <i class="bi bi-scissors" aria-hidden="true"></i>
                </span>
                <h3>Manos expertas</h3>
                <p>Profesionales capacitados, recomendados por veterinarios de la zona.</p>
            </article>
            <article class="valor-card">
                <span class="valor-card__icono">
                    <i class="bi bi-shield-check" aria-hidden="true"></i>
                </span>
                <h3>Estándar humano</h3>
                <p>El mismo nivel de atención que queremos para nosotros, aplicado a ellos.</p>
            </article>
        </div>
    </section>
    <div class="container cifras rounded-4 mb-5">
        <div class="cifra">
            <span class="cifra__numero">+10</span>
            <span class="cifra__texto">años de experiencia</span>
        </div>
        <div class="cifra">
            <span class="cifra__numero">5</span>
            <span class="cifra__texto">servicios a medida</span>
        </div>
        <div class="cifra">
            <span class="cifra__numero">+1.500</span>
            <span class="cifra__texto">mascotas atendidas</span>
        </div>
        <div class="cifra">
            <span class="cifra__numero">100%</span>
            <span class="cifra__texto">productos naturales</span>
        </div>
    </div>
</x-layouts.main>
