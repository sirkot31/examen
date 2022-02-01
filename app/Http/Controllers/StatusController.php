<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Status;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    function index(){
        $production= Production::all()->toArray();
        $totalP=Production::select('productionXhour')->count();
        return response()->json($production);
      // return 'entro';
    }

    function create(Request $request){


        $ActualTime=Carbon::now()->timezone("America/Tijuana");
        $LocalTime=$ActualTime->format('Y-m-d');
        $Hour=$ActualTime ->format('h A');
        $TimeTicket=$request->date;
        //$t1=strtotime($LocalTime);
        $t2=strtotime($TimeTicket);
         $s=Status::where('ticket',$request->ticket)->first();
        $status = new Status;
        $production= new Production;

        //return response()->json($TimeTicket==$t2);
         if($s==null){
            if($TimeTicket==$t2){
                if($Hour<'04 pm' && $Hour>='06 am'){
                    $status->ticket= $request->ticket;
                    $status->save();
                    $production->ticket= $request->ticket;
                    $production->hour= $Hour;
                    $production->productionXhour=162;
                    $production->save();
                    return response()->json('añadido con exito');
                }else{
                    return response()->json('Se intenta introducir las horas en horario no permitido');
                }
            }else{
                return response()->json('La fecha del ticket no corresponde con el dia en curso');
            }
        }
    }
}
