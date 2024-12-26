<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Status;
use App\Models\WorkTime;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function statuses()
    {
        return $this->hasOne(Status::class);
    }

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class);
    }
}
