<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Pelanggan extends Model
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
        'kode_pelanggan', 'nm_pelanggan', 'alamat', 'no_tlp', 'id_number', 'jml_poin', 'user_id'
    ];

    /**
     * Get Auth User
     *
     * @return data type
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get kendaraan pelanggan
     *
     * @return data type
     */
    public function kendaraan()
    {
        return $this->hasOne(Kendaraan::class, 'pelanggan_id');
    }

    /**
     * Punya banyak Booking
     *
     * @return data type
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'pelanggan_id');
    }

    /**
     * Punya banyak Keluhan
     *
     * @return data type
     */
    public function keluhans()
    {
        return $this->hasMany(Keluhan::class, 'pelanggan_id');
    }

    /**
     * Punya banyak Testimoni
     *
     * @return data type
     */
    public function testimonis($param)
    {
        return $this->hasMany(Testimoni::class, 'pelanggan_id');
    }

    /**
     * Punya banyak Klaim
     *
     * @return data type
     */
    public function claims()
    {
        return $this->hasMany(Claim::class, 'pelanggan_id');
    }
}
