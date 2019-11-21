<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPengenalanDiri extends Model
{
    public $table = 'jenis_pengenalan_diris';

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
        return $this->hasMany(ProfilAhli::class, 'ictype_id', 'id');
    }
}
