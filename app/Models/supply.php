<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supply extends Model
{
    use HasFactory;

    protected $fillable = [
        "reference_id",
        "product_id",
        "presentation_id",
        "quantity_id",
        'stock',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }
    public function input()
    {
        return $this->belongsTo(Input::class);
    }
}
