<x-admin-layout>
    <div class="py-6 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">       
                <div class="mx-auto max-w-screen-lg sm:px-8">
                    <div class="flex items-center justify-between pb-6">
                      <div>
                        <h2 class="font-semibold text-gray-700">Rol</h2>
                        <span class="text-xs text-gray-500">Visualiza los roles</span>
                      </div>
                      {{-- <div class="flex items-center justify-between">
                        <div class="ml-10 space-x-8 lg:ml-40">
                          <a href="{{ route('admin.roles.create') }}" class="flex items-center gap-2 rounded-md bg-[#1958A6] px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                            </svg>
                            Crear Rol
                          </a>
                        </div>
                      </div> --}}
                    </div>
                    <div class="overflow-y-hidden">
                      <div class="overflow-x-auto border rounded-lg">
                        <table class="w-full">
                          <thead>
                            <tr class="bg-[#1958A6] text-left text-xs font-semibold uppercase tracking-widest text-white">
                              <th class="px-5 py-3">ID</th>
                              <th class="px-5 py-3">Rol</th>
                              {{-- <th class="px-5 py-3">Acción</th> --}}
                            </tr>
                          </thead>
                          <tbody class="text-gray-500">
                            @foreach ($roles as $role)
                            <tr>
                              <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">{{ $role->id }}</p>
                              </td>
                              <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <div class="flex items-center">
                                  <div class="">
                                    <p class="whitespace-no-wrap">{{ $role->name }}</p>
                                  </div>
                                </div>
                              </td>
                              {{-- <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <div class="flex justify-center gap-4">
                                  <a href="{{ route('admin.roles.edit', $role->id) }}" class="hover:text-blue-600">Editar</a>
                                  <form class="hover:text-red-500 boton-eliminar" method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        Eliminar
                                    </button>
                                  </form>
                                </div>
                              </td> --}}
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      
                    </div>
                  </div>                  
            </div>
        </div>
    </div>
    
</x-admin-layout>
