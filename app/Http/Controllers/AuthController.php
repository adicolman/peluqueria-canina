<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/** Controller de autenticación propio del sitio. */
class AuthController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function showForm()
    {
        return view('auth.login');
    }

    /**
     * Procesa el envío del formulario de inicio de sesión.
     */
    public function processForm(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'El campo email no puede estar vacío.',
            'email.email' => 'El campo email debe ser una dirección de correo válida.',
            'password.required' => 'El campo contraseña no puede estar vacío.',
        ]);

        if (! Auth::attempt($credenciales)) {
            return redirect()
                ->route('auth.login.form')
                ->with('feedback.message', 'Las credenciales utilizadas no coinciden con nuestros registros.')
                ->with('feedback.type', 'danger')
                ->withInput();
        }

        // Las credenciales son correctas: redirigimos al panel admin.
        return redirect()
            ->route('admin.blog.index')
            ->with('feedback.message', 'Sesión iniciada con éxito. ¡Hola de nuevo!');
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function processLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();   // Recrea el ID de sesión.
        $request->session()->regenerateToken(); // Recrea el token de CSRF.

        return redirect()
            ->route('auth.login.form')
            ->with('feedback.message', 'Sesión cerrada con éxito. ¡Te esperamos pronto de nuevo!');
    }
}
