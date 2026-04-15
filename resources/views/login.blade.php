<div class="min-h-screen bg-[url('fondo.jfif')] bg-cover bg-center flex items-center justify-center p-4">
  
  <div class="bg-white rounded-[3rem] shadow-2xl overflow-hidden w-full max-w-md">
    
    <div class="bg-[#004494] p-6 flex flex-col items-center justify-center text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-2" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
      </svg>
      <h2 class="text-3xl font-bold tracking-tight">Registro</h2>
    </div>

    <div class="p-8 space-y-4">
      
      <div>
        <label class="block text-[#004494] font-bold text-sm mb-1">Nombre completo *</label>
        <input type="text" 
               placeholder="Nombre Completo" 
               class="w-full bg-gray-200 border-none rounded-full px-4 py-2 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none">
      </div>

      <div>
        <label class="block text-[#004494] font-bold text-sm mb-1">Correo Institucional *</label>
        <input type="email" 
               placeholder="23151256@aguascalientes.tecnm.mx" 
               class="w-full bg-gray-200 border-none rounded-full px-4 py-2 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none">
      </div>

      <div>
        <label class="block text-[#004494] font-bold text-sm mb-1">Contraseña *</label>
        <input type="password" 
               placeholder="............" 
               class="w-full bg-gray-200 border-none rounded-full px-4 py-2 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none">
      </div>

      <div class="flex items-center justify-between pt-2">
        <div class="flex items-center gap-2">
          <label class="text-[#004494] font-bold text-sm">Rol *</label>
          <select class="bg-gray-200 border-none rounded-lg px-3 py-1 text-sm text-gray-700 outline-none">
            <option>Estudiante</option>
            <option>Docente</option>
          </select>
        </div>
        
        <button class="bg-gray-200 text-red-600 font-bold px-6 py-2 rounded-full shadow-sm hover:bg-gray-300 transition-colors">
          Registrar
        </button>
      </div>

      <div class="text-center pt-6">
        <p class="text-sm text-gray-600">
          ¿Ya tienes una cuenta? <a href="#" class="text-sky-500 font-semibold hover:underline">Inicia sesión</a>
        </p>
      </div>

    </div>
  </div>
</div>