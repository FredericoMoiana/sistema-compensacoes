<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'acronimo',
        'saldo',
        'valorGasto',
        'valorAlocado',
    ];
    public function saidas(){
        return $this->hasMany(Saida::class);
    }
}