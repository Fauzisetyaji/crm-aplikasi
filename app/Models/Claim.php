<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Claim extends Model
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
        'no_claim', 'tgl_claim', 'point_potong', 'status', 'reward_id', 'pelanggan_id'
    ];

    /**
     * Get Rewards
     *
     * @return data type
     */
    public function reward()
    {
        return $this->belongsTo(Reward::class, 'reward_id');
    }

    /**
     * Get Pelanggan
     *
     * @return data type
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
}
