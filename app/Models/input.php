<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class input extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "reference_id",
        "product_id",
        "presentation_id",
        "quantity",
        "created_by",
        "updated_by",
        "deleted_by",

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
        return $this->belongsTo(Presentation::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
