<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Booking extends Model
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
        'booking_number', 'date', 'time', 'no_polisi', 'cancellation', 'status', 'jenis_service', 'easyService', 'keterangan', 'pelanggan_id', 'service_id', 'jadwal_operasional_id', 'type_kendaraan'
    ];

    /**
     * Get Pelanggan
     *
     * @return data type
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
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
     * Get Jadwal
     *
     * @return data type
     */
    public function jadwal()
    {
        return $this->belongsTo(JadwalOperasional::class, 'jadwal_operasional_id');
    }
}
