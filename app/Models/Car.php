<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
       'name',
       'model',
        'make',
        'vin',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
