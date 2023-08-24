<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\input;


class presentation extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function inputs()
    {
        return $this->belongsToManyMany(input::class);
    }
}
