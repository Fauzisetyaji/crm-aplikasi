<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Service extends Model
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
        'nm_service', 'jenis_service', 'description', 'poin'
    ];

    /**
     * Punya banyak Rewards
     *
     * @return data type
     */
    public function rewards($param)
    {
        return $this->hasMany(Reward::class, 'service_id');
    }

    /**
     * Punya banyak Operasional
     *
     * @return data type
     */
    public function operasionals()
    {
        return $this->hasMany(Operasional::class, 'service_id');
    }

    /**
     * Punya banyak Booking
     *
     * @return data type
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'service_id');
    }

    /**
     * Punya banyak SPP
     *
     * @return data type
     */
    public function spps()
    {
        return $this->hasMany(Spp::class, 'service_id');
    }
}
