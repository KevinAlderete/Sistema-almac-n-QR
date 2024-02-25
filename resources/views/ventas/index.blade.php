<x-admin-layout>
    <div class="py-6 w-full">
        <div class="max-w-7xl">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">       
                <div class="mx-auto max-w-screen-lg sm:px-8">
                    <div class="flex items-center justify-between pb-6">
                      <div>
                        <h2 class="font-semibold text-gray-700">ventas</h2>
                        <span class="text-xs text-gray-500">Escanea las ventas</span>
                      </div>
                      <div class="flex items-center justify-between">
                        <div class="ml-10 space-x-8 lg:ml-40">
                          <a href="{{ route('reporte.index') }}" class="flex items-center gap-2 rounded-md bg-[#1958A6] px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                            </svg>
                            Reporte de ventas
                          </a>
                        </div>
                      </div>
                    </div>

                    <div class="">
                        <div class="flex justify-center">
                            <div class=" w-96">
                                <video id="preview" width="100%"></video>
                            </div>
                            <div class="hidden relative">
                                <form method="POST" id="formQR" action="{{ route('ventas.codeqr') }}" class="py-4 px-8 border shadow-xl rounded-b-xl">
                                    @csrf 
                                    
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="codeqr">codeqr</label>
                                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700" id="codeqr" name="codeqr" type="codeqr" placeholder="Ingrese codeqr">
                                        @error('codeqr') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
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
    
    <script>


        
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            Instascan.Camera.getCameras().then(function(cameras){
                if(cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else{
                    alert('No cameras found');
                }
            }).catch(function(e) {
                console.error(e);
            });

            scanner.addListener('scan', function(c){
                document.getElementById('codeqr').value=c;
                

                document.getElementById('formQR').submit();
            });
        
    </script>
</x-admin-layout>
