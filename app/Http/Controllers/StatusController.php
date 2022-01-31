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
        return response()->json($production);
      // return 'entro';
    }

    function create(Request $request){

        $t=Carbon::now();
       $time=$t->format('Y-m-d');

        $time2=$request->date;

        $s=Status::find($request->ticket)->first();
        $status = new Status;
        $production= new Production;

         if($s==null){
            if($time2==$time){
                if($request->hour<4 && $request->hour){

                    $status->ticket= $request->ticket;
                    $status->save();
                    $production->ticket= $request->ticket;
                    $production->hour= (int)$request->hour;
                    $production->productionXhour= $request->productionXhour;
                    $production->save();
                    return response('añadido con exito');
                }else{
                    return response('Se intenta introducir las horas en horario no permitido');
                }
            }else{
                return response('La fecha de la ficha no corresponde con el dia en curso');
            }
        } else{
            if($s->hour==$request->hour){
                $s->productionXhour+=(int)$request->productionXhour;
            }else{
                if($request->hour<4 && $request->hour){
                    $production->ticket= $request->ticket;
                    $production->hour= (int) $request->hour;
                    $production->productionXhour= $request->productionXhour;
                    $production->save();
                    return response('añadido con exito');
                }else{
                    return response('Se intenta introducir las horas en horario no permitido');
                }
            }
        }



       /*
        try{

            else{

            }
            return response()->json('Productos añadidos');

        }catch(Error $error){
            $requestF=['los datos no pudieron ser enviados:'=>$error,'error'=>'404'];
            return  response()->json($requestF);
        } */
    }

    public function indexado(){
        $t=Carbon::now();
        //$time=$t->subHour();
        return $t ->format('h A');
    }
}
