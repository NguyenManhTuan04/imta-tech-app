<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'ad_name',
        'ad_image',
        'link',
        'position',
    ];
}

