<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfilAhli extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'profil_ahlis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'team_id',
        'ictype_id',
        'nama_penuh',
        'jantina_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'no_kad_pengenalan',
    ];

    public function ictype()
    {
        return $this->belongsTo(JenisPengenalanDiri::class, 'ictype_id');
    }

    public function jantina()
    {
        return $this->belongsTo(Jantina::class, 'jantina_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
