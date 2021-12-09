<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Attendance extends Model
{
    protected $guarded = ['id'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
