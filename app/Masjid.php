<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masjid extends Model
{
    use SoftDeletes;

    public $table = 'masjids';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'location',
        'negeri_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function negeri()
    {
        return $this->belongsTo(Negeri::class, 'negeri_id');
    }
}
