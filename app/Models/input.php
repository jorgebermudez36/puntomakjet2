<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\reference;
use App\Models\product;
use App\Models\presentation;

class input extends Model
{
    use HasFactory;

    protected $fillable = [
        "quantity",
        "reference_id",
        "product_id",
        "presentation_id",
    ];

    public function references()
    {
        return $this->belongsToMany(reference::class);
    }
    public function products()
    {
        return $this->belongsToMany(product::class);
    }

    public function presentations()
    {
        return $this->belongsToMany(presentation::class);
    }
}
