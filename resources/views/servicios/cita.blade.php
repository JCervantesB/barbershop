<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Llene los datos de su Cita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
           
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  p-10">
                
                <h2 class="font-bold text-center text-xl"> fecha de la cita</h1>

                     <!--Mensaje para cuando se seleccione una hora no laborable-->
                     @if (session('mensaje'))
                     <div class="border bg-green-100 border-green-600 text-green-600 font-bold uppercase p-2 mt-2 text-xs mb-3 text-center">
                         {{session('mensaje')}}
                      </div> 
                     @endif

                    <!--Mensaje para cuando se seleccione una hora no laborable-->
                    @if (session('hora_cita'))
                    <div class="border bg-red-100 border-red-600 text-red-600 font-bold uppercase p-2 mt-2 text-xs mb-3 text-center">
                        {{session('hora_cita')}}
                     </div> 
                    @endif

                   <!--Mensaje para cuando se seleccione una dia no laborable-->
                    @if (session('fecha_cita'))
                    <div class="border bg-red-100 border-red-600 text-red-600 font-bold uppercase p-2 mt-2 text-xs mb-3 text-center">
                        {{session('fecha_cita')}}
                     </div> 
                    @endif
                   @if($servicios_en_carrito != 0)
                    <form method="POST" action="{{route('cita.store')}}">
                        @csrf
                        <x-label for="fecha" :value="__('Introduce la fecha de la cita')" />

                        <!--Sumando un dia para que solo se pueda seleccionar un dia despues del dia de hoy-->
                        <x-input id="fecha" class="block mt-1 w-full" type="date"  min="{{date('Y-m-d',strtotime('+1 day'))}}" name="fecha_cita" :value="old('fecha_cita')"  />
                        @error('fecha_cita')
                        <div class="border bg-red-100 border-red-600 text-red-600 font-bold uppercase p-2 mt-2 text-xs">
                            {{$message}}
                         </div>
                        @enderror
                        <x-label for="hora" class="block mt-4" :value="__('Introduce la hora de la cita')" />
                        <x-input id="hora" class="block mt-2 w-full" type="time" name="hora_cita" :value="old('hora_cita')" />
                        @error('hora_cita')
                        <div class="border bg-red-100 border-red-600 text-red-600 font-bold uppercase p-2 mt-2 text-xs">
                            {{$message}}
                         </div>
                        @enderror
                        
                     <input type="submit" class="mt-5 block w-full md:w-40 md:inline-flex md:items-center px-12 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"/>
                    </form>
                 @else
                 <div class="border bg-red-100 border-red-600 text-red-600 font-bold uppercase p-2 mt-2 text-xs">
                    <p>No se puede seleccionar la hora de la cita si no tiene ningun servicio seleccionado</p>
                 </div>

                 <div class="flex justify-center">
                    <a href="{{route('servicios.cliente')}}" class="mt-5 block w-full md:w-96 md:inline-flex md:items-center px-12 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Regrese a seleccionar sus servicios</a>
                  </div>
                 @endif
                  
            </div>
        </div>
    </div>
</x-app-layout>