<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicesController extends Controller
{
    /**
     * Listado de todos los servicios activos de la peluquería.
     */
    public function index()
    {
        $services = Service::where('is_active', true)->get();

        return view('services.index', [
            'services' => $services,
        ]);
    }

    /**
     * Detalle de un servicio.
     */
    public function show(int $id)
    {
        // Solo servicios activos: los desactivados no son accesibles por URL.
        $service = Service::where('is_active', true)
            ->findOrFail($id);

        return view('services.show', [
            'service' => $service,
        ]);
    }
}
