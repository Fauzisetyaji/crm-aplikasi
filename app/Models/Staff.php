<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Staff extends Model
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
        'kode_staff', 'nm_staff', 'tgl_lahir', 'alamat', 'no_tlp', 'user_id'
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
     * Punya banyak Keluhan
     *
     * @return data type
     */
    public function keluhan()
    {
        return $this->hasMany(Keluhan::class, 'staff_id');
    }
}
