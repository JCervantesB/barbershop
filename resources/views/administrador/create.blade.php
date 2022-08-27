<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creando Nuevo Administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            

        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-center mb-10">Creando Administrador</h1>

                    <form class="md:w-1/2 mx-auto space-y-4" action='{{route("administrador.store")}}' method="POST" novalidate>

                        @csrf
                    
                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Nombre')" />
                    
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        @error('name')
                        <div class="border border-red-500 bg-red-200 text-red-700 font-bold uppercase p-1 m-1  text-xs">
                            {{$message}}
                         </div>
                        @enderror
                    
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Correo Electronico')" />
                    
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        @error('email')
                        <div class="border border-red-500 bg-red-200 text-red-700 font-bold uppercase p-1 m-1  text-xs">
                            {{$message}}
                         </div>
                        @enderror
                    
                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />
                    
                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                        </div>

                        @error('password')
                        <div class="border border-red-500 bg-red-200 text-red-700 font-bold uppercase p-1 m-1  text-xs">
                            {{$message}}
                         </div>
                        @enderror
                    
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirmar Password')" />
                    
                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required />
                        </div>

                        @error('password_confirmation')
                        <div class="border border-red-500 bg-red-200 text-red-700 font-bold uppercase p-1 m-1  text-xs">
                            {{$message}}
                         </div>
                        @enderror
                    
                       
                        <x-button class="w-full justify-center">
                            {{ __('Registrarse') }}
                        </x-button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>