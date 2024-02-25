<x-admin-layout>
    <div class="py-6 w-full">
        <div class="max-w-7xl">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">       
                <div class="mx-auto max-w-screen-lg sm:px-8">
                    <div class="flex items-center justify-between pb-6">
                      <div>
                        <h2 class="font-semibold text-gray-700">Administración de empleados</h2>
                        <span class="text-xs text-gray-500">Visualiza los empleados</span>
                      </div>
                      <div class="flex items-center justify-between">
                        <div class="ml-10 space-x-8 lg:ml-40">
                          <a href="" class="flex items-center gap-2 rounded-md bg-[#1958A6] px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                            </svg>
                            Añadir empleado
                          </a>
                        </div>
                      </div>
                    </div>

                    <div class="">
                        <div class="flex">
                            <div class=" w-96">
                                <video id="preview" width="100%"></video>
                            </div>
                            <div class="">
                                <form method="POST" id="formQR" action="{{ route('asistencias.store') }}" class="py-4 px-8 border shadow-xl rounded-b-xl">
                                    @csrf  
                                    
                                    <div class="mb-4">
                                        <label for="idEmpleado" class="block text-gray-700 text-sm font-bold mb-2">Scan QR</label>
                                        <input type="idEmpleado" name="idEmpleado" id="idEmpleado" placeholder="scan qrcode" class="appearance-none border rounded w-full py-2 px-3 text-gray-700">
                                        @error('idEmpleado') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div id="clockdate" >
                        <div class="clockdate-wrapper">
                          <div id="clock" class="clock"></div>
                          <div id="date" class="date"></div>
                        </div>
                    </div>

                    <script>
                        function startTime() {
                        var today = new Date();
                        var hr = today.getHours();
                        var min = today.getMinutes();
                        var sec = today.getSeconds();
                        ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
                        hr = (hr == 0) ? 12 : hr;
                        hr = (hr > 12) ? hr - 12 : hr;
                        //Add a zero in front of numbers<10
                        hr = checkTime(hr);
                        min = checkTime(min);
                        sec = checkTime(sec);
                        document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
                        
                        var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Augosto', 'Septiembre', 'Octubre', 'Noviembre', 'Deciembre'];
                        var days = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];
                        var curWeekDay = days[today.getDay()];
                        var curDay = today.getDate();
                        var curMonth = months[today.getMonth()];
                        var curYear = today.getFullYear();
                        var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
                        document.getElementById("date").innerHTML = date;
                        
                        var time = setTimeout(function(){ startTime() }, 500);
                    }
                    function checkTime(i) {
                        if (i < 10) {
                            i = "0" + i;
                        }
                        return i;
                    }
                    </script>

                    <style>
                        .clockdate-wrapper {
                            background-color: #333;
                            padding:25px;
                            max-width:350px;
                            width:100%;
                            text-align:center;
                            border-radius:5px;
                            /* margin:0 auto; */
                            margin-top: 20px;
                        }
                        .clock{
                            background-color:#333;
                            font-family: sans-serif;
                            font-size:60px;
                            text-shadow:0px 0px 1px #fff;
                            color:#fff;
                        }
                        .clock span {
                            color:#888;
                            text-shadow:0px 0px 1px #333;
                            font-size:30px;
                            position:relative;
                            top:-27px;
                            left:-10px;
                        }
                        .date {
                            letter-spacing:10px;
                            font-size:14px;
                            font-family:arial,sans-serif;
                            color:#fff;
                        }
                    </style>

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
            document.getElementById('idEmpleado').value=c;
            document.getElementById('formQR').submit();
        });
    </script>
</x-admin-layout>
