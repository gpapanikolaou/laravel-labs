<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to',
        'user_id',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');

    }
}
