<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BreakTime;

class WorkTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_time',
        'finish_time',
    ];

    public function breakTimes()
    {
        return $this->hasMany(BreakTime::class);
    }
}
