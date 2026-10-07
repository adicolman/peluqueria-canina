<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }} :: PelUñas</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ url('css/style.css') }}">
    </head>
    <body>
        <div id="app">
            <header class="site-header">
                <nav class="navbar navbar-expand-lg" aria-label="Principal">
                    <div class="container">
                        <a class="navbar-brand marca" href="{{ route('index') }}">peluñas</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Menú de navegación">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav mx-auto gap-1">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('services.index') }}">Servicios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about') }}">Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                                </li>
                            </ul>
                            <div class="d-flex align-items-center gap-3">
                                @auth
                                <div class="dropdown">
                                    <button class="icono-link icono-cuenta" type="button" id="menuUsuario" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Menú de usuario">
                                        <i class="bi bi-person" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuUsuario">
                                        <li>
                                            <span class="dropdown-item-text fw-semibold">{{ auth()->user()->name }}</span>
                                        </li>
                                        <li>
                                            <span class="dropdown-item-text small text-muted">{{ auth()->user()->email }}</span>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.blog.index') }}">
                                                <i class="bi bi-journal-text me-2" aria-hidden="true"></i>Administrar blog
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('auth.logout.process') }}" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="dropdown-item">
                                                    <i class="bi bi-box-arrow-right me-2" aria-hidden="true"></i>Cerrar sesión
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                @else
                                <div class="dropdown">
                                    <button class="icono-link icono-cuenta" type="button" id="menuUsuario" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Menú de usuario">
                                        <i class="bi bi-person" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuUsuario">
                                        <li>
                                            <span class="dropdown-item-text small text-muted">No has iniciado sesión</span>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('auth.login.form') }}">
                                                <i class="bi bi-box-arrow-in-right me-2" aria-hidden="true"></i>Iniciar sesión
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                @endauth
                                <span class="icono-link" aria-hidden="true">
                                    <i class="bi bi-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <main class="contenido-principal">
                @if(session()->has('feedback.message'))
                    <div class="container alert alert-{{ session('feedback.type', 'success') }} mt-3">{{ session('feedback.message') }}</div>
                @endif
                {{ $slot }}
            </main>
            <footer class="footer">
                <div class="footer__contenido">
                    <div class="footer__grid">
                        <div>
                            <p class="footer__marca">peluñas</p>
                            <p class="footer__texto">Estética, bienestar y cariño para que tu mascota luzca y se sienta increíble.</p>
                        </div>
                        <div>
                            <h2>Navegación</h2>
                            <ul>
                                <li><a href="{{ route('services.index') }}">Servicios</a></li>
                                <li><a href="{{ route('about') }}">Nosotros</a></li>
                                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                                <li><a href="{{ route('auth.login.form') }}">Iniciar sesión</a></li>
                            </ul>
                        </div>
                        <div class="footer__contacto">
                            <h2>Contacto</h2>
                            <ul>
                                <li>Av. Siempreviva 742 — Springfield</li>
                                <li>+54 11 5555-5555</li>
                                <li>hola@pelunas.com</li>
                                <li>Lun a Vie 9 a 18 h · Sáb 9 a 14 h</li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer__bottom">
                        PelUñas &copy; 2026 — Peluquería de mascotas. Todos los derechos reservados.
                    </div>
                </div>
            </footer>
            <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
        </div>
    </body>
</html>
