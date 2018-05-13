<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class KendaraanType extends Model
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
        'type', 'kendaraan_id'
    ];

    /**
     * Milik kendaraan
     *
     * @param param type $param
     * @return data type
     */
    public function kendaraan($param)
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }
}
