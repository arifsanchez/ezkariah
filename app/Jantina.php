<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jantina extends Model
{
    public $table = 'jantinas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function profilAhlis()
    {
        return $this->hasMany(ProfilAhli::class, 'jantina_id', 'id');
    }
}
