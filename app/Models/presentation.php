<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presentation extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function input()
    {
        return $this->hasMany(input::class);
    }
}
