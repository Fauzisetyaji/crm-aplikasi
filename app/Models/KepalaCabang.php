<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class KepalaCabang extends Model
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
		'nm_kepala_cabang', 'no_tlp', 'user_id'
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

}
