<x-layouts.main>
    <x-slot:title>{{ $entry->title }}</x-slot:title>
    <article class="entrada-blog">
        <header class="entrada-blog__header">
            <p class="categoria">{{ str_replace('-', ' ', $entry->category) }}</p>
            <h1>{{ $entry->title }}</h1>
            <p class="entrada-blog__meta">
                Publicado el {{ \Illuminate\Support\Carbon::parse($entry->published_at)->format('d/m/Y') }}
                · Por el equipo de PelUñas
            </p>
        </header>
        <figure class="entrada-blog__media">
            <x-imagen-categoria :imagen="$entry->image" :categoria="$entry->category" :alt="'Imagen de portada de ' . $entry->title" />
        </figure>
        <div class="entrada-blog__contenido">
            <p>{!! nl2br(e($entry->content)) !!}</p>
        </div>
        <aside class="entrada-blog__nota">
            <strong>¿Por qué es importante?</strong>
            En PelUñas recomendamos aplicar estos consejos con paciencia y
            consistencia. Si notás cualquier cambio en tu mascota, consultanos
            en tu próximo turno.
        </aside>
        <footer class="entrada-blog__pie d-flex justify-content-center flex-wrap gap-3">
            <a class="btn btn-outline-primary" href="{{ route('blog.index') }}">Volver al blog</a>
            <a class="btn btn-primary" href="{{ route('services.index') }}">Ver servicios</a>
        </footer>
    </article>
</x-layouts.main>
