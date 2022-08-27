<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Citas Reservadas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            
           
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                
                <div class="p-6 bg-white border-b border-gray-200 ">
                 
                    <h1 class="text-2xl font-bold text-center mb-10">Citas Reservadas</h1>

                    @if (session()->has('eliminar_cita'))
                       <div class="text-center bg-red-500 text-white uppercase border font-bold p-2 my-3">
                          {{session('eliminar_cita')}}
                       </div>  
                    @endif
                  
                      @forelse ($citas as $cita )
                      
                      <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                     
                           <div class="space-y-2">
                               <h1 class="font-bold">{{$cita->servicios->nombre}}</h1>
                               <p class="text-sm text-gray-600 font-bold">{{$cita->fecha_cita}}</p>
                               <p class="text-sm text-gray-600 font-bold">{{$cita->hora_cita}}:00</p>
                           </div>
           
                           <div class="flex gap-3 flex-col md:flex-row mt-2 md:mt-0 items-stretch  text-center md:items-center">
                            <form action="{{route('cita_realizadas.destroy',$cita)}}" method="POST">
                               @method('Delete')
                               @csrf
                             <input type="submit" value="Eliminar" class="bg-red-600 py-2 px-4 text-white rounded-lg font-bold " >
                            </form>
                           </div>
                      </div>
           
                      
                 
                       @empty
                              <p class="p-3 text-center text-sm text-gray-600">No hay servicios Reservados</p>
                       @endforelse
                     
           
                 </div>
             </div>
        </div>
    </div>
</x-app-layout>