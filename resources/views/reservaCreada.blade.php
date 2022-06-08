<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}

            <p>Su reserva se ha creado satisfactoriamente</p>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Su reserva se ha creado satisfactoriamente</p>
                    <p>Los datos de su reserva son los siguientes;</p>
                    <br>
                    <p> Nombre de la persona que realiza la reserva:&nbsp;<strong>{{$nombreUsuario}}</strong></p>
                    <p>Fecha de la reserva:&nbsp;<strong>{{$fechaHora}}</strong></p>
                    <p>Número de personas: &nbsp;<strong>{{$personas}}</strong></p>
                   
                </div>
            </div>
        </div>


    </div>
</x-app-layout>