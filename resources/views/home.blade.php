@guest
<x-guest-layout>
    <!-- Page Heading -->
    <header class="bg-white shadow">
     <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
         <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
             <!-- Primary Navigation Menu -->
             <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                 <div class="flex justify-between h-16">
                     <div class="flex">
                         <!-- Logo -->
                         <div class="shrink-0 flex items-center">
                             <a href="{{ route('servicios.index') }}">
                                 <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                             </a>
                         </div>
                    
                      @guest
                          <!-- Navigation Links -->
                          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                               {{ __('Home') }}
                             </x-nav-link>
                          </div>


                         <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                             <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                 {{ __('Iniciar Sesion') }}
                             </x-nav-link>
                         </div>
         
                         <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                             <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                 {{ __('Registrarse') }}
                             </x-nav-link>
                         </div>

                       
                         
                      @endguest
                         
                     </div>
                     
                  
         
                     <!-- Hamburger -->
                     <div class="-mr-2 flex items-center sm:hidden">
                         <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                             <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                 <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                 <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                             </svg>
                         </button>
                     </div>
                     
                    
                 </div>
             </div>
         
             <!-- Responsive Navigation Menu -->
             <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                 <div class="pt-2 pb-3 space-y-1">
             
                     @guest

                     <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                     </x-responsive-nav-link>

                     <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                         {{ __('Registrarse') }}
                     </x-responsive-nav-link>
         
                     <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                         {{ __('Iniciar Sesion') }}
                     </x-responsive-nav-link>

                     @endguest
                    
         
                 </div>
         
                 <!-- Responsive Settings Options -->
                 <div class="pt-4 pb-1 border-t border-gray-200">
         
                     @auth
                     <div class="px-4">
                         <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                         <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                     </div>
                  
                     <div class="mt-3 space-y-1">
                         <!-- Authentication -->
                         <form method="POST" action="{{ route('logout') }}">
                             @csrf
         
                             <x-responsive-nav-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                                 this.closest('form').submit();">
                                 {{ __('Cerrar sesion') }}
                             </x-responsive-nav-link>
                         </form>
                     </div>
                     @endauth
                    
                 </div>
             </div>
         </nav>
     </div>
 </header>
 
 <div class="max-w-7xl mx-auto sm:py-6 lg:py-8 sm:px-6 lg:px-8 ">
             
     
 
   <div class=" overflow-hidden shadow-sm sm:rounded-lg bg-white ">
         
        
 
              <div class="p-6 ">
                   <h2 class="text-2xl font-bold text-center mb-10">Nosotros</h2>
 
                   <!--Seccion nosotros-->
                   <div class="md:grid md:grid-cols-3  mx-auto md:ml-40 ">
 
                             <div class="grid-col-1">
                                   <img src="{{asset('imagenes/barbero1.jpg')}}" alt="imagen servicios" class="max-h-48"/>
                             </div>
 
                             <div class="grid-cols-2">
                                 <p>
                                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam rerum doloribus, consectetur voluptatum odio 
                                     vitae autem officiis eius praesentium molestias cum repellendus dignissimos corrupti optio perspiciatis placeat assumenda quaerat laboriosam.
                                 </p>
                             </div>
                    </div>
        
                     <!--Servicios-->
                     <div class="p-6">
                               <h2 class="text-2xl font-bold text-center mb-10">Servicios Ofrecidos</h1>
             
                               <!--Seccion servicios-->
                               <div class="md:flex md:justify-center">
                                 
                                     <!--Servicio 1-->
                                     <div class="mx-10">
                    
                                              <img src="{{asset('imagenes/corte_barba.jpg')}}" alt="imagen servicios" class="max-h-20"/>
                                              <p>Cortes de Barba</p>
                                      </div>
 
                                     <!--Servicio 2-->
                                     <div class="mx-10">
                
                                              <img src="{{asset('imagenes/corte_cabello.jpg')}}" alt="imagen servicios" class="max-h-20"/>
                                              <p>Corte de cabello<p>
                                      </div>
 
                                      <!--Servicio 3-->
                                      <div class="mx-10">
                
                                              <img src="{{asset('imagenes/peinados.jpg')}}" alt="imagen servicios" class="max-h-20"/>
                                              <p>Peinados<p>
                                      </div>
 
                                      <!--Servicio 4-->
                                      <div class="mx-10">
                
                                              <img src="{{asset('imagenes/maquillaje.jpeg')}}" alt="imagen servicios" class="max-h-20"/>
                                              <p>Maquillaje<p>
                                      </div>
                                </div>
 
 
                     </div>
               </div>
      
       <!--Testimoniales-->
      <div class="p-6">
             <h2 class="text-2xl font-bold text-center mb-10">Testimoniales</h1>
     
              <!--Seccion servicios-->
              <div class="md:flex md:justify-center md:space-x-10 ">
                   <div class="mb-5  md:">
                        <img src="{{asset('imagenes/testimonial_barberia.jpg')}}" alt="imagen testimonial" class="max-h-60"/>
                   </div>
                 <div class="border rounded-xl bg-black p-5 max-w-md max-h-60">
                   <p class="text-white">Muy buenos recortes que se realizan cada vez que voy
                    las personas son muy amables el barbero que te recorta
                    habla muy ameno con situaciones que pasan en el pais para
                    mantenerte informado de todo el sitio esta muy buen organizado
                    y conservado con musica suave de ambiente</p>
                 </div>
             </div>
 
 
       </div>
   </div><!--Cierre del div de la parte blanca-->
 </div><!--Cierre del div del fondo gris-->
 </x-guest-layout> 
