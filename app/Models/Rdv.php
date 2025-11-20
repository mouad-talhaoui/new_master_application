<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    public $fillable = ["date", "nombre_d_etudiant", "nombre_d_etudiant_actual", "id_filiere", "isEnabled"];

    public function users()
{
    return $this->belongsToMany(User::class)->withTimestamps();
}

}
