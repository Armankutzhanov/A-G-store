<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Post extends Model
{
    protected $attributes=[
        'content'=>'Lorem ipsum...'
    ];

    protected $fillable = [
        'title',
        'content',
        'description',
        'user_id'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
