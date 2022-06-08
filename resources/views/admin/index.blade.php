<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body  style="background-color:black">
    <div class="h-30 bg-gray-100 w-full">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                    {{ __('Gestionar reservas') }}
                </h2>
            </div>
        </header>
    </div>

    
    <table class="flex justify-center items-center flex-col w-full" style="height:80vh;width:100%">
        <thead class="text-white">
            <th>id_reserva</th>
            <th>id_usuario</th>
            <th>estado</th>
            <th>fecha_hora_inicio</th>
            <th>fecha_hora_fin</th>
            <th>numero de personas</th>
        </thead>
        <tbody>
            @foreach ($reservas as $item)
            @if ($item["estado"]==2)
             <tr class="bg-indigo-500">
            
            @elseif ($item["estado"]==1)
                <tr class="bg-emerald-500">
            @else 
            <tr class="bg-pink-700">
            @endif
                    <td>{{ $item["id_reserva"] }}</td>
                    <td>{{ $item["id_usuario"] }}</td>
                    <td>{{ $item["estado"] }}</td>
                    <td>{{ $item["fecha_hora_inicio"] }}</td>
                    <td>{{ $item["fecha_hora_fin"] }}</td>
                    <td>{{ $item["numero_personas"] }}</td>
                    <td><a href="{{route("aceptarReserva",["id"=>$item["id_reserva"]])}}">Aceptar</a></td>
                    <td><a href="{{route("rechazarReserva",["id"=>$item["id_reserva"]])}}">Rechazar</a></td>
                    <td><a href="{{ route("borrarReserva",["id"=>$item["id_reserva"]]) }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Borrar reserva</a> </td>
                    <td><a href="{{ url('/nuevaReserva/{id?') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Crear reserva</a> </td>
                </tr>                
            @endforeach
        </tbody>

    </table>
    <a href="{{ route("dashboard") }}" class="text-white">Volver</a>
</body>
</html>