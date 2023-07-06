<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class reference extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
