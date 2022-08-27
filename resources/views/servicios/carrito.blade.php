<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carrito de Compras') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            
           
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                
                <div class="p-6 bg-white border-b border-gray-200 ">
                 
                    <h1 class="text-2xl font-bold text-center mb-10">Carrito</h1>
                   <table class="border border-gray-500 mx-auto">
                     <tr class="">
                        <th class="border-r-2 border-black  w-60">Servicio</th>
                        <th class="border-r-2 border-black w-32">Precio</th>
                        <th class="border-r-2 border-black w-32">Categoria</th>
                        <th class="w-32">Boton</th>
                     </tr>
                     @foreach ($carrito as $carrito )
                    
                     <tr class="">
                        <td class="border-r-2 border-black w-60 text-center">{{$carrito->servicios->nombre}}</td>
                        <td class="border-r-2 border-black w-60 text-center">{{$carrito->servicios->precio}}</td>
                        <td class="border-r-2 border-black w-60 text-center">{{$carrito->servicios->categoria->categoria}}</td>
                        <td class="border-r-2 border-black w-60 text-center">

                            <!--se debe pasar como parametro el modelo para poder usar el route model vounding y poder eliminar un registro-->
                            <form method="POST" action="{{route('carrito.destroy',$carrito)}}">
                                  <!--Metodo spofin para que se pueda agregar otro metodo que no sea post o get-->
                                  @method('DELETE')
                                @csrf
                                
                                  <input type="submit" class="bg-red-600 text-white uppercase rounded-lg py-1 px-2  text-xs font-bold cursor-pointer" value="Eliminar" />
                            </form>
                        </td>
                     </tr>
                    
                     @endforeach
                     
                   </table>
                  <div class="md:flex justify-center">
                   <a href="{{route('cita.index')}}" class=" mx-auto mt-5 inline-flex items-center px-12 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Seleccionar la cita</a>
                  <div>
                </div>
            </div>

           
        </div>
    </div>
</x-app-layout>