<x-admin-layout>
    <div class="py-6 w-full">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">       
                <div class="mx-auto max-w-screen-xl">
                    <div class="flex items-center justify-between pb-6">
                      <div>
                        <h2 class="font-semibold text-gray-700">Administración de reportes de ventas</h2>
                        <span class="text-xs text-gray-500">Visualiza los reportes de ventas</span>
                      </div>
                
                        <form method="GET">
                            <div class="shadow flex rounded-md border bg-white border-gray-300">
                                <input class="w-full rounded p-2 border-none" name="search" value="{{ request()->get('search') }}" type="text" placeholder="Buscar...">
                                <button type="submit" class="w-auto flex justify-end items-center text-blue p-2 hover:text-blue-700 hover:font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                    width="16" height="16" fill="currentColor" 
                                    class="bi bi-search" viewBox="0 0 16 16"> <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/> </svg>
                                </button>
                            </div>
                        </form>
                        <div class="flex items-center justify-between">
                          <div class="ml-10 space-x-8 lg:ml-40">
                            <a href="{{ route('ventas.index') }}" class="flex items-center gap-2 rounded-md bg-[#1958A6] px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-blue-700">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                              </svg>
                              Ingresar una venta
                            </a>
                          </div>
                        </div>
                    
                    </div>
                    <div class="overflow-y-hidden">
                      <div class="overflow-x-auto border rounded-lg">
                        <table class="w-full">
                          <thead>
                            <tr class="bg-[#1958A6] text-left text-xs font-semibold uppercase tracking-widest text-white">
                              <th class="px-5 py-3">N° Boleta</th>
                              <th class="px-5 py-3">Fecha ingreso</th>
                              <th class="px-5 py-3">DNI</th>
                              <th class="px-5 py-3">Marca</th>
                              <th class="px-5 py-3">Modelo</th>
                              <th class="px-5 py-3">Color</th>
                              <th class="px-5 py-3">IMEI</th>
                              <th class="px-5 py-3">Precio</th>

                              <th class="px-5 py-3">Acción</th>
                            </tr>
                          </thead>
                          <tbody class="text-gray-500">
                            @foreach ($ventas as $venta)
                            
                            <tr>
                              <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">{{ $venta->n_boleta }}</p>
                              </td>
                              <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">{{ $venta->created_at->format('d-M-Y') }}</p>
                              </td>
                              <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">{{ $venta->dni }}</p>
                              </td>
                              @foreach ($categorias as $categoria)
                              @if ($venta->id_categoria == $categoria->id)
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <div class="flex items-center">
                                    <div class="">
                                        <p class="whitespace-no-wrap">{{ $categoria->marca }}</p>
                                    </div>
                                    </div>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                  <div class="flex items-center">
                                  <div class="">
                                      <p class="whitespace-no-wrap">{{ $categoria->modelo }}</p>
                                  </div>
                                  </div>
                                </td>
                                
                              @endif
                              @endforeach
                              @foreach ($articulos as $articulo)
                              @if ($venta->id_articulo == $articulo->id)
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                  <div class="flex items-center">
                                  <div class="">
                                      <p class="whitespace-no-wrap">{{ $articulo->color }}</p>
                                  </div>
                                  </div>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                  <div class="flex items-center">
                                  <div class="">
                                      <p class="whitespace-no-wrap">{{ $articulo->imei }}</p>
                                  </div>
                                  </div>
                                </td>
                                
                              @endif
                              @endforeach
                              <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <div class="flex items-center">
                                <div class="">
                                    <p class="whitespace-no-wrap">{{ $venta->precio }}</p>
                                </div>
                                </div>
                              </td>
                              <td>
                                <div class="flex justify-center gap-4">
                                  {{-- <a href="" class="hover:text-blue-600">Ver</a> --}}
                                  <a href="{{ route('ventas.edit', $venta->id) }}" class="hover:text-blue-600">Editar</a>
                                  <a href="{{ route('reporte.boletaPDF', $venta->id) }}" target="_blank0" class="hover:text-blue-600">PDF</a>

                                  <form class="hover:text-red-500 boton-eliminar" method="POST" action="{{ route('ventas.destroy', $venta->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        Eliminar
                                    </button>
                                  </form>
                                  
                                  
                                </div>
                              </td>
                            </tr>
                            
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="flex flex-col items-center border-t bg-white px-5 py-5 sm:flex-row sm:justify-between">
                        {{ $ventas->links() }} 
                      </div>
                    </div>
                  </div>                  
            </div>
        </div>
    </div>

   
    
</x-admin-layout>
