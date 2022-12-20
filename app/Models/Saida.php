<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    use HasFactory;

    protected $fillable = [
        'projecto_id',
        'participante_id',
        'valor',
        'visita',
    ];
    public function projecto(){
        $this->belongsTo(Projecto::class);
    }
}
