<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Keluhan extends Model
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
        'detail', 'status', 'pelanggan_id', 'tanggapan', 'staff_id'
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
     * Get Staff
     *
     * @return data type
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
