<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;


class reference extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    // One to many (inverse) relationships
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
