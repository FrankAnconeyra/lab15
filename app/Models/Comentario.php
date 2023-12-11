<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;


class Comentario extends Model
{
    use HasFactory;
    public function Foto(){
        return $this->belongsTo(Foto::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
