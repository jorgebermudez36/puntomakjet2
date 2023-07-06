<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reference;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        "reference_id",
        "product",
    ];

    // Relación uno a muchos (inversa)
    public function reference()
    {
        return $this->belongsTo(Reference::class);
    }
}
