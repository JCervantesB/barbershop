<div class="p-10">
  <!--Imagen de el servicio-->
  <div class="flex justify-center">
    <!--asset ayuda a completar la ruta-->
    <img src="{{asset('storage/servicios/' . $servicio->imagen)}}" class="w-auto h-40 p-0"/>
  </div> 

  <!--Informaciones de el servicio-->
  <div class="text-center space-y-2 ">
         
         <h3 class="font-bold text-xl text-gray-800 ">{{$servicio->nombre}}</h3>
        <div class="md:grid md:grid-cols-2 md:px-12">
         <p class="font-bold text-xl text-gray-800">Precio: {{$servicio->precio}}</p>
         <p class="font-bold text-xl text-gray-800">Categoria: {{$servicio->categoria->categoria}}</p>
        </div>
         <p class="font-bold text-xl text-gray-800">{{$servicio->descripcion}}</p>
         
   </div>

</div>
