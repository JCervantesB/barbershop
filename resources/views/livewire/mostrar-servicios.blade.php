
<div>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        
            @forelse ($servicios as $servicio )
           <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
          
                <div class="space-y-2">
                    <a href="{{route('servicios.show',$servicio->id)}}" class="font-bold">{{$servicio->nombre}}</a>
                    <p class="text-sm text-gray-600 font-bold">{{$servicio->precio}}</p>
                </div>

                <div class="flex gap-3 flex-col md:flex-row mt-2 md:mt-0 items-stretch  text-center md:items-center">
                  <a class="bg-blue-600 py-2 px-4 text-white rounded-lg font-bold " href="{{route('servicios.edit',$servicio->id)}}">Editar</a>
                  <button class="bg-red-600 py-2 px-4 text-white rounded-lg font-bold " wire:click='$emit("mostrar_Alerta",{{$servicio->id}})'>Eliminar</button>
                </div>
           </div>

           
      
            @empty
                   <p class="p-3 text-center text-sm text-gray-600">No hay servicios creados</p>
            @endforelse
       
      </div>

      <!--La paginacion de servicios que se muestra cuando el numero de servicios supera el numero de paginate-->
      <div>
          {{$servicios->links()}}
      </div>

      @push('script')

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      

      <script>
         //creando el evento click cuando se presiona eliminar
      Livewire.on('mostrar_Alerta',servicio_id =>{
                                            Swal.fire({
                                                              title: 'Estas seguro?',
                                                              text: "No podras revertir esto!",
                                                              icon: 'warning',
                                                              showCancelButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              cancelButtonColor: '#d33',
                                                              confirmButtonText: 'Si, borralo!'
                                                       }).then((result) => {
                                                                                  if (result.isConfirmed) {
                                                                                                            //mandando a llamar la funcion eliminar_vacante 
                                                                                                            Livewire.emit('eliminar_servicio',servicio_id)

                                                                                                            //alerta despues que se elimina la vacante
                                                                                                            Swal.fire(
                                                                                                                        'Se a ha eliminado la vacante!',
                                                                                                                        'La vacante seleccionada ha sido eliminada.',
                                                                                                                        'success'
                                                                                                                       )
                                                                                                           }
                                                                                 })
                                           }
                 )
      </script>
      

      @endpush

</div>