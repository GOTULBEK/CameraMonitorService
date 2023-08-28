<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "frame_url",
        "camera_id",
        "event_type_id",
        "created_at",
        "updated_at"
    ];
    public function camera(){
        return $this->hasOne(Camera::class, "id", "camera_id");
    }
    public function eventtype(){
        return $this->hasOne(Event_type::class, "id", "event_type_id");
    }
}
