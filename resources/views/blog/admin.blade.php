<x-layouts.main>
    <x-slot:title>Administrar blog</x-slot:title>
    <header class="container d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4 mt-5">
        <div>
            <h1 class="mb-1">Administrar blog</h1>
            <p class="text-muted mb-0">Creá, editá y eliminá las entradas del blog.</p>
        </div>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg" aria-hidden="true"></i> Nueva entrada
        </a>
    </header>
    <div class="container pb-5">
        <div class="tabla-admin__tarjeta">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 tabla-admin">
                    <thead>
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Fecha de publicación</th>
                            <th scope="col">Estado</th>
                            <th scope="col" class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($entries as $entry)
                        <tr>
                            <td>
                                <span class="fw-semibold">{{ $entry->title }}</span>
                            </td>
                            <td>{{ $entry->category }}</td>
                            <td>{{ \Illuminate\Support\Carbon::parse($entry->published_at)->format('d/m/Y') }}</td>
                            <td>
                                @if($entry->is_published)
                                <span class="badge bg-success rounded-pill">
                                    <i class="bi bi-check-circle me-1" aria-hidden="true"></i>Publicada
                                </span>
                                @else
                                <span class="badge bg-secondary rounded-pill">
                                    <i class="bi bi-pencil-square me-1" aria-hidden="true"></i>Borrador
                                </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="{{ route('blog.show', ['id' => $entry->blog_entry_id]) }}" class="btn btn-sm btn-icono btn-outline-secondary" title="Ver" aria-label="Ver entrada {{ $entry->title }}">
                                        <i class="bi bi-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.blog.edit', ['id' => $entry->blog_entry_id]) }}" class="btn btn-sm btn-icono btn-outline-secondary" title="Editar" aria-label="Editar entrada {{ $entry->title }}">
                                        <i class="bi bi-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.blog.delete', ['id' => $entry->blog_entry_id]) }}" class="btn btn-sm btn-icono btn-outline-danger" title="Eliminar" aria-label="Eliminar entrada {{ $entry->title }}">
                                        <i class="bi bi-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-inbox d-block display-5 mb-2" aria-hidden="true"></i>
                                No hay entradas cargadas.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.main>
