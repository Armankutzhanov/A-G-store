<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin Builder
 */
class Product extends Model
{
    use HasFactory;
    public function cart_items():HasOne
    {
        return $this->hasOne(CartItem::class);
    }


    protected $fillable = ['name', 'description', 'img','slug', 'category_id', 'price'];
}

