<x-layouts.main>
    <x-slot:title>Blog</x-slot:title>
    <header class="container pagina-titulo">
        <h1>Blog de PelUñas</h1>
        <p>Consejos de higiene, cuidados según la raza, alimentación y bienestar animal.</p>
    </header>
    @auth
    <div class="container mb-3">
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg" aria-hidden="true"></i> Nueva entrada
        </a>
    </div>
    @endauth
    <div class="container entradas-grid pb-5">
        @forelse($entries as $entry)
        <article class="entrada-card">
            <a class="entrada-card__media" href="{{ route('blog.show', ['id' => $entry->blog_entry_id]) }}">
                <x-imagen-categoria :imagen="$entry->image" :categoria="$entry->category" :alt="'Imagen de portada de ' . $entry->title" />
                <span class="categoria">{{ str_replace('-', ' ', $entry->category) }}</span>
            </a>
            <div class="entrada-card__cuerpo">
                <p class="fecha">Publicado el {{ \Illuminate\Support\Carbon::parse($entry->published_at)->format('d/m/Y') }}</p>
                <h2>
                    <a href="{{ route('blog.show', ['id' => $entry->blog_entry_id]) }}">{{ $entry->title }}</a>
                </h2>
                <p class="entrada-card__extracto">{{ $entry->excerpt }}</p>
                <a class="entrada-card__leer" href="{{ route('blog.show', ['id' => $entry->blog_entry_id]) }}">Leer nota</a>
                @auth
                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('admin.blog.edit', ['id' => $entry->blog_entry_id]) }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-pencil" aria-hidden="true"></i> Editar
                    </a>
                    <a href="{{ route('admin.blog.delete', ['id' => $entry->blog_entry_id]) }}" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-trash" aria-hidden="true"></i> Eliminar
                    </a>
                </div>
                @endauth
            </div>
        </article>
        @empty
        <p>No hay entradas publicadas por el momento.</p>
        @endforelse
    </div>
</x-layouts.main>
