<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Uuids;

class User extends Authenticatable
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
        'email', 'username', 'password', 'roles', 'verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get data user
     *
     * @return data type
     */
    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'user_id');
    }

    /**
     * Get data user
     *
     * @return data type
     */
    public function staff()
    {
        return $this->hasOne(Staff::class, 'user_id');
    }

    /**
     * Get data user
     *
     * @return data type
     */
    public function kepalaCabang()
    {
        return $this->hasOne(KepalaCabang::class, 'user_id');
    }
}
