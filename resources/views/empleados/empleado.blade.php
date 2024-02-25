<x-admin-layout>
    <div class="py-6 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">       
                <div class="mx-auto max-w-screen-lg sm:px-8">
                    <div class="flex items-center justify-between">
                      <div>
                        <h2 class="font-semibold text-gray-700">Administración de usuarios</h2>
                        <span class="text-xs text-gray-500">Visualiza los usuarios</span>
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
                      <div
                        class="max-w-2xl sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm mx-auto mt-8 bg-white shadow-xl rounded-lg text-gray-900">
                        <div class="rounded-t-lg h-32 overflow-hidden">
                            <img class="object-cover object-top w-full" src='https://images.unsplash.com/photo-1606857521015-7f9fcf423740?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80' alt='Mountain'>
                        </div>
                        <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                            @if ( $empleado->genero  == 'Masculino')
                                <img class="object-cover object-center h-32" src='https://images.pexels.com/photos/399772/pexels-photo-399772.jpeg?cs=srgb&dl=pexels-vojtech-okenka-399772.jpg&fm=jpg' alt='Woman looking front'>
                            @else
                                <img class="object-cover object-center h-32" src='https://p2.piqsels.com/preview/252/304/1019/dark-female-person-silhouette.jpg' alt='Woman looking front'> 
                            @endif
                        </div>
                        <div class="text-center mt-2">
                            <h2 class="font-semibold">{{ $empleado->nombre }} {{ $empleado->apellidos }}</h2>
                            <p class="text-gray-500">{{ $empleado->cargo }}</p>
                        </div>
                        <ul class="py-2 mt-2 text-gray-700 flex flex-col ml-8 gap-4">
                            <li class="flex">
                                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <div class="pl-2">{{ $empleado->dni }}</div>
                            </li>
                            <li class="flex">
                                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z" />
                                </svg>
                                <div class="pl-2">{{ $empleado->genero }}</div>
                            </li>
                            <li class="flex">
                                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
                                </svg>
                                <div class="pl-2">{{ $empleado->email }}</div>
                            </li>
                            <li class="flex">
                                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
                                </svg>
                                <div class="pl-2">{{ $empleado->telefono }}</div>
                            </li>
                            <li class="flex">
                                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
                                </svg>
                                <div class="pl-2">{{ $empleado->direccion }}</div>
                            </li>
                        </ul>
                        <div class="p-4 border-t mx-8 mt-2 flex justify-center">
                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="w-1/2 flex justify-center rounded-lg bg-[#1958A6] hover:bg-blue-700 font-semibold text-white px-6 py-2">Editar</a>
                        </div>
                    </div>
                    </div>
                  </div>                  
            </div>
        </div>
    </div>
</x-admin-layout>
