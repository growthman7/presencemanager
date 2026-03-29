<?php

namespace App\Models;

use \Illuminate\Support\Str;
use App\Models\Liste;
use Illuminate\Database\Eloquent\Model;

class Evenements extends Model
{
    //
    protected $table="evenements";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'titre',
        'description',
        'lieu',
        'date',
        'heure',
    ];

    public function listes()
    {
        return $this->hasMany(Liste::class, 'evenement_id');
    }

    public function qrcode()
    {
        return $this->hasMany(QrCode::class, 'evenement_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($evenement) {
            $evenement->id = (string) Str::uuid();
        });

        static::deleting(function ($evenement) {
            $evenement->qrcode()->delete();
        });
    }
}
