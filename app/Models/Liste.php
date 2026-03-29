<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    //
    protected $table = 'listes';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'evenement_id',
    ];


}
