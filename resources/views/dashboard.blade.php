<x-app-layout>
    <x-slot name="header">
  
    </x-slot>

    <div class="py-12">
        <div class="bg-black max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex-container space-between">
                        @if (Route::has('login'))
                      
                            @auth
                               <a href="{{ url('/nuevaReserva/{id?') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Crear reserva</a> 
                               <a href="{{ url('/crearModificarReserva') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Modificar reserva</a>
                               

                            @else
                                <a href="{{ route('login') }}" class="titulo">HAZ TU RESERVA</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"  class="titulo">REGISTRATE</a>
                                @endif
                            @endauth
                           
                        
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
