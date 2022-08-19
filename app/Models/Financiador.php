<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financiador extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'valor',
        'data',
    ];
    public function entradas(){
        return $this->hasMany(Entrada::class);
    }
}
