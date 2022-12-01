<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'acronimo',
    ];
    public function saidas(){
        return $this->hasMany(Saida::class);
    }
    public function participantes(){
        return $this->hasMany(Participante::class);
    }
}
