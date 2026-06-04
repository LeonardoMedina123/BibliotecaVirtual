<div class="p-4 sm:p-6">
  <form method="POST" action="{{ route('register') }}" class="bg-white rounded-[3rem] shadow-2xl overflow-hidden w-full max-w-[52rem] min-h-[34rem]">
    @csrf
    <div class="bg-[#004494] p-6 flex flex-col items-center justify-center text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-2" viewBox="0 0 20 20" fill="currentColor">
        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
      </svg>
      <h2 class="text-3xl font-bold tracking-tight">Crear Cuenta</h2>
    </div>

    <div class="p-8 space-y-4">
      @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded-md">
          <ul class="text-xs text-red-600 list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div>
        <label for="name" class="block text-[#004494] font-bold text-sm mb-1">Nombre Completo *</label>
        <input type="text"
               id="name"
               name="name"
               value="{{ old('name') }}"
               required
               autofocus
               placeholder="Tu Nombre Completo"
               class="w-full bg-gray-200 border-none rounded-full px-4 py-2 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none">
      </div>

      <div>
        <label for="email" class="block text-[#004494] font-bold text-sm mb-1">Correo Institucional *</label>
        <input type="email"
               id="email"
               name="email"
               value="{{ old('email') }}"
               required
               placeholder="ejemplo@aguascalientes.tecnm.mx"
               class="w-full bg-gray-200 border-none rounded-full px-4 py-2 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none">
      </div>

      <div>
        <label for="password" class="block text-[#004494] font-bold text-sm mb-1">Contraseña *</label>
        <input type="password"
               id="password"
               name="password"
               required
               placeholder="Mínimo 8 caracteres"
               class="w-full bg-gray-200 border-none rounded-full px-4 py-2 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none">
      </div>

      <div>
        <label for="password_confirmation" class="block text-[#004494] font-bold text-sm mb-1">Confirmar Contraseña *</label>
        <input type="password"
               id="password_confirmation"
               name="password_confirmation"
               required
               placeholder="Repite tu contraseña"
               class="w-full bg-gray-200 border-none rounded-full px-4 py-2 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none">
      </div>

      <div class="pt-2">
        <button type="submit" class="w-full bg-[#004494] text-white font-bold py-2 rounded-full shadow-sm hover:bg-blue-800 transition-colors">
          Registrarme
        </button>
      </div>

      <div class="text-center pt-4">
        <p class="text-sm text-gray-600">
          ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-sky-500 font-semibold hover:underline">Inicia Sesión</a>
        </p>
      </div>
    </div>
  </form>
</div>
