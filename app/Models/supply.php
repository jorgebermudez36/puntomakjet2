<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\presentation;

class supply extends Model
{
    use HasFactory;

    protected $fillable = [
        "reference_id",
        "product_id",
        'stock',
    ];

    public function reference()
    {
        return $this->belongsTo(Reference::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function presentation()
    {
        return $this->belongsTo(Presentation::class, 'presentation_id', 'id');
    }

    public function input()
    {
        return $this->hasOne(Input::class, 'reference_id', 'reference_id')
            ->where('product_id', '=', $this->product_id);
    }
}
