<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\reference;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        "reference_id",
        "name",
    ];

    // Relación uno a muchos
    public function reference()
    {
        return $this->belongsTo(Reference::class);
    }
}
