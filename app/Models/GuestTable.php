<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'sess_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function attempt(array $array)
    {
    }
}
