{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head> --}}
{{-- <body style="background-color=black">
    <h1>Formulario edicion reservas</h1>
    <form action="actualizar">
        <input type="hidden" name="id" value="{{ $id }}">
        inicio: <input type="text" name="inicio" value="{{ $inicio }}">
        personas: <input type="number" name="personas" value="{{ $personas }}">
        <button>Enviar</button>
    </form> --}}

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Modificar  reserva') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-auth-card>
                            <x-slot name="logo">
                                {{-- <a href="/">
                                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                                </a> --}}
                            </x-slot>
                    
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    
                            <form method="GET1q2w3 ez4e " action="{{ route('actualizar') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <!-- Día de reserva -->
                                <div>
                                    <x-label for="dia" :value="__('Día de reserva')" />
                    
                                    <x-input id="dia" class="block mt-1 w-full" type="date" name="dia" :value="old('dia')" required autofocus />
                                </div>
                    
                                   <!-- Fecha de reserva -->
                                   <div class="mt-4">
                                    <x-label for="hora" :value="__('Hora de reserva')" />
                    
                                    <x-input id="hora" class="block mt-1 w-full" type="time" name="hora" :value="old('hora')" required />
                                </div>
                    
                                <!-- Número de personas -->
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
</body>
</html>