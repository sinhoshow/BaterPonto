<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Historic;
use App\Http\Requests\PontoFormRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class SiteController extends Controller
{
    public function index(){
        return view('site.home.index');
    }

    public function batePonto(PontoFormRequest $request){
        $historic = new Historic();
        $date = date('Y-m-d H:i:s');
        $userId = $request->user_id;
        $type = $request->periodo;

        // $historicDay = $historic->getLastDailySearch($request->id);       
        // $dateLastInsert =  $historicDay->data;
        // $intervalo = $date->diff($dateLastInsert);
        // dd($intervalo);       
        try{          
            $response = $historic->create([
                'user_id' => $request->id, 
                'type' => $request->periodo, 
                'data' => $date,
            ]);
        }catch(QueryException $e){
            return redirect()->back()->with('error', 'Id não encontrado');
        }        
        if ($response){
            return redirect()
                        ->back()
                        ->with('success', 'Ponto batido');
        }
    }
}
