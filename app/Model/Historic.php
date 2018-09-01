<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Historic extends Model
{
    protected $fillable = ['user_id', 'type', 'data'];

    public function type($type = null){
        $types = [
            'In'       => 'Entrada',
            'Lunch'    => 'Almoço',
            'LunchBack'=> 'Volta Almoço',
            'Out'      => 'Saída',
            'DailyOut' => 'Intervalo',
        ];

        if (!$type){
            return $types;
        }

        return $types[$type];
    }

    public function employed(){
        return $this->belongsTo(Employed::class);
    }

    public function getDataAttribute($value){
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }   

    public function search($data, $totalPage){       
        return $this->where(function ($query) use ($data){
            if (isset($data['tempo'])){
                $dateStart = date('Y-m-d H:i:s');                               
                if ($data['tempo'] == 'Diario'){
                    $dateEnd = date('Y-m-d');                    
                }else if ($data['tempo'] == 'Semanal'){
                    $dateEnd = date('Y-m-d', strtotime('-7 days'));
                }else if ($data['tempo'] == 'Mensal'){
                    $dateEnd = date('Y-m-d', strtotime('-1 months'));
                }else if ($data['tempo'] == 'Anual'){
                    $dateEnd = date('Y-m-d', strtotime('-1 years'));
                }             
                $query->whereBetween('data', [$dateEnd, $dateStart]);
            }
        })//->toSql();dd($historics);
        ->paginate($totalPage);

    }
}
