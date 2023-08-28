<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitors extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "name",
        "roles",
        "created_at",
        "updated_at"
    ];
}
