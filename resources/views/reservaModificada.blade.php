<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
 
</head>

<style>

  body{
    height: 100vh;
    width:100%;
    display: flex; 
    justify-content: center;
    align-items: center;
    color: white;
  }
  p{
    color: white
  }
  iframe{
    height:100vh;
    width:100%;
    position : fixed;
    top:0%;
    z-index:-1;
    background-size:cover;
    background-repeat: no-repeat;
  }

  video{
    height:100vh;
    width:100%;
    position : fixed;
    top:0%;
    z-index:-1;
  }

</style>
<body  style="background-color: black;">
  {{-- <iframe src="https://giphy.com/embed/108OstyEIMwt8s" width="480" height="238" frameBorder="0" class="giphy-embed" allowFullScreen></iframe> --}}
  <video src="{{ asset("storage/confirmarReservaBackground.mp4")}}" muted autoloop="true" autoplay="true"></video>


  <div class="max-w-sm rounded overflow-hidden shadow-lg">
        {{-- <img class="w-full" src="{{ asset("storage/portada.jpg")}}" alt="Sunset in the mountains"> --}}
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">Has cambiado tu reserva con éxito</div>
          <p class="text-white-700 text-base">
            pulsa el botón para volver a tu panel de reservas y ver la reserva cambiada
          </p>
        </div>
        <div class="px-6 pt-4 pb-2">
           
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><a href="http://127.0.0.1:8000/dashboard">volver al panel de reservas</a></span>

      </div>
</body>
</html>