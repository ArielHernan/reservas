<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\User;
use App\Models\usuario;
use Illuminate\Support\Facades\Auth;
use DateTime;


class reservaController extends Controller
{    
    // ---------------------CREAR----------------------------------------------------
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




    // -------------------------------MOSTRAR---------------------------------------------
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


// -------------------------------------MODIFICAR--------------------------------------------------------

    public function modificar(Request $request)
    {
        $reserva = Reserva::where('id_reserva', $request->id)->first();
        
        return view('crearModificarReserva',[
            'reserva' => $reserva        
        ]
        );
    }


    // ---------------------------------UPDATE-------------------------------------------------------------
    public function update(Request $request)
    {        
        //recoger datos introducidos en el form:
           // $request->input('hora');
          //  $request->input('dia');
        

        $reserva = new Reserva();
        $reserva->numero_personas = $request->input('numero');
        $reserva->id_usuario = Auth::id();
        
        
        //$reserva->fecha_hora_inicio = DateTime::createFromFormat( $request->input('dia'),$request->input('hora') );    
        $dia = $request->input('dia');
        $hora = $request->input('hora');
        $fechaReservaCompleta = $dia." ".$hora;
       

        $reserva->fecha_hora_inicio = $fechaReservaCompleta;
        $reserva->fecha_hora_fin = $fechaReservaCompleta;
        $reserva->estado = 0;        

        $reserva->save();

        //extraemos el nombnre de usuario:
        $u=usuario::find($reserva->id_usuario);
        return view('reservaCreada', [
            'nombreUsuario' => $u->name,
            'fechaHora'=> $reserva->fecha_hora_inicio,
            'personas' => $reserva->numero_personas
        ]);

    }


// -------------------------PAGINALOGUEADO-----------------------------------------------------------------------
    public function paginaLogueado(Request $request){
        $user=usuario::find(Auth::user()->id_usuario);

        $reservas=$user->reservas()->get();

        return view("logueado/index",["reservas"=>$reservas]);


    }


// ----------------------------MODIFICARRESERVA----------------------------------------------------------------------
    public function modificaReserva(Request $req) {
        //var_dump($req->input("id"));
       $id=intval($req->input("id"));
        $reservaLocal=Reserva::find(intval($req->input("id")));
        $inicio=$reservaLocal["fecha _hora_inicio"];
        $personas=$reservaLocal["personas"];
        return view("reserva/editar",["id"=>$id,"inicio"=>$inicio,"personas"=>$personas]);
        

    }





// --------------------------ACTUALIZAR-------------------------------------------------------------------------------------
    public function actualizar(Request $request) {
        // $t=Reserva::find($req->input("id"));
        // $t->fecha_hora_inicio=$req->input("inicio");
        // $t->numero_personas=$req->input("personas");
        // $t->save();
        // return redirect()->route("dashboard");

        $reserva = Reserva::where('id_reserva', $request->id)->first();
        $reserva->numero_personas = $request->input('numero');
        $reserva->id_usuario = Auth::id();
        $dia = $request->input('dia');
        $hora = $request->input('hora');
        $fechaReservaCompleta = $dia." ".$hora;
        $reserva->fecha_hora_inicio = $fechaReservaCompleta;
        $reserva->fecha_hora_fin = $fechaReservaCompleta;
        $reserva->estado = 0;
        $reserva->save();   
        // return view('dashboard',[
        //          'reserva' => $reserva        
        //      ]
        //      );
        return redirect()->route("reservaModificada");
    }








// ----------------------BORRARRESERVA-------------------------------------------------------------------------------------------
    public function borrarReserva(Request $request){
        $reserva=Reserva::find($request->input("id"));
        $reserva->delete();
        return redirect()->route("dashboard");
    }







// ----------------------------ACCEDERADMIN------------------------------------------------------------------------------------------
    public function accederAdmin() {
        $reservas=Reserva::all();
        return view("admin/index",["reservas"=>$reservas]);
    }







// ----------------------------ACEPTARRESERVA------------------------------------------------------------------------------------------
    public function aceptarReserva(Request $req) {
        $r=Reserva::find($req->input("id"));
        $r->estado=1;
        $r->save();
        $reservas=Reserva::all();
        return view("admin/index",["reservas"=>$reservas]);
    }







    // ----------------------------RECHAZARRESERVA------------------------------------------------------------------------------------------
    public function rechazarReserva(Request $req) {
        $r=Reserva::find($req->input("id"));
        $r->estado=2;
        $r->save();
        $reservas=Reserva::all();
        return view("admin/index",["reservas"=>$reservas]);
    }








//------------------------------RESERVAMODIFICADA--------------------------------------------------------------------------------------------

public function reservaModificada(){
    return view("reservaModificada");
}
}
