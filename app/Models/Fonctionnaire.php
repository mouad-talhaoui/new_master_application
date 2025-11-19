<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Fonctionnaire extends Authenticatable
{
    public $fillable = ["email", "nom", "prenom", "password"];
}
