<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;
use DateTime;

class reservaController extends Controller
{    
    public function crear(Request $request)
    {
        if($request->id = ''){
            $reserva = new Reserva();
        }else{
            $reserva = Reserva::where('id_reserva', $request->id)->first();
        }
        
        
        return view('crearModificarReserva',[
            'reserva' => $reserva        
        ]
        );
    }  
    public function mostrar(Request $request)
    {
        $filtro = $request->filtro;
        $reservas = null;

        if ($filtro == 'pendientes'){
            $reservas =  Reserva::where('estado', 0)->get();
        }else if ($filtro == 'aceptadas'){
            $reservas =  Reserva::where('estado', 1)->get();
        }else if ($filtro == 'canceladas'){
            $reservas =  Reserva::where('estado', 2)->get();
        }else if ($filtro == 'rechazadas'){
            $reservas =  Reserva::where('estado', 3)->get();
        }else{
            $reservas =  Reserva::all();
        }
        
        
        return view('AdminVerReservas',[
            'reservas' => $reservas
        ]
        );
    }   
    public function modificar(Request $request)
    {
        $reserva = Reserva::where('id_reserva', $request->id)->first();
        
        return view('crearModificarReserva',[
            'reserva' => $reserva        
        ]
        );
    }
    public function update(Request $request)
    {        
        //recoger datos introducidos en el form:
           // $request->input('hora');
          //  $request->input('dia');
        

        $reserva = new Reserva();
        $reserva->numero_personas = $request->input('numero');
        $reserva->id_usuario = Auth::id();
        $now = new DateTime();
        
        //$reserva->fecha_hora_inicio = DateTime::createFromFormat( $request->input('dia'),$request->input('hora') );    

        $reserva->fecha_hora_inicio = $now->format('Y-m-d H:i:s');
        $reserva->fecha_hora_fin = $now->format('Y-m-d H:i:s');

       // $reserva->fecha_hora_inicio =  DateTime::createFromFormat( $request->input('dia'),$request->input('hora') );

        /* 
        $horainicio = DateTime::createFromFormat( $request->input('dia'),$request->input('hora') );      
        $horainicio->format('Y-m-d H:i:s');
        $reserva->fecha_hora_inicio = $horainicio;
        //$reserva->fecha_hora_inicio->format('Y-m-d H:i:s');       

        //$reserva->fecha_hora_fin =DateTime::createFromFormat( $request->input('dia'),$request->input('hora') );      
        $reserva->fecha_hora_fin = $horainicio;
*/
        //$reserva->fecha_hora_fin =DateTime::createFromFormat( $request->input('dia'),$request->input('hora') );      

        $reserva->estado = 0;        
        
//var_dump($reserva);
            echo($reserva->fecha_hora_inicio);
          //  echo($reserva->numero_personas);
        $reserva->save();
        return view('reservaCreada', [
            'mensaje' => 'Reserva creada satisfactoriamente.'
        ]);

    }

}
