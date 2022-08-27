<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios Ofrecidos') }}
        </h2>
    </x-slot>

     <!--Mensaje cuando un cliente agrega un servicio-->
     @if (session()->has('mensaje'))
     <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3">
       {{session('mensaje')}}
     </div>  
     @endif

     @if (session()->has('error_carrito'))
       <div class="bg-red-500 text-white uppercase border font-bold p-2 my-3">
          {{session('error_carrito')}}
        </div>  
     @endif
     

    <div class="py-4 md:grid md:grid-cols-3 md:gap-x-4 p-6" id="lista_servicios">
       
      @forelse ($servicios as $servicio )
      <div class="w-full md:mr-4 mt-4">
        <img src="{{asset('storage/servicios/' . $servicio->imagen)}}" class="w-full h-40 p-0"/>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full p-2">
             <p class="text-center">{{$servicio->nombre}}</p>
             <p class="text-center font-bold">{{$servicio->precio}}</p>
             <p class="text-center"><span class="font-bold">Categoria: </span>{{$servicio->categoria->categoria}}</p>  
             <p class="mt-2 mb-2">{{$servicio->descripcion}}<p> 
            <form action="/carrito" method="POST" action="/carrito">
                @csrf
            <input type="text" value="{{$servicio->id}}" name="servicios_id">
            <input type="submit" value="Seleccionar" class="agregar-carrito block w-full bg-blue-600 text-white uppercase rounded-lg py-3 px-4 text-xs font-bold cursor-pointer ">
            </form>
            </div>
      </div>
      @endforeach

    </div>

   
</x-app-layout>

