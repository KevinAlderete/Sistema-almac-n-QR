<x-admin-layout>
    <div class="py-6 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">       
                <div class="mx-auto max-w-screen-lg sm:px-8">
                    <div class="flex items-center justify-between">
                      <div>
                        <h2 class="font-semibold text-gray-700">Usuario / editar</h2>
                        <span class="text-xs text-gray-500">Edita los usuarios</span>
                      </div>
                      <div class="flex items-center justify-between">
                        <div class="ml-10 space-x-8 lg:ml-40">
                          <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 rounded-md bg-[#1958A6] px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-blue-700">
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
                          <div class="w-5/6 lg:w-1/2 mx-auto bg-white border shadow-xl rounded-xl">
                            <div class="py-4 px-8 text-black text-xl border-b-2 border-grey-lighter"></div>
                                <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="py-4 px-8">
                                  @csrf  
                                  @method('PUT')
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nombre</label>
                                        <input value="{{ $user->name }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="name" name="name" type="text" placeholder="Ingrese nombre">
                                        @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Correo</label>
                                        <input value="{{ $user->email }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="email" name="email" type="email" placeholder="Ingrese correo">
                                        @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Contraseña</label>
                                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="password" name="password" type="password" placeholder="Ingrese una contraseña">
                                        @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex items-center justify-between mt-8">
                                        <button class="bg-[#1958A6] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg" type="submit">
                                            Actualizar
                                        </button>
                                    </div>
                                </form>
                                <div class="w-full flex flex-col gap-1 py-4 px-8">
                                    @if ($user->id != 1)
                                    <div class="relative z-0 w-full group pt-5">
                                        
                      
                                        <div>
                                            <form method="POST" class="flex flex-row" action="{{ route('admin.users.roles', $user->id) }}">
                                                @csrf
                                                <div class="relative z-0 w-full group">
                                                    <select id="role" name="role" autocomplete="roles" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="role" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Roles</label>
                                                    @error('role') 
                                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="sm:col-span-6 ">
                                                    <button class="rounded-md mb-4 ml-6 py-2 px-8 border border-gray-900 font-bold hover:border-blue-800 hover:text-blue-800 transition">Asignar</button> 
                                                </div>
                                            </form>  
                                        </div>
        
                                        <div class="flex gap-3 mb-4 flex-wrap">
                                            @if ($user->roles)
                                                @foreach ($user->roles as $user_role)
                                                <form method="POST" action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}" class="boton-eliminar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-200 hover:bg-red-500 hover:scale-105 hover:text-red-200 rounded-md">
                                                        {{ $user_role->name }} 
                                                    </button>
                                                </form>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    @endif

                                </div>
                                
      
                                  
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
