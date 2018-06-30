<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Kendaraan extends Model
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
        'no_polisi', 'jenis_kendaraan', 'pelanggan_id'
    ];

    /**
     * Get owner kendaraan
     *
     * @return data type
     */
    public function owner()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
