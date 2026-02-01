<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $guarded = false;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
