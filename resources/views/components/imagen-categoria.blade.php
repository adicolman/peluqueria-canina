@props(['imagen' => null, 'categoria', 'alt' => ''])
@php
    $imagenes = [
        'higiene' => 'blog-higiene.jpg',
        'alimentacion' => 'blog-alimentacion.jpg',
        'cuidados-por-raza' => 'blog-cuidados-por-raza.jpg',
        'bienestar' => 'blog-bienestar.jpg',
    ];
    $archivo = $imagenes[$categoria] ?? 'blog-entrada.svg';
    if (!empty($imagen)) {
        $archivo = $imagen;
    }
    // Si el archivo está en el storage público (subido desde el admin),
    // lo mostramos con Storage::url(); si no, es un archivo de public/img.
    $src = (!empty($imagen) && \Storage::disk('public')->exists($imagen))
        ? \Storage::disk('public')->url($imagen)
        : asset('img/' . $archivo);
    $textoAlt = $alt !== ''
        ? $alt
        : 'Imagen de la categoría ' . str_replace('-', ' ', $categoria);
@endphp
<img src="{{ $src }}" alt="{{ $textoAlt }}" {{ $attributes }}>
