<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "name",
        "description",
        "address",
        "coordinates",
        "video_source",
        "created_at",
        "updated_at"
    ];
}
