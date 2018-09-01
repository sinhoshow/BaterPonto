<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Historic;

class PontosController extends Controller
{
    private $totalPage = 7;
    public function index(Historic $historic){
        $pontos = $historic->with(['employed'])->paginate($this->totalPage);
         
        if ($pontos){
            return view('painel.pontos.index', compact('pontos'));
        }
        return view('painel.pontos.index');
    }
    
    public function filtro(Request $request, Historic $historic){
        $dataForm = $request->except('_token');                
        $pontos = $historic->search($dataForm, $this->totalPage);
        if ($pontos){            
            return view('painel.pontos.index', compact('pontos', 'dataForm'));
        }
        return view('painel.pontos.index');
    }
}
