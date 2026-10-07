<x-layouts.main>
    <x-slot:title>Home</x-slot:title>
    <section class="hero bleed mb-4">
        <div class="hero__contenido">
            <p class="hero__kicker">Peluquería canina y felina</p>
            <h1>Estética premium para una mascota feliz, ¡una familia feliz!</h1>
            <p class="hero__bajada">
                Técnicas suaves, productos naturales y tiempo de sobra para que tu
                mascota se sienta segura en cada visita. Elegí el servicio que
                necesita y agendá tu turno cuando quieras.
            </p>
            <div class="hero__acciones">
                <a href="{{ route('services.index') }}" class="btn btn-primary">
                    Ver servicios
                    <i class="bi bi-arrow-right" aria-hidden="true"></i>
                </a>
                <a href="{{ route('about') }}" class="btn btn-outline-secondary">Conocénos</a>
            </div>
        </div>
        <div class="hero__media">
            <img src="{{ asset('img/hero-mascota.png') }}" alt="Mascota feliz después de su turno de estética">
        </div>
    </section>
    <div class="beneficios pt-1">
        <ul class="beneficios__lista">
            <li>
                <span class="icono">
                    <i class="bi bi-check-lg" aria-hidden="true"></i>
                </span>
                Atención realizada por profesionales
            </li>
            <li>
                <span class="icono">
                    <i class="bi bi-check-lg" aria-hidden="true"></i>
                </span>
                Respetuoso con tu mascota y el planeta
            </li>
            <li>
                <span class="icono">
                    <i class="bi bi-check-lg" aria-hidden="true"></i>
                </span>
                Productos naturales y suaves
            </li>
            <li>
                <span class="icono">
                    <i class="bi bi-check-lg" aria-hidden="true"></i>
                </span>
                Recomendado por veterinarios
            </li>
        </ul>
    </div>
    <section class="container pt-5 pb-5">
        <div class="seccion-titulo">
            <h2>Descubrí lo último</h2>
            <p>
                Combinamos experiencia, productos naturales y muchísimo cariño en cada
                turno. Elegí el servicio que tu mascota necesita y agendá cuando quieras:
                cada visita es una experiencia pensada para ella.
            </p>
            <div class="pildoras" aria-hidden="true">
                <span class="pildora pildora--activa">Estética</span>
                <span class="pildora pildora--inactiva">Guardería</span>
            </div>
        </div>
        @php
            $tonosServicios = ['azul', 'rosa', 'crema'];
        @endphp
        <div class="servicios-grid">
            @foreach($services as $service)
            <article class="card-servicio">
                <a
                    class="card-servicio__media card-servicio__media--{{ $tonosServicios[$loop->index % count($tonosServicios)] }}"
                    href="{{ route('services.show', ['id' => $service->service_id]) }}"
                    aria-label="Ver detalle de {{ $service->name }}"
                ><x-icono-servicio :nombre="$service->name" /></a>
                <p class="card-servicio__etiqueta">Estética · {{ $service->duration }} min</p>
                <h3 class="card-servicio__nombre">
                    <a href="{{ route('services.show', ['id' => $service->service_id]) }}">{{ $service->name }}</a>
                </h3>
                <p class="precio">${{ number_format($service->price, 0, ',', '.') }}</p>
                <a class="btn btn-primary" href="{{ route('services.show', ['id' => $service->service_id]) }}">Ver detalle</a>
            </article>
            @endforeach
        </div>
    </section>
    <svg class="onda bleed" viewBox="0 0 1440 110" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path fill="#a9c6e4" d="M0,64 C180,110 360,20 540,32 C760,46 900,110 1140,96 C1290,87 1380,50 1440,28 L1440,110 L0,110 Z"></path>
    </svg>
    <section class="seccion-azul">
        <div class="container manifiesto">
            <div class="manifiesto__media">
                <img src="{{ asset('img/nosotros-familia.jpg') }}" alt="Familia jugando con sus mascotas en casa">
            </div>
            <div class="manifiesto__texto">
                <h2>En PelUñas creemos que una vida feliz empieza con el BIENESTAR.</h2>
                <p>
                    Más de diez años de experiencia nos enseñaron que la clave es simple:
                    técnicas suaves, productos naturales y tiempo de sobra para que tu
                    mascota se sienta segura en cada visita.
                </p>
                <p>
                    Trabajamos con estándares de cuidado de nivel humano, porque creemos
                    que tu mejor amigo merece exactamente eso.
                </p>
                <p class="cierre">¡Y no olvidemos la porción de amor —siempre!</p>
            </div>
        </div>
    </section>
    <svg class="onda onda--inversa" viewBox="0 0 1440 110" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path fill="#a9c6e4" d="M0,64 C180,110 360,20 540,32 C760,46 900,110 1140,96 C1290,87 1380,50 1440,28 L1440,110 L0,110 Z"></path>
    </svg>
    <section class="container pt-5 pb-5">
        <div class="seccion-titulo">
            <h2>Del diario de PelUñas</h2>
            <p>
                Consejos de higiene, alimentación y bienestar para cuidar a tu mascota
                en casa, entre visita y visita.
            </p>
        </div>
        <div class="tips-grid">
            @forelse($entries as $entry)
            <article class="article-blog">
                <p class="categoria">{{ $entry->category }}</p>
                <h3>
                    <a href="{{ route('blog.show', ['id' => $entry->blog_entry_id]) }}">{{ $entry->title }}</a>
                </h3>
                <p>{{ $entry->excerpt }}</p>
                <p class="fecha">Publicado el {{ \Illuminate\Support\Carbon::parse($entry->published_at)->format('d/m/Y') }}</p>
            </article>
            @empty
            <p>No hay entradas publicadas por el momento.</p>
            @endforelse
        </div>
    </section>
</x-layouts.main>
