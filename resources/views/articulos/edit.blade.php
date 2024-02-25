<x-admin-layout>
    <div class="py-6 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">       
                <div class="mx-auto max-w-screen-lg sm:px-8">
                    <div class="flex items-center justify-between">
                      <div>
                        <h2 class="font-semibold text-gray-700">Categoria / Editar</h2>
                        <span class="text-xs text-gray-500">Edita los categorias</span>
                      </div>
                      <div class="flex items-center justify-between">
                        <div class="ml-10 space-x-8 lg:ml-40">
                          <a href="{{ route('categorias.index') }}" class="flex items-center gap-2 rounded-md bg-[#1958A6] px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-blue-700">
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
                                <form method="POST" action="{{ route('articulos.update', $articulo->id) }}" class="py-4 px-8 border shadow-xl rounded-b-xl">
                                  @csrf 
                                  @method('PUT') 
                                
                                <div class="flex gap-8">
                                  <div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="cantidad">Cantidad</label>
                                        <input value="{{ $articulo->cantidad }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="cantidad" name="cantidad" type="text" placeholder="Ingrese cantidad">
                                        @error('cantidad') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="imei">IMEI</label>
                                        <input value="{{ $articulo->imei }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="imei" name="imei" type="text" placeholder="Ingrese IMEI">
                                        @error('imei') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="color">Color</label>
                                        <input value="{{ $articulo->color }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="color" name="color" type="text" placeholder="Ingrese color">
                                        @error('color') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                      <label class="block text-gray-700 text-sm font-bold mb-2" for="almacenamiento">Capacidad de almacenamiento</label>
                                      <input value="{{ $articulo->almacenamiento }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="almacenamiento" name="almacenamiento" type="text" placeholder="Ingrese ROM">
                                      @error('almacenamiento') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                  </div>
                                  <div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="ran">Capacidad de RAM</label>
                                        <input value="{{ $articulo->ran }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="ran" name="ran" type="text" placeholder="Ingrese RAN">
                                        @error('ran') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">Precio</label>
                                        <input value="{{ $articulo->precio }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="precio" name="precio" type="text" placeholder="Ingrese precio">
                                        @error('precio') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="descricion">Descripción</label>
                                        <input value="{{ $articulo->descricion }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="descricion" name="descricion" type="text" placeholder="Ingrese descripcion">
                                        @error('descricion') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="id_proveedor" class="block text-gray-700 text-sm font-bold mb-2">Proveedor</label>
                                        <select name="id_proveedor" id="id_proveedor" class="appearance-none border rounded w-full py-2 px-3 text-gray-700">
                                            
                                            @foreach ($proveedors as $proveedor)
                                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_proveedor') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                  </div>
                                </div>
                                    <div class="flex items-center justify-between mt-8">
                                        <button class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-lg">
                                            Actualizar
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
