<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Negeri extends Model
{
    use SoftDeletes;

    public $table = 'negeris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'jabatan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function masjids()
    {
        return $this->hasMany(Masjid::class, 'negeri_id', 'id');
    }
}
