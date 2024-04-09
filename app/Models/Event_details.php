<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Event_details extends Model
{
    use HasFactory;

    protected $fillable =[
        "insert",
        "attributions",
        "event_id"
    ];

    public function details()
    {
        return $this->belongsTo(Event::class);
    }
}
