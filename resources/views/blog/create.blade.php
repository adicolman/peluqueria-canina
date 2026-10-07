<x-layouts.main>
    <x-slot:title>Nueva entrada</x-slot:title>
    <section class="container mt-5 mb-5">
        <header class="text-center mb-4">
            <h1>Nueva entrada de blog</h1>
            <p class="text-muted">Completá los datos para sumar una nota al blog.</p>
        </header>
        @if($errors->any())
        <div class="alert alert-danger">Algunos de los datos ingresados tienen errores. Por favor, revisá el formulario e intentá de nuevo.</div>
        @endif
        <form
            action="{{ route('admin.blog.store') }}"
            method="post"
            enctype="multipart/form-data"
            class="formulario-admin"
        >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    @class([
                        'form-control',
                        'is-invalid' => $errors->has('title'),
                    ])
                    @error('title')
                    aria-invalid="true"
                    aria-errormessage="error-title"
                    @enderror
                    value="{{ old('title') }}"
                >
                @error('title')
                <div class="invalid-feedback" id="error-title">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="excerpt" class="form-label">Extracto</label>
                <input
                    type="text"
                    id="excerpt"
                    name="excerpt"
                    @class([
                        'form-control',
                        'is-invalid' => $errors->has('excerpt'),
                    ])
                    @error('excerpt')
                    aria-invalid="true"
                    aria-errormessage="error-excerpt"
                    @enderror
                    value="{{ old('excerpt') }}"
                >
                <div class="form-text">Resumen breve que se muestra en el listado.</div>
                @error('excerpt')
                <div class="invalid-feedback" id="error-excerpt">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenido</label>
                <textarea
                    id="content"
                    name="content"
                    rows="8"
                    @class([
                        'form-control',
                        'is-invalid' => $errors->has('content'),
                    ])
                    @error('content')
                    aria-invalid="true"
                    aria-errormessage="error-content"
                    @enderror
                >{{ old('content') }}</textarea>
                @error('content')
                <div class="invalid-feedback" id="error-content">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Categoría</label>
                <input
                    type="text"
                    id="category"
                    name="category"
                    @class([
                        'form-control',
                        'is-invalid' => $errors->has('category'),
                    ])
                    @error('category')
                    aria-invalid="true"
                    aria-errormessage="error-category"
                    @enderror
                    value="{{ old('category') }}"
                >
                <div class="form-text">Ej: higiene, alimentacion, cuidados-por-raza, bienestar.</div>
                @error('category')
                <div class="invalid-feedback" id="error-category">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen de portada</label>
                <input
                    type="file"
                    id="image"
                    name="image"
                    @class([
                        'form-control',
                        'is-invalid' => $errors->has('image'),
                    ])
                    @error('image')
                    aria-invalid="true"
                    aria-errormessage="error-image"
                    @enderror
                >
                <div class="form-text">Formatos JPG, PNG o WEBP de hasta 2 MB. Opcional: si no se elige un archivo, se usa la imagen de la categoría.</div>
                @error('image')
                <div class="invalid-feedback" id="error-image">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="published_at" class="form-label">Fecha de publicación</label>
                <input
                    type="date"
                    id="published_at"
                    name="published_at"
                    @class([
                        'form-control',
                        'is-invalid' => $errors->has('published_at'),
                    ])
                    @error('published_at')
                    aria-invalid="true"
                    aria-errormessage="error-published_at"
                    @enderror
                    value="{{ old('published_at') }}"
                >
                @error('published_at')
                <div class="invalid-feedback" id="error-published_at">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="hidden" name="is_published" value="0">
                <input
                    type="checkbox"
                    id="is_published"
                    name="is_published"
                    value="1"
                    @class([
                        'form-check-input',
                        'is-invalid' => $errors->has('is_published'),
                    ])
                    @error('is_published')
                    aria-invalid="true"
                    aria-errormessage="error-is_published"
                    @enderror
                    @checked(old('is_published'))
                >
                <label for="is_published" class="form-check-label">Publicar inmediatamente</label>
                @error('is_published')
                <div class="invalid-feedback" id="error-is_published">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg" aria-hidden="true"></i> Guardar entrada
                </button>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left" aria-hidden="true"></i> Cancelar
                </a>
            </div>
        </form>
    </section>
</x-layouts.main>
