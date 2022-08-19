<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'idProjecto',
        'idFinanciador',
        'valor',
        'data',
    ];
    public function financiador(){
        return $this->belongsTo(Financiador::class);
    }

}