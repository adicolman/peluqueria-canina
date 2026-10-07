<x-layouts.main>
    <x-slot:title>Iniciar sesión</x-slot:title>
    <section class="container">
    <div class="pagina-titulo text-center">
        <h1>Iniciar sesión</h1>
        <p class="text-muted">Panel de administración del blog.</p>
    </div>
    @if($errors->any())
    <div class="alert alert-danger">Algunos de los datos ingresados tienen errores. Por favor, revisá el formulario e intentá de nuevo.</div>
    @endif
    <form
        action="{{ route('auth.login.process') }}"
        method="post"
        class="formulario-tarjeta mx-auto"
    >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                autocomplete="username"
                @class([
                    'form-control',
                    'is-invalid' => $errors->has('email'),
                ])
                @error('email')
                aria-invalid="true"
                aria-errormessage="error-email"
                @enderror
                value="{{ old('email') }}"
            >
            @error('email')
            <div class="invalid-feedback" id="error-email">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input
                type="password"
                id="password"
                name="password"
                autocomplete="current-password"
                @class([
                    'form-control',
                    'is-invalid' => $errors->has('password'),
                ])
                @error('password')
                aria-invalid="true"
                aria-errormessage="error-password"
                @enderror
            >
            @error('password')
            <div class="invalid-feedback" id="error-password">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
    </section>
</x-layouts.main>
