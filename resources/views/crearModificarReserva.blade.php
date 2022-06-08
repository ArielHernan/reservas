<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear reserva') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-black">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black ">
                    <x-auth-card>
                        <x-slot name="logo">
                            {{-- <a href="/">
                                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                            </a> --}}
                        </x-slot>
                
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                
                        <form method="POST" action="{{ route('reservaUpdate') }}">
                            @csrf
                
                            <!-- Name -->
                            <div>
                                <x-label for="dia" :value="__('Día de reserva')" />
                
                                <x-input id="dia" class="block mt-1 w-full" type="date" name="dia" :value="old('dia')" required autofocus />
                            </div>
                
                               <!-- teléfono -->
                               <div class="mt-4">
                                <x-label for="hora" :value="__('Hora de reserva')" />
                
                                <x-input id="hora" class="block mt-1 w-full" type="time" name="hora" :value="old('hora')" required />
                            </div>
                
                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="numero" :value="__('Numero de personas')" />
                
                                <x-input id="numero" class="block mt-1 w-full" type="number" name="numero" :value="old('numero')" required />
                            </div>
         
                
                            <div class="flex items-center justify-end mt-4">
                                
                
                                <x-button type="submit" class="ml-4">
                                    {{ __('Reserva!!') }}
                                </x-button>
                            </div>
                        </form>
                    </x-auth-card>



                </div>
            </div>

            
        </div>


    </div>
</x-app-layout>