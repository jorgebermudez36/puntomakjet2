<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class input extends Model
{
    use HasFactory;

    protected $fillable = [
        "reference_id",
        "product_id",
        "presentation_id",
        'quantity',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }
}
