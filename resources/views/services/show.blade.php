<x-layouts.main>
    <x-slot:title>{{ $service->name }}</x-slot:title>
    <article class="detalle-servicio">
        <header class="detalle-servicio__header">
            <span class="detalle-servicio__icono">
                <x-icono-servicio :nombre="$service->name" />
            </span>
            <p class="etiqueta-seccion">Estética</p>
            <h1>{{ $service->name }}</h1>
        </header>
        <div class="detalle-servicio__texto">
            <p>{{ $service->description }}</p>
        </div>
        <aside class="detalle-servicio__card">
            <dl class="mb-0">
                <dt>Precio</dt>
                <dd class="precio">${{ number_format($service->price, 0, ',', '.') }}</dd>
                <dt>Duración estimada</dt>
                <dd class="detalle-servicio__duracion">{{ $service->duration }} minutos</dd>
            </dl>
        </aside>
        <nav class="detalle-servicio__pie d-flex justify-content-center flex-wrap gap-3" aria-label="Navegación del servicio">
            <a class="btn btn-primary" href="{{ route('services.index') }}">Ver todos los servicios</a>
            <a class="btn btn-outline-secondary" href="{{ route('index') }}">Volver al inicio</a>
        </nav>
    </article>
</x-layouts.main>
