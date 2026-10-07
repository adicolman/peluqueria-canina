<?php

namespace App\Http\Controllers;

use App\Models\BlogEntry;

class BlogController extends Controller
{
    /**
     * Listado de las entradas publicadas del blog.
     */
    public function index()
    {
        $entries = BlogEntry::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->get();

        return view('blog.index', [
            'entries' => $entries,
        ]);
    }

    /**
     * Detalle de una entrada del blog.
     */
    public function show(int $id)
    {
        // Solo entradas publicadas: el borrador no es accesible por URL.
        $entry = BlogEntry::where('is_published', true)
            ->findOrFail($id);

        return view('blog.show', [
            'entry' => $entry,
        ]);
    }
}