@endguest


@auth

<!--Vista cuando se esta logeado-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pagina principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
           
        
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                
                <div class=" overflow-hidden shadow-sm sm:rounded-lg bg-white ">
         
        
 
                    <div class="p-6 ">
                             <h2 class="text-2xl font-bold text-center mb-10">Nosotros</h2>
       
                                           <!--Seccion nosotros-->
                                         <div class="md:grid md:grid-cols-3  mx-auto md:ml-40 ">
       
                                               <div class="grid-col-1">
                                                    <img src="{{asset('imagenes/barbero1.jpg')}}" alt="imagen servicios" class="max-h-48"/>
                                               </div>
       
                                               <div class="grid-cols-2">
                                                   <p>
                                                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam rerum doloribus, consectetur voluptatum odio 
                                                       vitae autem officiis eius praesentium molestias cum repellendus dignissimos corrupti optio perspiciatis placeat assumenda quaerat laboriosam.
                                                   </p>
                                               </div>
                                         </div>
              
                                             <!--Servicios-->
                                           <div class="p-6">
                                                        <h2 class="text-2xl font-bold text-center mb-10">Servicios Ofrecidos</h1>
                   
                                                          <!--Seccion servicios-->
                                                         <div class="md:flex md:justify-center">
                                       
                                                                 <!--Servicio 1-->
                                                                <div class="mx-10">
                          
                                                                    <img src="{{asset('imagenes/corte_barba.jpg')}}" alt="imagen servicios" class="max-h-20"/>
                                                                    <p>Cortes de Barba</p>
                                                                </div>
       
                                                                <!--Servicio 2-->
                                                                <div class="mx-10">
                      
                                                                    <img src="{{asset('imagenes/corte_cabello.jpg')}}" alt="imagen servicios" class="max-h-20"/>
                                                                    <p>Corte de cabello<p>
                                                                </div>
       
                                                                <!--Servicio 3-->
                                                                <div class="mx-10">
                      
                                                                      <img src="{{asset('imagenes/peinados.jpg')}}" alt="imagen servicios" class="max-h-20"/>
                                                                      <p>Peinados<p>
                                                                </div>
       
                                                                <!--Servicio 4-->
                                                                <div class="mx-10">
                      
                                                                     <img src="{{asset('imagenes/maquillaje.jpeg')}}" alt="imagen servicios" class="max-h-20"/>
                                                                     <p>Maquillaje<p>
                                                                </div>
                                                        </div>
       
       
                                             </div>
                     </div>
            
                    <!--Testimoniales-->
                    <div class="p-6">
                            <h2 class="text-2xl font-bold text-center mb-10">Testimoniales</h1>
           
                               <!--Seccion servicios-->
                               <div class="md:flex md:justify-center md:space-x-10 ">

                                    <div class="mb-5  md:">
                                        <img src="{{asset('imagenes/testimonial_barberia.jpg')}}" alt="imagen testimonial" class="max-h-60"/>
                                    </div>

                                    <div class="border rounded-xl bg-black p-5 max-w-md max-h-60">

                                          <p class="text-white">Muy buenos recortes que se realizan cada vez que voy
                                                                  las personas son muy amables el barbero que te recorta
                                                                  habla muy ameno con situaciones que pasan en el pais para
                                                                  mantenerte informado de todo el sitio esta muy buen organizado
                                                                  y conservado con musica suave de ambiente
                                                             </p>
                                    </div>
                                </div>
       
       
                        </div>

                 </div><!--Cierre del div de la parte blanca-->
          </div><!--Cierre del div de la parte blanca-->
        </div><!--Cierre del div de la parte gris-->
    </div>
</x-app-layout>
    
@endauth


           