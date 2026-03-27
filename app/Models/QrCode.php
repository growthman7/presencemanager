<?php

namespace App\Models;

use \Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    //
    protected $table = "qrcode";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'chemin',
        'evenement_id',
    ];

    public function evenement()
    {
        return $this->belongsTo(Evenements::class, 'evenement_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($qrcode) {
            $qrcode->id = (string) Str::uuid();
        });
    }
}
