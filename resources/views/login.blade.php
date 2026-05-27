@vite(['resources/css/app.css', 'resources/js/app.js'])

<form method="POST" action="{{ route('login') }}" class="min-h-screen bg-[url('fondo.jfif')] bg-cover bg-center flex items-center justify-center p-4">
  @csrf 
  <div class="bg-white rounded-[3rem] shadow-2xl overflow-hidden w-full max-w-md">
    <div class="bg-[#004494] p-6 flex flex-col items-center justify-center text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-2" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
      </svg>
      <h2 class="text-3xl font-bold tracking-tight">Iniciar Sesión</h2>
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
        <label for="email" class="block text-[#004494] font-bold text-sm mb-1">Correo Institucional *</label>
        <input type="email" 
               id="email"
               name="email" 
               value="{{ old('email') }}"
               required 
               autofocus
               placeholder="23151256@aguascalientes.tecnm.mx" 
               class="w-full bg-gray-200 border-none rounded-full px-4 py-2 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none">
      </div>

      <div>
        <label for="password" class="block text-[#004494] font-bold text-sm mb-1">Contraseña *</label>
        <input type="password" 
               id="password"
               name="password" 
               required
               placeholder="............" 
               class="w-full bg-gray-200 border-none rounded-full px-4 py-2 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none">
      </div>

      <div class="flex items-center justify-between pt-2">
        <div class="flex items-center gap-2">
          <input type="checkbox" id="remember_me" name="remember" class="rounded text-[#004494] focus:ring-blue-500">
          <label for="remember_me" class="text-[#004494] font-bold text-xs select-none">Recuérdame</label>
        </div>
        
        <button type="submit" class="bg-[#004494] text-white font-bold px-8 py-2 rounded-full shadow-sm hover:bg-blue-800 transition-colors">
          Ingresar
        </button>
      </div>

      <div class="text-center pt-6">
  <p class="text-sm text-gray-600">
    ¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-sky-500 font-semibold hover:underline">Regístrate</a>
  </p>
</div>

    </div>
  </div>
</form>