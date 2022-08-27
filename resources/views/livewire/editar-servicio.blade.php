<form class="md:w-1/2 mx-auto space-y-4" wire:submit.prevent='editar_servicio'>

    <!--nombre-->
    <div class="">
        <x-label for="nombre" :value="__('Nombre del servicio')" />

        <x-input id="nombre" class="block mt-1 w-full" type="text" wire:model="nombre" :value="old('nombre')"  />

        <!--mensaje de error de las validaciones pasandole como atributo a message para que el mensaje sea dinamico-->
        @error('nombre')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <!--PRECIO-->
    <div>
        <x-label for="precio" :value="__('Precio del servicio')" />

        <x-input id="precio" class="block mt-1 w-full" type="number" wire:model="precio" :value="old('precio')"  />

        <!--mensaje de error de las validaciones-->
        @error('precio')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror

    </div>

    <!--Categoria-->
    <div class="">
        <x-label for="categoria" :value="__('Categoria del servicio')" />

        <select id="categoria" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" wire:model="categoria" :value="old('descripcion')">
        <option value="">Seleccione una Opcion</option>
        @foreach ($categorias as $categoria )
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
        @endforeach
        
        </select>

        @error('categoria')
        <livewire:mostrar-alerta :message="$message"/>
        @enderror

    </div>

    <!--descripcion-->
    <div class="">
        <x-label for="descripcion" :value="__('Descripcion del servicio')" />

        <textarea id="descripcion" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full h-32"  wire:model="descripcion" placeholder="Describe el servicio a insertar"></textarea>
        
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    
     <!--Imagen-->
     <div class="">
        <x-label for="imagen_nueva" :value="__('Imagen del servicio')" />
        <x-input id="imagen_nueva" class="block mt-1 w-full"
        type="file"
        wire:model="imagen_nueva" 
        accept="image/*"
        />
          <!--seccion para desplegar un preview de la imagen actual en la base de datos-->
          <div class="mt-5 mb-4">
            <!--evaluando si la variable de imagen tiene contenido-->
             @if ($imagen)
             <x-label for="descripcion" :value="__('Imagen de la base de datos')" />
                <!--Imagen-temporaryUrl crea una url temporal para mostrar la imagen como preview-->
                   <img src="{{asset('storage/servicios/' . $imagen)}}" alt="{{'Imagen servicio' . $nombre}}" class="w-64"/>
             @endif

        </div>

           <!--seccion para desplegar un preview de la imagen seleccionada-->
          <div class="mt-5 mb-4">
                 <!--evaluando si la variable de imagen tiene contenido-->
                  @if ($imagen_nueva)
                  <x-label for="descripcion" :value="__('Imagen nueva')" /> 
                     <!--Imagen-temporaryUrl crea una url temporal para mostrar la imagen como preview-->
                        <img src="{{$imagen_nueva->temporaryUrl()}}" class="w-64"/>
                  @endif

             </div>

                 <!--Cuando hay un error en este campo-->
                @error('imagen_nueva')
                <!--Pasando el mensaje de error al livewire y el mensaje una variable llamada $message-->
                <livewire:mostrar-alerta :message="$message"/>
                @enderror


   <x-button>Editar Servicio</x-button>
</form>
