<?php

namespace App\Http\Controllers;

use App\Models\BlogEntry;
use App\Models\Service;

class HomeController extends Controller
{
    /**
     * Muestra la home del sitio: presenta la peluquería y
     * sus servicios destacados.
     */
    public function index()
    {
        // Mostramos hasta 4 servicios destacados en la home.
        $services = Service::where('is_active', true)
            ->take(4)
            ->get();

        $entries = BlogEntry::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('home', [
            'services' => $services,
            'entries' => $entries,
        ]);
    }

    /**
     * Muestra la página "Nosotros".
     */
    public function about()
    {
        return view('about');
    }
}
