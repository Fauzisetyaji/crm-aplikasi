<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class JadwalOperasional extends Model
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
        'operasional_id', 'service_id', 'mekanik_id', 'date',
        'service_count', 'booking_count'
    ];

    /**
     * Get Operasional
     *
     * @return data type
     */
    public function operasional()
    {
    	return $this->belongsTo(Operasional::class, 'operasional_id');
    }

    /**
     * Get Service
     *
     * @return data type
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Get Mekanik
     *
     * @return data type
     */
    public function mekanik()
    {
        return $this->belongsTo(Mekanik::class, 'mekanik_id');
    }
}
