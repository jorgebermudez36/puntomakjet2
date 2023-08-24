<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\input;


class reference extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    // One to many (inverse) relationships
    public function inputs()
    {
        return $this->belongsToMany(Input::class);
    }
}
