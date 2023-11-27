<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_Category extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'code'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
