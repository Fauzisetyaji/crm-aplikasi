<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Reward extends Model
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
        'nm_reward', 'poin', 'status_reward', 'service_id'
    ];

    /**
     * Get Service
     *
     * @return data type
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
