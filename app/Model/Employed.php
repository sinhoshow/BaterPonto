<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employed extends Model
{
    protected $fillable = ['name'];

    public function historics(){
        return $this->hasMany(Historic::class);
    }
}
