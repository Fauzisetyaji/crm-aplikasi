<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Guest extends Model
{
	use Notifiable, Uuids;

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
        'email', 'nama', 'no_tlp' , 'alamat' , 'nomor_polisi', 'type_kendaraan'
    ];

}
