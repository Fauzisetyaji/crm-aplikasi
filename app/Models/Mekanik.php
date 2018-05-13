<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Mekanik extends Model
{
	use Uuids;

	/**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nm_mekanik', 'alamat', 'no_tlp'
    ];

    /**
     * Punya banyak jadwal
     *
     * @return data type
     */
    public function jadwal()
    {
        return $this->hasMany(Operasional::class, 'mekanik_id');
    }

    /**
     * Punya banyak SPP
     *
     * @return data type
     */
    public function spp()
    {
        return $this->hasMany(Spp::class, 'mekanik_id');
    }
}
