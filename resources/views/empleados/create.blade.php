<x-admin-layout>
    <div class="py-6 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">       
                <div class="mx-auto max-w-screen-lg sm:px-8">
                    <div class="flex items-center justify-between">
                      <div>
                        <h2 class="font-semibold text-gray-700">Administración de empleados</h2>
                        <span class="text-xs text-gray-500">Visualiza los empleados</span>
                      </div>
                      <div class="flex items-center justify-between">
                        <div class="ml-10 space-x-8 lg:ml-40">
                          <a href="{{ route('empleados.index') }}" class="flex items-center gap-2 rounded-md bg-[#1958A6] px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                            </svg>
                  
                            Atras
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="font-sans antialiased bg-grey-lightest">
                      <!-- Content -->
                      <div class="w-full bg-grey-lightest">
                        <div class="container mx-auto">
                          <div class="w-5/6 lg:w-1/2 mx-auto bg-white rounded shadow">
                            <div class="py-4 px-8 text-black text-xl border-b-2 border-grey-lighter"></div>
                                <form method="POST" action="{{ route('empleados.store') }}" class="py-4 px-8 border shadow-xl rounded-b-xl">
                                  @csrf  
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombre</label>
                                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="nombre" name="nombre" type="text" placeholder="Ingrese nombre">
                                        @error('nombre') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="apellidos">Apellido</label>
                                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="apellidos" name="apellidos" type="text" placeholder="Ingrese apellido">
                                        @error('apellidos') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="genero">Generó</label>
                                        <select name="genero" id="genero" class="appearance-none border rounded w-full py-2 px-3 text-gray-700">
                                            <option value="" disabled selected>Selecionar género</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                        @error('genero') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="dni">DNI</label>
                                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="dni" name="dni" type="text" placeholder="Ingrese DNI">
                                        @error('dni') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="cargo">Cargo</label>
                                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="cargo" name="cargo" type="text" placeholder="Ingrese cargo">
                                        @error('cargo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Correo</label>
                                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="email" name="email" type="email" placeholder="Ingrese correo">
                                        @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">Telefono</label>
                                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="telefono" name="telefono" type="text" placeholder="Ingrese telefono">
                                        @error('telefono') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">Dirección</label>
                                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="direccion" name="direccion" type="text" placeholder="Ingrese dirección">
                                        @error('direccion') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex items-center justify-between mt-8">
                                        <button class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-full">
                                            Crear
                                        </button>
                                    </div>
                                </form>
                                  
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>                  
            </div>
        </div>
    </div>
</x-admin-layout>
