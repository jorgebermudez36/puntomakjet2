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
        'stock',
    ];

    public function input()
    {
        return $this->hasOne(Input::class, 'reference_id', 'reference_id')
            ->where('product_id', '=', $this->product_id)
            ->where('presentation_id', '=', $this->presentation_id);
    }
}
