<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/** Modelo que representa un servicio de la peluquería. */
class Service extends Model
{
    /** Primary key personalizada (no usa "id"). */
    protected $primaryKey = 'service_id';

    /** Campos aceptados en mass assignment. */
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
        'is_active',
    ];

    /**
     * Accessor y mutator del precio: se guarda en centavos.
     *
     * Ej: al leer 3000000 => $30.000,00
     */
    public function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }
}
