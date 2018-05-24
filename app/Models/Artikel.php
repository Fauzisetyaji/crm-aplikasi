<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class Artikel extends Model
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
    	'judul', 'gambar', 'konten', 'author'
    ];

    /**
     * Get Staff
     *
     * @return data type
     */
    public function author()
    {
        return $this->belongsTo(Staff::class, 'author');
    }
}
