<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Servicios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <img src="{{asset('imagenes/servicios.jpg')}}" alt="imagen servicios" class="h-36 rounded-full mx-auto mb-1 mt-0"/>
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-center mb-10">Editar {{$servicios->nombre}}</h1>
                    
                    <!--mandandole el servicio al formulario-->
                     <livewire:editar-servicio :servicios="$servicios" />                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>