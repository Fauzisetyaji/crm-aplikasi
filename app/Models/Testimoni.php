<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Testimoni extends Model
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
        'detail', 'pelanggan_id'
    ];

    /**
     * Get Pelamggan
     *
     * @return data type
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelamggan::class, 'pelanggan_id');
    }
}
