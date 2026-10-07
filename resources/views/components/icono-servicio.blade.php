@props(['nombre'])
@php
    $iconos = [
        'Baño completo' => 'bi-droplet',
        'Corte de pelo' => 'bi-scissors',
        'Limpieza de oídos' => 'bi-ear',
        'Corte de uñas' => 'bi-hand-index-thumb',
        'Tratamiento estético' => 'bi-stars',
    ];
@endphp
<i class="icono-servicio bi {{ $iconos[$nombre] ?? 'bi-star' }}" aria-hidden="true"></i>
