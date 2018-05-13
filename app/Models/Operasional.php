<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Operasional extends Model
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
        'name', 'starts_on', 'ends_on', 'open_on', 'close_on', 'length_in_days'
    ];

    /**
     * Punya banyak Jadwal
     *
     * @return data type
     */
    public function jadwal()
    {
        return $this->hasMany(JadwalOperasional::class, 'operasional_id');
    }
}
