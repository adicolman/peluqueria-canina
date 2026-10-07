<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/** ABM de las entradas del blog (protegido por middleware auth). */
class BlogController extends Controller
{
    /**
     * Listado de todas las entradas (incluye borradores),
     * para administrar desde el panel.
     */
    public function index()
    {
        $entries = BlogEntry::orderBy('published_at', 'desc')->get();

        return view('blog.admin', [
            'entries' => $entries,
        ]);
    }

    /**
     * Muestra el formulario para crear una entrada nueva.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Recibe el formulario de creación y persiste la entrada.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'excerpt' => 'required|max:255',
            'content' => 'required|min:20',
            'category' => 'required|max:50',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'required|date_format:Y-m-d',
            'is_published' => 'required|boolean',
        ], [
            'title.required' => 'El campo título no puede estar vacío.',
            'title.min' => 'El campo título debe tener al menos :min caracteres.',
            'title.max' => 'El campo título no puede superar :max caracteres.',
            'excerpt.required' => 'El campo extracto no puede estar vacío.',
            'excerpt.max' => 'El campo extracto no puede superar :max caracteres.',
            'content.required' => 'El campo contenido no puede estar vacío.',
            'content.min' => 'El campo contenido debe tener al menos :min caracteres.',
            'category.required' => 'El campo categoría no puede estar vacío.',
            'category.max' => 'El campo categoría no puede superar :max caracteres.',
            'image.image' => 'El campo imagen debe ser un archivo de imagen válido.',
            'image.max' => 'El campo imagen no puede superar :max KB.',
            'published_at.required' => 'El campo fecha de publicación no puede estar vacío.',
            'published_at.date_format' => 'El campo fecha de publicación debe ser una fecha válida (aaaa-mm-dd).',
            'is_published.required' => 'Debe indicar si la entrada está publicada o en borrador.',
            'is_published.boolean' => 'El valor de publicación no es válido.',
        ]);

        $data = $request->input();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blog', 'public');
        }

        $entry = BlogEntry::create($data);

        return redirect()
            ->route('admin.blog.index')
            ->with('feedback.message', 'La entrada '.$entry->title.' se creó con éxito.');
    }

    /**
     * Muestra el formulario para editar una entrada existente.
     */
    public function edit(int $id)
    {
        return view('blog.edit', [
            'entry' => BlogEntry::findOrFail($id),
        ]);
    }

    /**
     * Recibe el formulario de edición y actualiza la entrada.
     */
    public function update(int $id, Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'excerpt' => 'required|max:255',
            'content' => 'required|min:20',
            'category' => 'required|max:50',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'required|date_format:Y-m-d',
            'is_published' => 'required|boolean',
        ], [
            'title.required' => 'El campo título no puede estar vacío.',
            'title.min' => 'El campo título debe tener al menos :min caracteres.',
            'title.max' => 'El campo título no puede superar :max caracteres.',
            'excerpt.required' => 'El campo extracto no puede estar vacío.',
            'excerpt.max' => 'El campo extracto no puede superar :max caracteres.',
            'content.required' => 'El campo contenido no puede estar vacío.',
            'content.min' => 'El campo contenido debe tener al menos :min caracteres.',
            'category.required' => 'El campo categoría no puede estar vacío.',
            'category.max' => 'El campo categoría no puede superar :max caracteres.',
            'image.image' => 'El campo imagen debe ser un archivo de imagen válido.',
            'image.max' => 'El campo imagen no puede superar :max KB.',
            'published_at.required' => 'El campo fecha de publicación no puede estar vacío.',
            'published_at.date_format' => 'El campo fecha de publicación debe ser una fecha válida (aaaa-mm-dd).',
            'is_published.required' => 'Debe indicar si la entrada está publicada o en borrador.',
            'is_published.boolean' => 'El valor de publicación no es válido.',
        ]);

        $entry = BlogEntry::findOrFail($id);
        $oldImage = $entry->image;

        $data = $request->input();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blog', 'public');
        }

        $entry->update($data);

        // Si se subió una imagen nueva, borramos la anterior del storage.
        if ($request->hasFile('image') && $oldImage != null && Storage::disk('public')->exists($oldImage)) {
            Storage::disk('public')->delete($oldImage);
        }

        return redirect()
            ->route('admin.blog.index')
            ->with('feedback.message', 'La entrada '.$entry->title.' se actualizó con éxito.');
    }

    /**
     * Muestra la pantalla de confirmación para eliminar una entrada.
     */
    public function delete(int $id)
    {
        return view('blog.delete', [
            'entry' => BlogEntry::findOrFail($id),
        ]);
    }

    /**
     * Elimina la entrada y, si tenía imagen subida, el archivo del storage.
     */
    public function destroy(int $id)
    {
        $entry = BlogEntry::findOrFail($id);

        $entry->delete();

        if ($entry->image != null && Storage::disk('public')->exists($entry->image)) {
            Storage::disk('public')->delete($entry->image);
        }

        return redirect()
            ->route('admin.blog.index')
            ->with('feedback.message', 'La entrada '.$entry->title.' se eliminó con éxito.');
    }
}
