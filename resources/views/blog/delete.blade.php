<x-layouts.main>
    <x-slot:title>Eliminar: {{ \Illuminate\Support\Str::limit($entry->title, 40) }}</x-slot:title>
    <section class="container mt-5 mb-5">
        <header class="text-center mb-4">
            <h1>Eliminar entrada</h1>
            <p class="text-muted">Revisá bien la entrada antes de confirmar.</p>
        </header>
        <div class="formulario-admin">
            <dl class="mb-4">
                <dt>Título</dt>
                <dd>{{ $entry->title }}</dd>
                <dt>Categoría</dt>
                <dd>{{ str_replace('-', ' ', $entry->category) }}</dd>
                <dt>Fecha de publicación</dt>
                <dd>{{ \Illuminate\Support\Carbon::parse($entry->published_at)->format('d/m/Y') }}</dd>
                <dt>Estado</dt>
                <dd>{{ $entry->is_published ? 'Publicada' : 'Borrador' }}</dd>
            </dl>
            <div class="alert alert-warning d-flex align-items-start gap-2 mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill mt-1" aria-hidden="true"></i>
                <div>
                    ¿Seguro que querés eliminar esta entrada?
                    Esta acción no se puede deshacer.
                </div>
            </div>
            <form action="{{ route('admin.blog.destroy', ['id' => $entry->blog_entry_id]) }}" method="post" class="d-flex gap-2">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash" aria-hidden="true"></i> Sí, eliminar
                </button>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left" aria-hidden="true"></i> Cancelar
                </a>
            </form>
        </div>
    </section>
</x-layouts.main>
