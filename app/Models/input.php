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
        "created_by",
        "updated_by",

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class, 'reference_id', 'reference_id')
            ->where('product_id', '=', $this->product_id)
            ->where('presentation_id', '=', $this->presentation_id);
    }
}
