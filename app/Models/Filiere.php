<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    public $fillable = ["abreviation","nom_complet"];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
