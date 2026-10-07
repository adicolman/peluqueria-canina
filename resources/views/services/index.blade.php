<x-layouts.main>
    <x-slot:title>Servicios</x-slot:title>

    <header class="container pagina-titulo">
        <h1>Nuestros servicios</h1>
        <p>Todos nuestros servicios incluyen evaluación previa de la mascota.</p>
    </header>

@php
    $tonosServicios = ['azul', 'rosa', 'crema'];
@endphp

    <div class="container servicios-grid pb-5">
        @foreach($services as $service)
        <article class="card-servicio">
            <a
                class="card-servicio__media card-servicio__media--{{ $tonosServicios[$loop->index % count($tonosServicios)] }}"
                href="{{ route('services.show', ['id' => $service->service_id]) }}"
                aria-label="Ver detalle de {{ $service->name }}"
            ><x-icono-servicio :nombre="$service->name" /></a>
            <p class="card-servicio__etiqueta">Estética · {{ $service->duration }} min</p>
            <h2 class="card-servicio__nombre">
                <a href="{{ route('services.show', ['id' => $service->service_id]) }}">{{ $service->name }}</a>
            </h2>
            <p class="precio">${{ number_format($service->price, 0, ',', '.') }}</p>
            <a class="btn btn-primary" href="{{ route('services.show', ['id' => $service->service_id]) }}">Ver detalle</a>
        </article>
        @endforeach
    </div>
</x-layouts.main>
